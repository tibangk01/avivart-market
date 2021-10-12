<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CashRegisterTransaction
 * 
 * @property int $id
 * @property int $day_transaction_id
 * @property int $staff_id
 * @property int $cash_register_id
 * @property float $amount
 * @property bool $state
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CashRegister $cash_register
 * @property Staff $staff
 * @property DayTransaction $day_transaction
 *
 * @package App\Models
 */
class CashRegisterTransaction extends Model
{
	protected $table = 'cash_register_transactions';

	protected $casts = [
		'day_transaction_id' => 'int',
		'staff_id' => 'int',
		'cash_register_id' => 'int',
		'amount' => 'float',
		'state' => 'bool'
	];

	protected $fillable = [
		'day_transaction_id',
		'staff_id',
		'cash_register_id',
		'amount',
		'state'
	];

	public function cash_register()
	{
		return $this->belongsTo(CashRegister::class);
	}

	public function staff()
	{
		return $this->belongsTo(Staff::class);
	}

	public function day_transaction()
	{
		return $this->belongsTo(DayTransaction::class);
	}

	public function getState()
	{
		return $this->state ? 'Ouverte' : 'Fermée';
	}
}
