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
 * @property Society $society
 * @property Enterprise $enterprise
 * @property Collection|Staff[] $staff
 * @property Collection|SalePlace[] $sale_places
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
