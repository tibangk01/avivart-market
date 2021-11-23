<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuickSale
 * 
 * @property int $id
 * @property int $product_id
 * @property int $vat_id
 * @property int $discount_id
 * @property int $order_state_id
 * @property int $quantity
 * @property float $selling_price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Product $product
 * @property Vat $vat
 * @property Discount $discount
 *
 * @package App\Models
 */
class QuickSale extends Model
{
	protected $table = 'quick_sales';

	protected $casts = [
		'product_id' => 'int',
		'vat_id' => 'int',
		'discount_id' => 'int',
		'order_state_id' => 'int',
		'quantity' => 'int',
		'selling_price' => 'float'
	];

	protected $fillable = [
		'product_id',
		'vat_id',
		'discount_id',
		'order_state_id',
		'quantity',
		'selling_price',
		'paid',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
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
		return ($this->vat !== null)
			? $this->totalHT() - ($this->totalHT() * $this->vat->percentage)
			: 0;
	}

	public function totalHT(): float
	{
		return $this->selling_price * $this->quantity;
	}

	public function __toString()
    {
        return $this->getNumber();
    }
}
