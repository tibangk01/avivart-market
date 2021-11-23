<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuickSalePayment
 * 
 * @property int $id
 * @property int $quick_sale_id
 * @property int $payment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property QuickSale $quick_sale
 * @property Payment $payment
 *
 * @package App\Models
 */
class QuickSalePayment extends Model
{
	protected $table = 'quick_sale_payments';

	protected $casts = [
		'quick_sale_id' => 'int',
		'payment_id' => 'int'
	];

	protected $fillable = [
		'quick_sale_id',
		'payment_id'
	];

	public function quick_sale()
	{
		return $this->belongsTo(QuickSale::class);
	}

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}

	public function scopeTotalPayment($query, QuickSale $quickSale)
	{
		$totalPayment = 0;

		if ($quickSalePayments = $query->where('quick_sale_id', $quickSale->id)->get()) {
            foreach ($quickSalePayments as $quickSalePayment) {
                $totalPayment += $quickSalePayment->payment->amount;
            }
        }

        return $totalPayment;
	}

	public function scopeRemnantPayment($query, QuickSale $quickSale)
	{
        return $quickSale->totalTTC() - $this->totalPayment($quickSale);
	}
}
