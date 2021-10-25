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
 * @property int $work_id
 * @property int $contract_type_id
 * @property int $study_level_id
 * @property string $serial_number
 * @property Carbon|null $date_of_birth
 * @property string|null $place_of_birth
 * @property Carbon|null $hiring_date
 * @property Carbon|null $contract_end_date
 * @property string|null $signature
 * @property string|null $username
 * @property string|null $password
 * @property bool|null $password_changed
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Work $work
 * @property ContractType $contract_type
 * @property StudyLevel $study_level
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
		'contract_type_id' => 'int',
		'study_level_id' => 'int',
		'password_changed' => 'bool'
	];

	protected $dates = [
		'date_of_birth',
		'hiring_date',
		'contract_end_date'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'user_id',
		'work_id',
		'contract_type_id',
		'study_level_id',
		'serial_number',
		'date_of_birth',
		'place_of_birth',
		'hiring_date',
		'contract_end_date',
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

	public function staff()
	{
		return $this->hasMany(Staff::class);
	}
}
