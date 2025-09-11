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
                    <th class="text-muted text-small text-uppercase">@lang('inventory::layout.sku')</th>
                    <th class="text-muted text-small text-uppercase">@lang('layout.name')</th>
                    <th class="text-muted text-small text-uppercase">@lang('inventory::layout.category')</th>
                    <th class="empty">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->sku ?? '-' }}</td>
                            <td>{{ $product->name ?? '-' }}</td>
                            <td>{{ $product?->category?->name ?? '-' }}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <x-actions-row>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#formModal" wire:click="edit({{ $product->id }})">
                                            Editar
                                        </button>

                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#formModal" wire:click="delete({{ $product->id }})">
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
            @include('partials.pagination', ['paginator' => $products])
        </div>
    </div>
    <!-- Content End -->

    <!-- Modals -->
    @include('inventory::livewire.product.product-form')
    <!-- Modals End -->
</div>
