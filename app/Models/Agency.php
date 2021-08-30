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
 * @property int $region_id
 * @property int $society_id
 * @property int $enterprise_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Society $society
 * @property Enterprise $enterprise
 * @property Region $region
 * @property Collection|Staff[] $staff
 * @property Collection|SalePlace[] $sale_places
 *
 * @package App\Models
 */
class Agency extends Model
{
	protected $table = 'agencies';

	protected $casts = [
		'region_id' => 'int',
		'society_id' => 'int',
		'enterprise_id' => 'int'
	];

	protected $fillable = [
		'region_id',
		'society_id',
		'enterprise_id'
	];

	public function society()
	{
		return $this->belongsTo(Society::class);
	}

	public function enterprise()
	{
		return $this->belongsTo(Enterprise::class);
	}

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function staff()
	{
		return $this->belongsToMany(Staff::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function sale_places()
	{
		return $this->hasMany(SalePlace::class);
	}
}
