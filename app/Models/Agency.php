<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agency
 *
 * @property int $id
 * @property int $enterprise_id
 * @property int $society_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Enterprise $enterprise
 * @property Society $society
 * @property Collection|Director[] $directors
 * @property Collection|SellerPlace[] $seller_places
 *
 * @package App\Models
 */
class Agency extends Model
{
	protected $table = 'agencies';

	protected $casts = [
		'enterprise_id' => 'int',
		'society_id' => 'int'
	];

	protected $fillable = [
		'enterprise_id',
		'society_id'
	];

	public function enterprise()
	{
		return $this->belongsTo(Enterprise::class);
	}

	public function society()
	{
		return $this->belongsTo(Society::class);
	}

	public function directors()
	{
		return $this->hasMany(Director::class);
	}

	public function seller_places()
	{
		return $this->hasMany(SellerPlace::class);
	}
}
