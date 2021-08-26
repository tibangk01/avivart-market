<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Exercice
 * 
 * @property int $id
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Exercice extends Model
{
	protected $table = 'exercices';

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'start_date',
		'end_date'
	];
}
