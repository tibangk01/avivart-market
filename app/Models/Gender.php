<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gender
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Civility[] $civilities
 *
 * @package App\Models
 */
class Gender extends Model
{
	protected $table = 'genders';

	protected $fillable = [
		'name'
	];

	public function civilities()
	{
		return $this->hasMany(Civility::class);
	}
}
