<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Good
 * 
 * @property int $id
 * @property string $name
 * @property string|null $ref
 * @property Carbon $date_of_service
 * @property float $original_value
 * @property float $rate_charged
 * @property int $amortization
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Good extends Model
{
	protected $table = 'goods';

	protected $casts = [
		'original_value' => 'float',
		'rate_charged' => 'float'
	];

	protected $dates = [
		'date_of_service',
	];

	protected $fillable = [
		'name',
		'ref',
		'date_of_service',
		'original_value',
		'rate_charged',
		'amortization'
	];
}
