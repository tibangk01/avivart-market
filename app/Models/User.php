<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property int $id
 * @property int $exercise_id
 * @property int $user_type_id
 * @property int $civility_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $phone_number
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Civility $civility
 * @property Exercise $exercise
 * @property UserType $user_type
 * @property Collection|Human[] $humans
 * @property Collection|Person[] $people
 *
 * @package App\Models
 */
class User extends Authenticatable
{

	use SoftDeletes, HasFactory, Notifiable;
	protected $table = 'users';

	protected $casts = [
		'exercise_id' => 'int',
		'user_type_id' => 'int',
		'civility_id' => 'int'
	];

	protected $fillable = [
		'exercise_id',
		'user_type_id',
		'civility_id',
		'first_name',
		'last_name',
		'email',
		'phone_number'
	];

	public function civility()
	{
		return $this->belongsTo(Civility::class);
	}

	public function exercise()
	{
		return $this->belongsTo(Exercise::class);
	}

	public function user_type()
	{
		return $this->belongsTo(UserType::class);
	}

	public function humans()
	{
		return $this->hasMany(Human::class);
	}

	public function people()
	{
		return $this->hasMany(Person::class);
	}

    public function getFullNameAttribute()
    {
        return $this->last_name.' '.$this->first_name;
    }
}
