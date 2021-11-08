<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use \Cart;

class ProductList extends Component
{
    use WithPagination;

    public string $instance;

    public string $search;

    public array $ids;

    public function mount(string $instance)
    {
        $this->instance = $instance;

        $this->search = '';

        $this->ids = [];
    }

    public function render()
    {
        return view('livewire.product-list', [
            'products' => Product::where('stock_quantity', '>', 0)
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate(20),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addProduct(Product $product)
    {
        Cart::instance($this->instance)->add($product, 1, array())->associate(Product::class);

        $this->emit('cartChanged');
    }

    public function addProducts()
    {
        $products = Product::find($this->ids);

        if ($products->count()) {
            foreach ($products as $product) {
                Cart::instance($this->instance)->add($product, 1, array())->associate(Product::class);
            }

            $this->emit('cartChanged');
        }
    }

    public function truncateProducts()
    {
        $this->ids = [];
    }
}
