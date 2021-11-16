<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Market
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Customer[] $customers
 *
 * @package App\Models
 */
class Market extends Model
{
	protected $table = 'markets';

	protected $fillable = [
		'name'
	];

	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

    public function __toString()
    {
        return $this->name;
    }
}
