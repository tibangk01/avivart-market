<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bank
 * 
 * @property int $id
 * @property string $name
 * @property string $account_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|BankOperation[] $bank_operations
 *
 * @package App\Models
 */
class Bank extends Model
{
	protected $table = 'banks';

	protected $fillable = [
		'name',
		'account_number'
	];

	public function bank_operations()
	{
		return $this->hasMany(BankOperation::class);
	}

    public function __toString()
    {
        return $this->name;
    }
}
