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
 * @property int|null $work_id
 * @property string|null $signature
 * @property string|null $username
 * @property string|null $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property bool|null $password_changed
 * 
 * @property User $user
 * @property Work|null $work
 * @property Collection|Developer[] $developers
 * @property Collection|Staff[] $staff
 *
 * @package App\Models
 */
class Human extends Model
{
	protected $table = 'humans';

	protected $casts = [
		'user_id' => 'int',
		'work_id' => 'int',
		'password_changed' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'user_id',
		'work_id',
		'role_id',
		'signature',
		'username',
		'password',
		'password_changed'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function work()
	{
		return $this->belongsTo(Work::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
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
