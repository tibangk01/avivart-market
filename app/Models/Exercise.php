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
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Exercise extends Model
{
	protected $table = 'exercises';

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'start_date',
		'end_date'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
