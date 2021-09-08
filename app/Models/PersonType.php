<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Customer[] $customers
 * @property Collection|Product[] $products
 * @property Collection|Provider[] $providers
 *
 * @package App\Models
 */
class PersonType extends Model
{
	protected $table = 'person_types';

	protected $fillable = [
		'name'
	];

	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'product_type_id');
	}

	public function providers()
	{
		return $this->hasMany(Provider::class);
	}
}
