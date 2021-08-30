<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Civility
 * 
 * @property int $id
 * @property int $gender_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Gender $gender
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Civility extends Model
{
	protected $table = 'civilities';

	protected $casts = [
		'gender_id' => 'int'
	];

	protected $fillable = [
		'gender_id',
		'name'
	];

	public function gender()
	{
		return $this->belongsTo(Gender::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
