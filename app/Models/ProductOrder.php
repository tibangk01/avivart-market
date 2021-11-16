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
 * @property float $global_selling_price
 * @property float $selling_price
 * @property float $global_rental_price
 * @property float $rental_price
 * @property string|null $comment
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
		'quantity' => 'int',
		'global_selling_price' => 'float',
		'selling_price' => 'float',
		'global_rental_price' => 'float',
		'rental_price' => 'float'
	];

	protected $fillable = [
		'product_id',
		'order_id',
		'quantity',
		'global_selling_price',
		'selling_price',
		'global_rental_price',
		'rental_price',
		'comment',
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
