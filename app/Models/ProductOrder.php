<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductOrder
 * 
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Product $product
 * @property Order $order
 *
 * @package App\Models
 */
class ProductOrder extends Model
{
	protected $table = 'product_order';

	protected $casts = [
		'id' => 'int',
		'product_id' => 'int',
		'order_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'quantity'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
