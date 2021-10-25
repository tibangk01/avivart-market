<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchasePayment
 * 
 * @property int $id
 * @property int $purchase_id
 * @property int $payment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Purchase $purchase
 * @property Payment $payment
 *
 * @package App\Models
 */
class PurchasePayment extends Model
{
	protected $table = 'purchase_payments';

	protected $casts = [
		'purchase_id' => 'int',
		'payment_id' => 'int'
	];

	protected $fillable = [
		'purchase_id',
		'payment_id'
	];

	public function purchase()
	{
		return $this->belongsTo(Purchase::class);
	}

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}
}
