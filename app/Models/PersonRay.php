<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonRay
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Customer[] $customers
 * @property Collection|Provider[] $providers
 *
 * @package App\Models
 */
class PersonRay extends Model
{
	protected $table = 'person_rays';

	protected $fillable = [
		'name'
	];

	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

	public function providers()
	{
		return $this->hasMany(Provider::class);
	}

	/**
     * toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
