<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalePlaceStaff
 * 
 * @property int $id
 * @property int $sale_place_id
 * @property int $staff_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property SalePlace $sale_place
 * @property Staff $staff
 *
 * @package App\Models
 */
class SalePlaceStaff extends Model
{
	protected $table = 'sale_place_staff';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'sale_place_id' => 'int',
		'staff_id' => 'int'
	];

	protected $fillable = [
		'id'
	];

	public function sale_place()
	{
		return $this->belongsTo(SalePlace::class);
	}

	public function staff()
	{
		return $this->belongsTo(Staff::class);
	}
}
