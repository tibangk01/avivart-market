<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $about
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = [
		'name',
		'about'
	];

	public function users()
	{
		return $this->belongsToMany(User::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function __toString()
    {
        return $this->name;
    }
}
