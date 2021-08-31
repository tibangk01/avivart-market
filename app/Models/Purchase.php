<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 * 
 * @property int $id
 * @property int $provider_id
 * @property int $vat_id
 * @property int $discount_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Provider $provider
 * @property Vat $vat
 * @property Discount $discount
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Purchase extends Model
{
	protected $table = 'purchases';

	protected $casts = [
		'provider_id' => 'int',
		'vat_id' => 'int',
		'discount_id' => 'int'
	];

	protected $fillable = [
		'provider_id',
		'vat_id',
		'discount_id'
	];

	public function provider()
	{
		return $this->belongsTo(Provider::class);
	}

	public function vat()
	{
		return $this->belongsTo(Vat::class);
	}

	public function discount()
	{
		return $this->belongsTo(Discount::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class)
					->withPivot('id', 'ordered_quantity', 'delivered_quantity')
					->withTimestamps();
	}
}
