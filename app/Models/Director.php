<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Director
 * 
 * @property int $id
 * @property int $human_id
 * @property int $agency_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Agency $agency
 * @property Human $human
 *
 * @package App\Models
 */
class Director extends Model
{
	protected $table = 'directors';

	protected $casts = [
		'human_id' => 'int',
		'agency_id' => 'int'
	];

	protected $fillable = [
		'human_id',
		'agency_id'
	];

	public function agency()
	{
		return $this->belongsTo(Agency::class);
	}

	public function human()
	{
		return $this->belongsTo(Human::class);
	}
}
