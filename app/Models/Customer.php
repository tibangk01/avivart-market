<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $id
 * @property int $customer_type_id
 * @property int $people_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Person $person
 * @property CustomerType $customer_type
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';

	protected $casts = [
		'customer_type_id' => 'int',
		'people_id' => 'int'
	];

	protected $fillable = [
		'customer_type_id',
		'people_id'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}

	public function customer_type()
	{
		return $this->belongsTo(CustomerType::class);
	}
}
