<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supply
 * 
 * @property int $id
 * @property int $product_purchase_id
 * @property int $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ProductPurchase $product_purchase
 *
 * @package App\Models
 */
class Supply extends Model
{
	protected $table = 'supplies';

	protected $casts = [
		'product_purchase_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'product_purchase_id',
		'quantity'
	];

	public function product_purchase()
	{
		return $this->belongsTo(ProductPurchase::class, 'product_purchase_id', 'id');
	}

	public function getNumber()
	{
		return Carbon::parse($this->created_at)->format('dmYHis');
	}

	/**
	 * */
	public function scopeCountSupplies($query, Exercise $exercise, Product $product) : int
    {
    	$quantities = 0;

    	$supplies = $query->whereHas('product_purchase', function ($q) use ($exercise, $product) {
    		$q->where('product_id', $product->id);
    	})->whereBetween('created_at', [$exercise->start_date->format('Y-m-d'), $exercise->end_date->format('Y-m-d')])
    	->get();

    	if ($supplies->count()) {
    		foreach ($supplies as $supply) {
    			$quantities += $supply->quantity;
    		}
    	}

    	return $quantities;
    }
}
