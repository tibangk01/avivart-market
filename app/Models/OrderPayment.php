<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderPayment
 * 
 * @property int $id
 * @property int $order_id
 * @property int $payment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Order $order
 * @property Payment $payment
 *
 * @package App\Models
 */
class OrderPayment extends Model
{
	protected $table = 'order_payments';

	protected $casts = [
		'order_id' => 'int',
		'payment_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'payment_id'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}
}
