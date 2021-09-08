<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
 * 
 * @property int $id
 * @property int $person_type_id
 * @property int $person_ray_id
 * @property int|null $people_id
 * @property int|null $corporation_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Person|null $person
 * @property Corporation|null $corporation
 * @property PersonType $person_type
 * @property PersonRay $person_ray
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Provider extends Model
{
	protected $table = 'providers';

	protected $casts = [
		'person_type_id' => 'int',
		'person_ray_id' => 'int',
		'people_id' => 'int',
		'corporation_id' => 'int'
	];

	protected $fillable = [
		'person_type_id',
		'person_ray_id',
		'people_id',
		'corporation_id'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}

	public function corporation()
	{
		return $this->belongsTo(Corporation::class);
	}

	public function person_type()
	{
		return $this->belongsTo(PersonType::class);
	}

	public function person_ray()
	{
		return $this->belongsTo(PersonRay::class);
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class);
	}
}
