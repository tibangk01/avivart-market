<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Society
 * 
 * @property int $id
 * @property int $enterprise_id
 * @property string $tppcr
 * @property string $fiscal_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Enterprise $enterprise
 *
 * @package App\Models
 */
class Society extends Model
{
	protected $table = 'societies';

	protected $casts = [
		'enterprise_id' => 'int'
	];

	protected $fillable = [
		'enterprise_id',
		'tppcr',
		'fiscal_code'
	];

	public function enterprise()
	{
		return $this->belongsTo(Enterprise::class);
	}
}
