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
		'password_changed',
		'contract_type_id',
		'study_level_id',
		'date_of_birth',
		'place_of_birth',
		'serial_number',
		'hiring_date',
		'contract_end_date',
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

	public function contract_type()
	{
		return $this->belongsTo(ContractType::class);
	}

	public function study_level()
	{
		return $this->belongsTo(StudyLevel::class);
	}

	public function developers()
	{
		return $this->hasMany(Developer::class);
	}

	public function staffs()
	{
		return $this->hasMany(Staff::class);
	}
}
