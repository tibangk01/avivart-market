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
}
