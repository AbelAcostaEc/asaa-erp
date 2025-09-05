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
    public $deleteMode = false;

    public function mount()
    {
        if (!auth()->user()->hasPermissionTo('read category')) {
//            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        $baseQuery = CategoryModel::orderBy('id', 'desc');

        $search = trim($this->search);
        if (!empty($search)) {
            if ($search != $this->last_search) {
                $this->resetPage();
            }
        }

        $categories = $baseQuery->paginate($this->limit);
        return view('inventory::livewire.category.category', compact('categories'));
    }
}
