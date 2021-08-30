<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 * 
 * @property int $id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Customer[] $customers
 * @property Collection|Provider[] $providers
 *
 * @package App\Models
 */
class Person extends Model
{
	protected $table = 'people';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function customers()
	{
		return $this->hasMany(Customer::class, 'people_id');
	}

	public function providers()
	{
		return $this->hasMany(Provider::class, 'people_id');
	}
}
