<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CashRegister
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class CashRegister extends Model
{
	protected $table = 'cash_registers';

	protected $fillable = [
		'name'
	];

    public function __toString()
    {
        return $this->name;
    }
}
