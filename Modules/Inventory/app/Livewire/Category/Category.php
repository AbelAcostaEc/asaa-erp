<?php

namespace Modules\Inventory\Livewire\Category;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Inventory\Models\Category as CategoryModel;

class Category extends Component
{
    use WithPagination;

    // Buscador y límite de paginación
    public $search, $lastSearch, $limit = 10;
    // Modo Eliminación
    public bool $deleteMode = false;
    // Generales
    public $categoryId, $name;

    /**
     * Traducciones de los atributos para los mensajes de validación
     * @return string[]
     */
    protected function validationAttributes(): array
    {
        return [
            'name' => __('layout.name')
        ];
    }

    public function mount()
    {
        abort_unless(auth()->user()->can('read category'), 403, 'Access Denied');
    }

    public function render()
    {
        $baseQuery = CategoryModel::orderBy('id', 'desc');

        $search = trim($this->search);
        if (!empty($search)) {
            if ($search != $this->lastSearch) {
                $this->resetPage();
                $this->lastSearch = $search;
            }

            $baseQuery->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
        }

        $categories = $baseQuery->paginate($this->limit);
        return view('inventory::livewire.category.category', compact('categories'));
    }

    /**
     * Función para cambiar el límite de la paginación
     *
     * @param int $limit cantidad de registros por pagina
     * @return void
     */
    public function pagination(int $limit): void
    {
        $this->limit = $limit;
        $this->resetPage();
    }

    /**
     * Cierra modal y restablece formulario
     *
     * @return void
     */
    public function closeModalAndResetForm(): void
    {
        $this->resetInputFields();
        $this->dispatch('hideModal');
    }

    /**
     * Función botón cancelar
     *
     * @return void
     */
    public function cancel(): void
    {
        $this->closeModalAndResetForm();
    }

    /**
     * Función para resetear los campos del formulario
     *
     * @return void
     */
    public function resetInputFields(): void
    {
        $this->categoryId = null;
        $this->name = null;
        $this->deleteMode = false;
        $this->resetErrorBag();
    }

    /**
     * Función para crear un registro
     *
     * @return void
     */
    public function store(): void
    {
        $this->validate([
            'name' => 'required',
        ]);

        try {
            $category = CategoryModel::create([
                'name' => $this->name,
            ]);

            $this->dispatch('showCustomMessage', type: 'success', message: __('inventory::layout.create_category_success'));
        } catch (\Throwable $th) {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.create_category_error'));
        }

        $this->closeModalAndResetForm();
    }

    /**
     * Función para editar registro
     *
     * @param int $categoryId
     * @return void
     */
    public function edit(int $categoryId): void
    {
        $category = CategoryModel::find($categoryId);
        if (!$category) {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.category_not_found'));
            $this->closeModalAndResetForm();
            return;
        }

        $this->categoryId = $categoryId;
        $this->name = $category->name;
    }

    /**
     * Función actualizar registro
     *
     * @return void
     */
    public function update(): void
    {
        $this->validate([
            'name' => 'required',
        ]);

        $category = CategoryModel::find($this->categoryId);
        if (!$category) {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.category_not_found'));
            $this->closeModalAndResetForm();
            return;
        }

        try {
            $category->update([
                'name' => $this->name,
            ]);

            $this->dispatch('showCustomMessage', type: 'success', message: __('inventory::layout.update_category_success'));
        } catch (\Throwable $th) {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.update_category_error'));
        }

        $this->closeModalAndResetForm();
    }

    /**
     * Función para eliminar registro
     *
     * @param int $categoryId
     * @return void
     */
    public function delete(int $categoryId): void
    {
        $category = CategoryModel::find($categoryId);
        if (!$category) {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.category_not_found'));
            $this->closeModalAndResetForm();
            return;
        }

        $this->categoryId = $categoryId;
        $this->name = $category->name;
        $this->deleteMode = true;
    }

    /**
     * Función para confirmar eliminar registro
     *
     * @return void
     */
    public function destroy(): void
    {
        $category = CategoryModel::find($this->categoryId);
        if (!$category) {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.category_not_found'));
            $this->closeModalAndResetForm();
            return;
        }

        // verificar si tiene productos
        if ($category->products()->count() > 0) {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.category_not_delete_has_products'));
            $this->closeModalAndResetForm();
            return;
        }

        if ($category->delete()) {
            $this->dispatch('showCustomMessage', type: 'success', message: __('inventory::layout.delete_category_success'));
        } else {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.delete_category_error'));
        }
        $this->closeModalAndResetForm();
    }
}
