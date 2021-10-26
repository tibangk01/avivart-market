<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderState
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class OrderState extends Model
{
	protected $table = 'order_states';

	protected $fillable = [
		'name'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

    public function __toString()
    {
        return $this->name;
    }
}
