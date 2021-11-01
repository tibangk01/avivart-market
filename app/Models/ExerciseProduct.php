<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExerciseProduct
 * 
 * @property int $id
 * @property int $exercise_id
 * @property int $product_id
 * @property int $initial_stock
 * @property int $final_stock
 * @property float $global_purchase_price
 * @property float $purchase_price
 * @property float $global_selling_price
 * @property float $selling_price
 * @property float $global_rental_price
 * @property float $rental_price
 * @property int $loss
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Exercise $exercise
 * @property Product $product
 *
 * @package App\Models
 */
class ExerciseProduct extends Model
{
	protected $table = 'exercise_product';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'exercise_id' => 'int',
		'product_id' => 'int',
		'initial_stock' => 'int',
		'final_stock' => 'int',
		'global_purchase_price' => 'float',
		'purchase_price' => 'float',
		'global_selling_price' => 'float',
		'selling_price' => 'float',
		'global_rental_price' => 'float',
		'rental_price' => 'float',
		'loss' => 'int'
	];

	protected $fillable = [
		'id',
		'initial_stock',
		'final_stock',
		'global_purchase_price',
		'purchase_price',
		'global_selling_price',
		'selling_price',
		'global_rental_price',
		'rental_price',
		'loss'
	];

	public function exercise()
	{
		return $this->belongsTo(Exercise::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
