<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DayTransaction
 * 
 * @property int $id
 * @property Carbon $day
 * @property bool $state
 * @property int $exercise_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Exercise $exercise
 * @property Collection|CashRegisterTransaction[] $cash_register_transactions
 *
 * @package App\Models
 */
class DayTransaction extends Model
{
	protected $table = 'day_transactions';

	protected $casts = [
		'state' => 'bool',
		'exercise_id' => 'int'
	];

	protected $dates = [
		'day'
	];

	protected $fillable = [
		'day',
		'state',
		'exercise_id'
	];

	public function exercise()
	{
		return $this->belongsTo(Exercise::class);
	}

	public function cash_register_transactions()
	{
		return $this->hasMany(CashRegisterTransaction::class);
	}

	public function getDay()
	{
		return $this->day->format('d/m/Y');
	}

	public function getState()
	{
		return $this->state ? 'Ouverte' : 'Fermée';
	}

	public function __toString()
	{
		return $this->getDay();
	}
}
