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
 * @property int $payment_mode_id
 * @property float $amount
 * @property string $cheque_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property PaymentMode $payment_mode
 * @property Collection|Order[] $orders
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';

	protected $casts = [
		'payment_mode_id' => 'int',
		'amount' => 'float'
	];

	protected $fillable = [
		'payment_mode_id',
		'amount',
		'state',
		'cheque_number',
	];

	public function payment_mode()
	{
		return $this->belongsTo(PaymentMode::class);
	}

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
