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
 * @property int|null $people_id
 * @property int|null $corporation_id
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Person|null $person
 * @property Corporation|null $corporation
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

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function proformas()
	{
		return $this->hasMany(Proforma::class);
	}
}
