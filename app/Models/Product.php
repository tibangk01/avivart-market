<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property int $library_id
 * @property int $product_category_id
 * @property int $conversion_id
 * @property int $currency_id
 * @property string $name
 * @property float $price
 * @property int $stock_quantity
 * @property int $sold_quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ProductCategory $product_category
 * @property Conversion $conversion
 * @property Currency $currency
 * @property Library $library
 * @property Collection|ProductOrder[] $product_orders
 * @property Collection|Proforma[] $proformas
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'library_id' => 'int',
		'product_category_id' => 'int',
		'conversion_id' => 'int',
		'currency_id' => 'int',
		'price' => 'float',
		'stock_quantity' => 'int',
		'sold_quantity' => 'int'
	];

	protected $fillable = [
		'library_id',
		'product_category_id',
		'conversion_id',
		'currency_id',
		'name',
		'price',
		'stock_quantity',
		'sold_quantity'
	];

	public function product_category()
	{
		return $this->belongsTo(ProductCategory::class);
	}

	public function conversion()
	{
		return $this->belongsTo(Conversion::class);
	}

	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	public function library()
	{
		return $this->belongsTo(Library::class);
	}

	public function product_orders()
	{
		return $this->hasMany(ProductOrder::class);
	}

	public function proformas()
	{
		return $this->belongsToMany(Proforma::class)
					->withPivot('id', 'quantity')
					->withTimestamps();
	}

	public function purchases()
	{
		return $this->belongsToMany(Purchase::class)
					->withPivot('id', 'ordered_quantity', 'delivered_quantity')
					->withTimestamps();
	}
}
