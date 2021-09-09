<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CashRegisterOperationType
 * 
 * @property int $id
 * @property string $name
 * @property bool $is_opening
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|CashRegisterOperation[] $cash_register_operations
 *
 * @package App\Models
 */
class CashRegisterOperationType extends Model
{
	protected $table = 'cash_register_operation_types';

	protected $casts = [
		'is_opening' => 'bool'
	];

	protected $fillable = [
		'name',
		'is_opening'
	];

	public function cash_register_operations()
	{
		return $this->hasMany(CashRegisterOperation::class, 'cash_operation_type_id');
	}
}