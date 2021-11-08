<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provider;
use App\Models\Customer;
use App\Models\Vat;
use App\Models\Discount;
use App\Models\OrderState;
use \Cart;

class CartList extends Component
{
    protected $listeners = ['cartChanged' => '$refresh'];

    public string $instance;

    public $providers;

    public $customers;

    public $vats;

    public $discounts;

    public $orderStates;

    public string $routeName;

    public function mount(string $instance)
    {
        $this->instance = $instance;

        $this->providers = Provider::all();

        $this->customers = Customer::all();

        $this->vats = Vat::all();

        $this->discounts = Discount::all();

        $this->orderStates = OrderState::all();

        switch ($this->instance) {
            case 'purchase':
                $this->routeName = 'purchase.store';
                break;

            case 'proforma':
                $this->routeName = 'proforma.store';
                break;

            case 'order':
                $this->routeName = 'order.store';
                break;
            
            default:
                $this->routeName = 'cart.checkout';
                break;
        }
    }

    public function render()
    {
        return view('livewire.cart-list', [
            'rows' => Cart::instance($this->instance)->content()
        ]);
    }

    public function removeProduct(int $id)
    {
        Cart::instance($this->instance)->remove($this->getRowId($id));
    }

    public function updateQuantity(int $id, int $quantity)
    {
        Cart::instance($this->instance)->update($this->getRowId($id), $quantity);
    }

    public function getRowId(int $id)
    {
        $rowId;

        foreach (Cart::instance($this->instance)->content() as $key => $row) {
            if ($row->id === $id) {
                $rowId = $key;

                break;
            }
        }

        return $rowId;
    }

    public function truncate()
    {
        Cart::instance($this->instance)->destroy();

        if (session()->has('loadedProforma')) {
            session()->forget('loadedProforma');
        }
    }
}
