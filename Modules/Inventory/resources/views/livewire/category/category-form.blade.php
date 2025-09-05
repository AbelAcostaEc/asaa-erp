<div>
    <div wire:ignore.self class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $categoryId ? ($deleteMode ? __('layout.delete') : __('layout.edit')) : __('layout.create') }} @lang('layout.category')</h5>
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
                                {{ html()->text('name')->class('form-control' . ($errors->has('name') ? ' is-invalid' : ''))->placeholder('Nombre:')->required()->attribute('wire:model', 'name') }}
                                <label>Nombre:</label>
                            </div>
                            @include('partials.error_field', ['field_name' => 'name'])
                        </div>

                    </div>
                </div>
                <div class="modal-footer" wire:target="edit, delete">
                    <div wire:loading.remove>
                        <button type="button" wire:click="cancel" class="btn btn-outline btn-outline-dark">Cancelar</button>
                        @if ($categoryId)
                            @if ($deleteMode)
                                <button type="button" wire:click="destroy" class="btn btn-outline btn-outline-danger">Eliminar</button>
                            @else
                                <button type="button" wire:click="update" class="btn btn-outline btn-outline-primary">Actualizar</button>
                            @endif
                        @else
                            <button type="button" wire:click="store" class="btn btn-outline btn-outline-primary close-modal">Guardar</button>
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
