<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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
 * @property Collection|Agency[] $agencies
 * @property Collection|Staff[] $staff
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

	public function agencies()
	{
		return $this->hasMany(Agency::class);
	}

	public function staff()
	{
		return $this->belongsToMany(Staff::class)
					->withPivot('id')
					->withTimestamps();
	}
}
