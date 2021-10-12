<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Developer
 * 
 * @property int $id
 * @property int $human_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Human $human
 *
 * @package App\Models
 */
class Developer extends Model
{
	protected $table = 'developers';

	protected $casts = [
		'human_id' => 'int'
	];

	protected $fillable = [
		'human_id'
	];

	public function human()
	{
		return $this->belongsTo(Human::class);
	}
}
