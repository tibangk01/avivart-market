<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proforma
 * 
 * @property int $id
 * @property int $customer_id
 * @property int $vat_id
 * @property int $discount_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Customer $customer
 * @property Discount $discount
 * @property Vat $vat
 * @property Collection|ProductOrder[] $product_orders
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Proforma extends Model
{
	protected $table = 'proformas';

	protected $casts = [
		'customer_id' => 'int',
		'vat_id' => 'int',
		'discount_id' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'vat_id',
		'discount_id'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function discount()
	{
		return $this->belongsTo(Discount::class);
	}

	public function vat()
	{
		return $this->belongsTo(Vat::class);
	}

	public function product_orders()
	{
		return $this->hasMany(ProductOrder::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class, 'product_proforma')
					->withPivot('id', 'quantity')
					->withTimestamps();
	}

	public function getNumber()
	{
		return Carbon::parse($this->created_at)->format('dmYHis');
	}

	public function totalTTC()
	{
		return ($this->totalHT() + $this->totalTVA()) - $this->discount->amount;
	}

	public function totalTVA()
	{
		$totalTVA = 0;

		if ($this->products->count()) {
			foreach ($this->products as $product) {
				$totalTVA += $product->selling_price * $this->vat->percentage;
			}
		}

		return $totalTVA;
	}

	public function totalHT()
	{
		$totalHT = 0;

		if ($this->products->count()) {
			foreach ($this->products as $product) {
				$totalHT += $product->selling_price * $product->pivot->quantity;
			}
		}

		return $totalHT;
	}
}
