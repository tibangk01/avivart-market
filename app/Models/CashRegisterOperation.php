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
 * @property int $cash_operation_type_id
 * @property string $name
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
		'cash_operation_type_id' => 'int'
	];

	protected $fillable = [
		'cash_operation_type_id',
		'name'
	];

	public function cash_register_operation_type()
	{
		return $this->belongsTo(CashRegisterOperationType::class, 'cash_operation_type_id');
	}
}
