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
 * @property int $people_id
 * @property int $provider_type_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Person $person
 * @property ProviderType $provider_type
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Provider extends Model
{
	protected $table = 'providers';

	protected $casts = [
		'people_id' => 'int',
		'provider_type_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'provider_type_id'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}

	public function provider_type()
	{
		return $this->belongsTo(ProviderType::class);
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class);
	}
}
