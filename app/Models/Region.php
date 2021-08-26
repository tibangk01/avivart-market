<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Agency[] $agencies
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'regions';

	protected $fillable = [
		'code',
		'name'
	];

	public function agencies()
	{
		return $this->hasMany(Agency::class);
	}
}
