<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProviderType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Provider[] $providers
 *
 * @package App\Models
 */
class ProviderType extends Model
{
	protected $table = 'provider_types';

	protected $fillable = [
		'name'
	];

	public function providers()
	{
		return $this->hasMany(Provider::class);
	}
}
