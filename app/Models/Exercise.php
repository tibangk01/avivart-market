<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Exercise
 * 
 * @property int $id
 * @property int $currency_id
 * @property string $title
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Currency $currency
 * @property Collection|DayTransaction[] $day_transactions
 *
 * @package App\Models
 */
class Exercise extends Model
{
	protected $table = 'exercises';

	protected $casts = [
		'currency_id' => 'int'
	];

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'currency_id',
		'title',
		'start_date',
		'end_date'
	];

	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	public function day_transactions()
	{
		return $this->hasMany(DayTransaction::class);
	}

	public function getPeriod(string $separator = ' au ')
	{
		return $this->start_date->format('d/m/Y') . $separator . $this->end_date->format('d/m/Y');
	}

	public function __toString()
	{
		return $this->getPeriod();
	}
}
