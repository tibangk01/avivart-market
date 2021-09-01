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
 * @property int $proforma_id
 * @property int $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Product $product
 * @property Proforma $proforma
 *
 * @package App\Models
 */
class ProductOrder extends Model
{
	protected $table = 'product_order';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'product_id' => 'int',
		'proforma_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'id',
		'quantity'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function proforma()
	{
		return $this->belongsTo(Proforma::class);
	}
}