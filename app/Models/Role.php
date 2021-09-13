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
 * @property Carbon $created
 * @property Carbon $modified
 * 
 * @property Collection|Human[] $humans
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	public $timestamps = false;

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'name',
		'about',
		'created',
		'modified'
	];

	public function humans()
	{
		return $this->hasMany(Human::class);
	}
}
