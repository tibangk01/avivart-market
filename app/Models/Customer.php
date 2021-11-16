<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 *
 * @property int $id
 * @property int $person_type_id
 * @property int $person_ray_id
 * @property int|null $person_id
 * @property int|null $corporation_id
 * @property int|null $market_id
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Person|null $person
 * @property Corporation|null $corporation
 * @property Market|null $market
 * @property PersonType $person_type
 * @property PersonRay $person_ray
 * @property Collection|Order[] $orders
 * @property Collection|Proforma[] $proformas
 *
 * @package App\Models
 */
class Customer extends Model
{
	use SoftDeletes;
	protected $table = 'customers';

	protected $casts = [
		'person_type_id' => 'int',
		'person_ray_id' => 'int',
		'person_id' => 'int',
		'corporation_id' => 'int',
		'market_id' => 'int'
	];

	protected $fillable = [
		'person_type_id',
		'person_ray_id',
		'person_id',
		'corporation_id',
		'market_id'
	];

	public function person()
	{
		return $this->belongsTo(Person::class);
	}

	public function corporation()
	{
		return $this->belongsTo(Corporation::class);
	}

	public function market()
	{
		return $this->belongsTo(Market::class);
	}

	public function person_type()
	{
		return $this->belongsTo(PersonType::class);
	}

	public function person_ray()
	{
		return $this->belongsTo(PersonRay::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function proformas()
	{
		return $this->hasMany(Proforma::class);
	}

	public function getInstance()
	{
		return ($this->person_type_id == 1) ? $this->corporation : $this->person;
	}

	public function getLibrary()
	{
		$library = null;

		if (($customer = $this->getInstance()) instanceof Corporation) {
			$library = $customer->enterprise->library;
		} else {
			$library = $customer->user->library;
		}

		return $library;
	}

	public function getName()
	{
		$name = null;

		if (($customer = $this->getInstance()) instanceof Corporation) {
			$name = $customer->enterprise->name;
		} else {
			$name = $customer->user->full_name;
		}

		return $name;
	}

	public function getFullPhoneNumber()
	{
		$phoneNumber = null;

		if (($customer = $this->getInstance()) instanceof Corporation) {
			$phoneNumber =  '+' . $customer->enterprise->country->phonecode . ' ' . $customer->enterprise->phone_number;
		} else {
			$phoneNumber =  '+' . $customer->user->country->phonecode . ' ' . $customer->user->phone_number;
		}

		return $phoneNumber;
	}

	public function __toString()
	{
		return $this->getName();
	}
}
