<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CashRegisterOperation
 * 
 * @property int $id
 * @property int $cash_register_operation_type_id
 * @property float $amount
 * @property string $comment
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CashRegisterOperationType $cash_register_operation_type
 *
 * @package App\Models
 */
class CashRegisterOperation extends Model
{
	protected $table = 'cash_register_operations';

	protected $casts = [
		'cash_register_operation_type_id' => 'int'
	];

	protected $fillable = [
		'cash_register_operation_type_id',
		'amount',
		'comment',
	];

	public function cash_register_operation_type()
	{
		return $this->belongsTo(CashRegisterOperationType::class);
	}

	public function getNumber()
	{
		return Carbon::parse($this->created_at)->format('dmYHis');
	}
}
