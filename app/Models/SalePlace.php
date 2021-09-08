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
 * @property int $enterprise_id
 * @property int $agency_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Agency $agency
 * @property Enterprise $enterprise
 * @property Collection|Staff[] $staff
 *
 * @package App\Models
 */
class SalePlace extends Model
{
	protected $table = 'sale_places';

	protected $casts = [
		'enterprise_id' => 'int',
		'agency_id' => 'int'
	];

	protected $fillable = [
		'enterprise_id',
		'agency_id'
	];

	public function agency()
	{
		return $this->belongsTo(Agency::class);
	}

	public function enterprise()
	{
		return $this->belongsTo(Enterprise::class);
	}

	public function staff()
	{
		return $this->belongsToMany(Staff::class)
					->withPivot('id')
					->withTimestamps();
	}
}
