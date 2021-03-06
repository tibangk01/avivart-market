<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Human
 * 
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Developer[] $developers
 * @property Collection|Staff[] $staff
 *
 * @package App\Models
 */
class Human extends Model
{
	protected $table = 'humans';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'user_id',
		'username',
		'password'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function developers()
	{
		return $this->hasMany(Developer::class);
	}

	public function staff()
	{
		return $this->hasMany(Staff::class);
	}
}
