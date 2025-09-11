<div>
    <div wire:ignore.self class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true"
         data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $productId ? ($deleteMode ? __('layout.delete') : __('layout.edit')) : __('layout.create') }} @lang('inventory::layout.product')</h5>
                </div>
                {{-- STAR LOADER --}}
                <div wire:loading.block wire:target="edit, delete" style="display: none">
                    <div class="d-flex align-items-center justify-content-center my-5">
                        <div class="loaderModal"></div>
                    </div>
                </div>
                {{-- END LOADER --}}
                <div class="modal-body" wire:loading.remove wire:target="edit, delete">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                {{ html()->select('categoryId', $categories)->class('form-select' . ($errors->has('categoryId') ? ' is-invalid' : ''))->placeholder(__('inventory::layout.select_a_category'))->attribute('wire:model', 'categoryId') }}
                                <label>@lang('inventory::layout.category'):</label>
                            </div>
                            @include('partials.error_field', ['field_name' => 'categoryId'])
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                {{ html()->text('name')->class('form-control' . ($errors->has('name') ? ' is-invalid' : ''))->placeholder('Nombre:')->attribute('wire:model', 'name') }}
                                <label>@lang('layout.name'):</label>
                            </div>
                            @include('partials.error_field', ['field_name' => 'name'])
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                {{ html()->text('sku')->class('form-control' . ($errors->has('sku') ? ' is-invalid' : ''))->placeholder('Nombre:')->attribute('wire:model', 'sku') }}
                                <label>@lang('inventory::layout.sku'):</label>
                            </div>
                            @include('partials.error_field', ['field_name' => 'sku'])
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                {{ html()->text('salePrice')->class('form-control input-numeric' . ($errors->has('salePrice') ? ' is-invalid' : ''))->placeholder('Nombre:')->attribute('wire:model', 'salePrice') }}
                                <label>@lang('inventory::layout.sale_price'):</label>
                            </div>
                            @include('partials.error_field', ['field_name' => 'salePrice'])
                        </div>
                        <div class="col-12">
                            <div class="form-check form-check-inline mb-3">
                                {{ html()->checkbox('active')->class('form-check-input')->id('active')->attribute('wire:model.live', 'active') }}
                                {{ html()->label(__('inventory::layout.active'), 'active')->class('form-check-label text-dark') }}
                            </div>
                            @include('partials.error_field', ['field_name' => 'active'])
                        </div>


                    </div>
                </div>
                <div class="modal-footer" wire:target="edit, delete">
                    <div wire:loading.remove>
                        <button type="button" wire:click="cancel" class="btn btn-outline btn-outline-dark">Cancelar</button>
                        @if ($productId)
                            @if ($deleteMode)
                                <button type="button" wire:click="destroy" class="btn btn-outline btn-outline-danger">
                                    Eliminar
                                </button>
                            @else
                                <button type="button" wire:click="update" class="btn btn-outline btn-outline-primary">
                                    Actualizar
                                </button>
                            @endif
                        @else
                            <button type="button" wire:click="store"
                                    class="btn btn-outline btn-outline-primary close-modal">Guardar
                            </button>
                        @endif
                    </div>

                    <div>
                        <div wire:loading style="float: right; margin-right: 5rem;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
