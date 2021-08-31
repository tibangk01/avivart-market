<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 * 
 * @property int $id
 * @property string $name
 * @property int $product_ray_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ProductRay $product_ray
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class ProductCategory extends Model
{
	protected $table = 'product_categories';

	protected $casts = [
		'product_ray_id' => 'int'
	];

	protected $fillable = [
		'name',
		'product_ray_id'
	];

	public function product_ray()
	{
		return $this->belongsTo(ProductRay::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
