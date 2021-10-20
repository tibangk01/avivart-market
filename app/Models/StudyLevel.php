<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudyLevel
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Human[] $humans
 *
 * @package App\Models
 */
class StudyLevel extends Model
{
	protected $table = 'study_levels';

	protected $fillable = [
		'name'
	];

	public function humans()
	{
		return $this->hasMany(Human::class);
	}

	public function __toString()
    {
        return $this->name;
    }
}
