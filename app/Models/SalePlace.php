<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalePlace
 *
 * @property int $id
 * @property int $agency_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Agency $agency
 * @property Collection|Staff[] $staff
 *
 * @package App\Models
 */
class SalePlace extends Model
{
	protected $table = 'sale_places';

	protected $casts = [
		'agency_id' => 'int'
	];

	protected $fillable = [
		'agency_id',
		'name',
	];

	public function agency()
	{
		return $this->belongsTo(Agency::class);
	}

	public function staff()
	{
		return $this->belongsToMany(Staff::class)
					->withPivot('id')
					->withTimestamps();
	}
}
