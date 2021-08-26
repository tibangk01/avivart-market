<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserType
 * 
 * @property int $id
 * @property string $name
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class UserType extends Model
{
	protected $table = 'user_types';

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'name',
		'remember_token'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
