<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SocietyStaff
 * 
 * @property int $id
 * @property int $society_id
 * @property int $staff_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Society $society
 * @property Staff $staff
 *
 * @package App\Models
 */
class SocietyStaff extends Model
{
	protected $table = 'society_staff';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'society_id' => 'int',
		'staff_id' => 'int'
	];

	protected $fillable = [
		'id'
	];

	public function society()
	{
		return $this->belongsTo(Society::class);
	}

	public function staff()
	{
		return $this->belongsTo(Staff::class);
	}
}
