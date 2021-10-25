<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property int $id
 * @property float $amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Order[] $orders
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';

	protected $casts = [
		'amount' => 'float'
	];

	protected $fillable = [
		'amount'
	];

	public function orders()
	{
		return $this->belongsToMany(Order::class, 'order_payments')
					->withPivot('id')
					->withTimestamps();
	}

	public function purchases()
	{
		return $this->belongsToMany(Purchase::class, 'purchase_payments')
					->withPivot('id')
					->withTimestamps();
	}
}
