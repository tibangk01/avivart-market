<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vat
 * 
 * @property int $id
 * @property float $percentage
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Order[] $orders
 * @property Collection|Proforma[] $proformas
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Vat extends Model
{
	protected $table = 'vats';

	protected $casts = [
		'percentage' => 'float'
	];

	protected $fillable = [
		'percentage'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function proformas()
	{
		return $this->hasMany(Proforma::class);
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class);
	}
}
