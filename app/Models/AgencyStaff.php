<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AgencyStaff
 * 
 * @property int $id
 * @property int $agency_id
 * @property int $staff_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Agency $agency
 * @property Staff $staff
 *
 * @package App\Models
 */
class AgencyStaff extends Model
{
	protected $table = 'agency_staff';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'agency_id' => 'int',
		'staff_id' => 'int'
	];

	protected $fillable = [
		'id'
	];

	public function agency()
	{
		return $this->belongsTo(Agency::class);
	}

	public function staff()
	{
		return $this->belongsTo(Staff::class);
	}
}
