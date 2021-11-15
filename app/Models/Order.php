<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $customer_id
 * @property int $vat_id
 * @property int $discount_id
 * @property int $order_state_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Customer $customer
 * @property Vat $vat
 * @property Discount $discount
 * @property OrderState $order_state
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';

	protected $casts = [
		'customer_id' => 'int',
		'vat_id' => 'int',
		'discount_id' => 'int',
		'order_state_id' => 'int',
	];

	protected $fillable = [
		'customer_id',
		'vat_id',
		'discount_id',
		'order_state_id',
		'has_delivery_note',
		'paid',
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function vat()
	{
		return $this->belongsTo(Vat::class);
	}

	public function discount()
	{
		return $this->belongsTo(Discount::class);
	}

	public function order_state()
	{
		return $this->belongsTo(OrderState::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class, 'product_order')
					->withPivot('id', 'quantity', 'global_selling_price', 'selling_price', 'global_rental_price', 'rental_price', 'comment')
					->withTimestamps();
	}

	public function getOrderStateStyle(): string
	{
		$bgColor = '';

		switch (intval($this->order_state_id)) {
			case 1:	//en entente
				$bgColor = 'table-warning';
				break;

			case 2:	//en cours de livraison
				$bgColor = 'table-white';
				break;

			case 3:	//livrée
				$bgColor = $this->paid ? 'table-success' : 'table-danger';
				break;
			
			default:	//annulée
				$bgColor = 'table-primary';
				break;
		}

		return $bgColor;
	}

	public function getPaid()
    {
        return $this->paid ? 'Payer' : 'Non payer';
    }

    public function getVat()
    {
        return ($this->vat !== null) ? $this->vat->percentage : 0;
    }

    public function getDiscount()
    {
        return ($this->discount !== null) ? $this->discount->amount : 0;
    }

    public function getBgColor()
    {
        return $this->paid ? 'table-success' : 'table-danger';
    }

	public function getNumber()
	{
		return Carbon::parse($this->created_at)->format('dmYHis');
	}

	public function totalTTC(): float
	{
		return ($this->discount !== null)
			? ($this->totalHT() + $this->totalTVA()) - $this->discount->amount
			: $this->totalHT() + $this->totalTVA();
	}

	public function totalTVA(): float
	{
		$totalTVA = 0;

		if ($this->products->count()) {
			foreach ($this->products as $product) {
				$totalTVA += ($this->vat !== null)
					? $product->pivot->selling_price - ($product->pivot->selling_price * $this->vat->percentage)
					: 0;
			}
		}

		return $totalTVA;
	}

	public function totalHT(): float
	{
		$totalHT = 0;

		if ($this->products->count()) {
			foreach ($this->products as $product) {
				$totalHT += $product->pivot->selling_price * $product->pivot->quantity;
			}
		}

		return $totalHT;
	}

	public function __toString()
    {
        return $this->getNumber();
    }
}
