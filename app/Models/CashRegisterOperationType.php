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
 * @property bool $state
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
		'state' => 'bool'
	];

	protected $fillable = [
		'name',
		'state'
	];

	public function cash_register_operations()
	{
		return $this->hasMany(CashRegisterOperation::class, 'cash_operation_type_id');
	}

    public function getForeColor()
    {
        return $this->state ? 'text-success' : 'text-danger';
    }

    public function getBgColor()
    {
        return $this->state ? 'table-success' : 'table-danger';
    }

    public function getStateText()
    {
        return $this->state ? 'Entrée' : 'Sortie';
    }

    public function __toString()
    {
        return $this->name . ' (' . $this->getStateText() . ')';
    }
}
