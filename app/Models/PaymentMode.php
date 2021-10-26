<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMode
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Payment[] $payments
 *
 * @package App\Models
 */
class PaymentMode extends Model
{
	protected $table = 'payment_modes';

	protected $fillable = [
		'name'
	];

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}

    public function __toString()
    {
        return $this->name;
    }
}
