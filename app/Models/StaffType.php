<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StaffType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Staff[] $staff
 *
 * @package App\Models
 */
class StaffType extends Model
{
	protected $table = 'staff_types';

	protected $fillable = [
		'name'
	];

	public function staff()
	{
		return $this->hasMany(Staff::class);
	}
}
