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
 * @property string $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Agency[] $agencies
 * @property Collection|Society[] $societies
 *
 * @package App\Models
 */
class Enterprise extends Model
{
	protected $table = 'enterprises';

	protected $fillable = [
		'code',
		'name',
		'phone_number',
        'email',
		'website',
		'address'
	];

	public function agencies()
	{
		return $this->hasMany(Agency::class);
	}

	public function societies()
	{
		return $this->hasMany(Society::class);
	}
}
