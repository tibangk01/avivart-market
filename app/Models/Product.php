<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

/**
 * Class Product
 * 
 * @property int $id
 * @property int $product_type_id
 * @property int $library_id
 * @property int $product_category_id
 * @property int $conversion_id
 * @property string $name
 * @property float $purchase_price
 * @property float $selling_price
 * @property float $rental_price
 * @property int $stock_quantity
 * @property int $sold_quantity
 * @property string|null $serial_number
 * @property Carbon|null $manufacture_date
 * @property Carbon|null $expiration_date
 * @property string|null $mark
 * @property string|null $ref
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ProductCategory $product_category
 * @property Conversion $conversion
 * @property Library $library
 * @property ProductType $product_type
 * @property Collection|Order[] $orders
 * @property Collection|Proforma[] $proformas
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Product extends Model implements Buyable
{
	protected $table = 'products';

	protected $casts = [
		'provider_id' => 'int',
		'product_type_id' => 'int',
		'library_id' => 'int',
		'product_category_id' => 'int',
		'conversion_id' => 'int',
		'purchase_price' => 'float',
		'selling_price' => 'float',
		'rental_price' => 'float',
		'stock_quantity' => 'int',
		'sold_quantity' => 'int'
	];

	protected $dates = [
		'manufacture_date',
		'expiration_date'
	];

	protected $fillable = [
		'provider_id',
		'product_type_id',
		'library_id',
		'product_category_id',
		'conversion_id',
		'name',
		'purchase_price',
		'selling_price',
		'rental_price',
		'stock_quantity',
		'sold_quantity',
		'serial_number',
		'manufacture_date',
		'expiration_date',
		'mark',
		'ref',
	];

	public function provider()
	{
		return $this->belongsTo(Provider::class);
	}

	public function product_category()
	{
		return $this->belongsTo(ProductCategory::class);
	}

	public function conversion()
	{
		return $this->belongsTo(Conversion::class);
	}

	public function library()
	{
		return $this->belongsTo(Library::class);
	}

	public function product_type()
	{
		return $this->belongsTo(ProductType::class);
	}

	public function orders()
	{
		return $this->belongsToMany(Order::class, 'product_order')
					->withPivot('id', 'quantity')
					->withTimestamps();
	}

	public function proformas()
	{
		return $this->belongsToMany(Proforma::class, 'product_proforma')
					->withPivot('id', 'quantity')
					->withTimestamps();
	}

	public function purchases()
	{
		return $this->belongsToMany(Purchase::class, 'product_purchase')
					->withPivot('id', 'ordered_quantity', 'delivered_quantity')
					->withTimestamps();
	}

	public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->name;
    }

    public function getBuyablePrice($options = null) {
        return $this->selling_price;
    }

    public function __toString()
    {
        return $this->name;
    }
}
