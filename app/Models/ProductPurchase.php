<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductPurchase
 * 
 * @property int $id
 * @property int $product_id
 * @property int $purchase_id
 * @property int $ordered_quantity
 * @property int $delivered_quantity
 * @property float $global_purchase_price
 * @property float $purchase_price
 * @property string|null $comment
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Product $product
 * @property Purchase $purchase
 * @property Collection|Supply[] $supplies
 *
 * @package App\Models
 */
class ProductPurchase extends Model
{
	protected $table = 'product_purchase';

	protected $casts = [
		'id' => 'int',
		'product_id' => 'int',
		'purchase_id' => 'int',
		'ordered_quantity' => 'int',
		'delivered_quantity' => 'int',
		'global_purchase_price' => 'float',
		'purchase_price' => 'float'
	];

	protected $fillable = [
		'product_id',
		'purchase_id',
		'ordered_quantity',
		'delivered_quantity',
		'global_purchase_price',
		'purchase_price',
		'comment',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function purchase()
	{
		return $this->belongsTo(Purchase::class);
	}

	public function supplies()
	{
		return $this->hasMany(Supply::class, 'product_purchase_id', 'id');
	}
}
