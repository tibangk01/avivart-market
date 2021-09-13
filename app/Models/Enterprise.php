<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Enterprise
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $phone_number
 * @property string|null $website
 * @property string $email
 * @property string $address
 * @property bool $is_corporation
 * @property int $region_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Region $region
 * @property Collection|Agency[] $agencies
 * @property Collection|Corporation[] $corporations
 * @property Collection|SalePlace[] $sale_places
 * @property Collection|Society[] $societies
 *
 * @package App\Models
 */
class Enterprise extends Model
{
	protected $table = 'enterprises';

	protected $casts = [
		'is_corporation' => 'bool',
		'country_id' => 'int',
		'region_id' => 'int',
	];

	protected $fillable = [
		'code',
		'name',
		'phone_number',
		'website',
		'email',
		'address',
		'city',
		'is_corporation',
		'region_id',
		'country_id',
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function agencies()
	{
		return $this->hasMany(Agency::class);
	}

	public function corporations()
	{
		return $this->hasMany(Corporation::class, 'entreprise_id');
	}

	public function sale_places()
	{
		return $this->hasMany(SalePlace::class);
	}

	public function societies()
	{
		return $this->hasMany(Society::class);
	}

	public function __toString()
	{
		return $this->name;
	}
}
