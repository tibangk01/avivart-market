<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Exercise[] $exercises
 *
 * @package App\Models
 */
class Currency extends Model
{
	protected $table = 'currencies';

	protected $fillable = [
		'name'
	];

	public function exercises()
	{
		return $this->hasMany(Exercise::class);
	}

    public function __toString()
    {
        return $this->name;
    }
}
