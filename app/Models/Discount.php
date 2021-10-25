<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Discount
 * 
 * @property int $id
 * @property float $amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Order[] $orders
 * @property Collection|Proforma[] $proformas
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Discount extends Model
{
	protected $table = 'discounts';

	protected $casts = [
		'amount' => 'float'
	];

	protected $fillable = [
		'amount'
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

    public function __toString()
    {
        return strval($this->amount);
    }
}
