<?php

namespace Modules\Inventory\Livewire\Product;

// Librerías
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

// Modelos
use Modules\Inventory\Models\Category;
use Modules\Inventory\Models\Product as ProductModel;

class Product extends Component
{
    use WithPagination;

    // Buscador y límite de paginación
    public $search, $lastSearch, $limit = 10;
    // Modo Eliminación
    public bool $deleteMode = false;
    // Catálogos
    public array $categories = [];
    // Generales
    public $productId, $categoryId, $name, $sku, $salePrice, $photo, $photoUrl, $active = true;

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

    public function mount(): void
    {
        abort_unless(auth()->user()->can('read product'), 403, 'Access Denied');

        $this->categories = Category::all()->pluck('name', 'id')->toArray();
    }

    public function render(): View
    {
        $baseQuery = ProductModel::orderBy('name', 'asc')
            ->with(['category']);

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

        $products = $baseQuery->paginate($this->limit);
        return view('inventory::livewire.product.product', compact('products'));
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
        $this->productId = null;
        $this->categoryId = null;
        $this->name = null;
        $this->sku = null;
        $this->salePrice = null;
        $this->photo = null;
        $this->photoUrl = null;
        $this->active = true;
        $this->deleteMode = false;
        $this->resetErrorBag();
    }

    public function store(): void
    {
        $this->resetErrorBag();
        $this->validate([
            'categoryId' => 'required',
            'name' => 'required',
            'sku' => 'required',
            'salePrice' => 'required|numeric|min:0',
        ]);

        // verificar que el sku sea único
        $skuExists = ProductModel::where('sku', $this->sku)->first();
        if ($skuExists) {
            $this->addError('sku', __('inventory::layout.sku_exists'));
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.sku_exists'));
            return;
        }

        // crea el producto
        $product = ProductModel::create([
            'category_id' => $this->categoryId,
            'name' => $this->name,
            'sku' => $this->sku,
            'sale_price' => $this->salePrice,
            'active' => $this->active ? 1 : 0,
        ]);

        if ($product) {
            $this->dispatch('showCustomMessage', type: 'success', message: __('inventory::layout.create_product_success'));
        } else {
            $this->dispatch('showCustomMessage', type: 'success', message: __('inventory::layout.create_product_error'));
        }
        $this->closeModalAndResetForm();
    }

    public function edit(int $id): void
    {
        $product = ProductModel::find($id);
        if (!$product) {
            $this->dispatch('showCustomMessage', type: 'error', message: __('inventory::layout.product_not_found'));
            $this->closeModalAndResetForm();
            return;
        }

        $this->productId = $product->id;
        $this->categoryId = $product->category_id;
        $this->name = $product->name;
        $this->sku = $product->sku;
        $this->salePrice = $product->sale_price;
        $this->active = (bool)$product->active;
    }
}
