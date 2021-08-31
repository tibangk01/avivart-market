<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @property int $id
 * @property int $user_type_id
 * @property int $civility_id
 * @property int $library_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $phone_number
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property UserType $user_type
 * @property Library $library
 * @property Civility $civility
 * @property Collection|Human[] $humans
 * @property Collection|Person[] $people
 *
 * @package App\Models
 */
class User extends Model
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'user_type_id' => 'int',
		'civility_id' => 'int',
		'library_id' => 'int'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'user_type_id',
		'civility_id',
		'library_id',
		'first_name',
		'last_name',
		'email',
		'phone_number',
		'remember_token'
	];

	public function user_type()
	{
		return $this->belongsTo(UserType::class);
	}

	public function library()
	{
		return $this->belongsTo(Library::class);
	}

	public function civility()
	{
		return $this->belongsTo(Civility::class);
	}

	public function humans()
	{
		return $this->hasMany(Human::class);
	}

	public function people()
	{
		return $this->hasMany(Person::class);
	}
}
