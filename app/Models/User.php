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
class User extends Authenticatable
{
	use SoftDeletes, HasFactory, Notifiable;

	protected $table = 'users';

	protected $casts = [
		'user_type_id' => 'int',
		'civility_id' => 'int',
		'library_id' => 'int',
		'country_id' => 'int'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'user_type_id',
		'civility_id',
		'country_id',
		'library_id',
		'first_name',
		'last_name',
		'email',
		'phone_number',
		'address',
		'city',
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

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function humans()
	{
		return $this->hasMany(Human::class);
	}

	public function people()
	{
		return $this->hasMany(Person::class);
	}

	public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = mb_strtoupper($value);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = mb_strtoupper($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = ucwords($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = mb_strtolower($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name}";
    }
}
