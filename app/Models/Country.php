<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $iso
 * @property string $name
 * @property string $nicename
 * @property string|null $iso3
 * @property int|null $numcode
 * @property int $phonecode
 * @property string|null $nationality
 * @property Carbon $created
 * @property Carbon $modified
 * 
 * @property Collection|Enterprise[] $enterprises
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'countries';
	public $timestamps = false;

	protected $casts = [
		'numcode' => 'int',
		'phonecode' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'iso',
		'name',
		'nicename',
		'iso3',
		'numcode',
		'phonecode',
		'nationality',
		'created',
		'modified'
	];

	public function enterprises()
	{
		return $this->hasMany(Enterprise::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}

	public function __toString()
    {
        return $this->nicename . ' (+' . $this->phonecode . ')';
    }
}
