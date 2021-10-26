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
 * @property int|null $person_id
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
		'person_id' => 'int',
		'corporation_id' => 'int'
	];

	protected $fillable = [
		'person_type_id',
		'person_ray_id',
		'person_id',
		'corporation_id'
	];

	public function person()
	{
		return $this->belongsTo(Person::class);
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

	public function getInstance()
	{
		return ($this->person_type_id == 1) ? $this->corporation : $this->person;
	}

	public function getLibrary()
	{
		$library = null;

		if (($provider = $this->getInstance()) instanceof Corporation) {
			$library = $provider->enterprise->library;
		} else {
			$library = $provider->user->library;
		}

		return $library;
	}

	public function getName()
	{
		$name = null;

		if (($provider = $this->getInstance()) instanceof Corporation) {
			$name = $provider->enterprise->name;
		} else {
			$name = $provider->user->full_name;
		}

		return $name;
	}

	public function getFullPhoneNumber()
	{
		$phoneNumber = null;

		if (($provider = $this->getInstance()) instanceof Corporation) {
			$phoneNumber =  '+' . $provider->enterprise->country->phonecode . ' ' . $provider->enterprise->phone_number;
		} else {
			$phoneNumber =  '+' . $provider->user->country->phonecode . ' ' . $provider->user->phone_number;
		}

		return $phoneNumber;
	}

	public function __toString()
	{
		return $this->getName();
	}
}
