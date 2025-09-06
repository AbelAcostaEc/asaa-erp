<div>
    <!-- Alerts -->
    @include('partials.alerts')
    <!-- Alerts End -->

    @section('top_actions')
        <!-- Add New Button Start -->
        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-1" data-bs-toggle="modal" data-bs-target="#formModal">
            <i data-acorn-icon="plus"></i>
            <span>@lang('layout.new')</span>
        </button>
        <!-- Add New Button End -->
    @endsection

    <!-- Content Start -->
    <div class="data-table-rows slim">
        <!-- Controls Start -->
        <div class="row">
            <!-- Search Start -->
            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                @include('partials.search-field')
            </div>
            <!-- Search End -->

            <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                @include('partials.pagination-dropdown', ['limit' => $limit])
            </div>
        </div>
        <!-- Controls End -->

        <!-- Table Start -->
        <div class="table-responsive-sm ">
            <table id="" class="table table-row-bordered table-hover table-rounded table-striped">
                <thead>
                    <tr>
                        <th class="text-muted text-small text-uppercase">Código</th>
                        <th class="text-muted text-small text-uppercase">Nombre</th>
                        <th class="empty">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name ?? '-' }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <x-actions-row>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#formModal" wire:click="edit({{ $category->id }})">
                                                Editar
                                            </button>

                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#formModal" wire:click="delete({{ $category->id }})">
                                                Eliminar
                                            </button>
                                        </x-actions-row>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- Table End -->
        <div class="my-5">
            @include('partials.pagination', ['paginator' => $categories])
        </div>
    </div>
    <!-- Content End -->

    <!-- Modals -->
    @include('inventory::livewire.category.category-form')
    <!-- Modals End -->
</div>
