<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductProforma
 * 
 * @property int $id
 * @property int $product_id
 * @property int $proforma_id
 * @property int $quantity
 * @property float $global_selling_price
 * @property float $selling_price
 * @property float $global_rental_price
 * @property float $rental_price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Product $product
 * @property Proforma $proforma
 *
 * @package App\Models
 */
class ProductProforma extends Model
{
	protected $table = 'product_proforma';

	protected $casts = [
		'id' => 'int',
		'product_id' => 'int',
		'proforma_id' => 'int',
		'quantity' => 'int',
		'global_selling_price' => 'float',
		'selling_price' => 'float',
		'global_rental_price' => 'float',
		'rental_price' => 'float'
	];

	protected $fillable = [
		'product_id',
		'proforma_id',
		'quantity',
		'global_selling_price',
		'selling_price',
		'global_rental_price',
		'rental_price',
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
