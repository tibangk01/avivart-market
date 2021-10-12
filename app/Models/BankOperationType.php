<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BankOperationType
 * 
 * @property int $id
 * @property string $name
 * @property bool $state
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|BankOperation[] $bank_operations
 *
 * @package App\Models
 */
class BankOperationType extends Model
{
	protected $table = 'bank_operation_types';

	protected $casts = [
		'state' => 'bool'
	];

	protected $fillable = [
		'name',
		'state'
	];

	public function bank_operations()
	{
		return $this->hasMany(BankOperation::class);
	}

    public function getForeColor()
    {
        return $this->state ? 'text-success' : 'text-danger';
    }

    public function __toString()
    {
        return $this->name;
    }
}
