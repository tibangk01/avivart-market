<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LibraryType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Library[] $libraries
 *
 * @package App\Models
 */
class LibraryType extends Model
{
	protected $table = 'library_types';

	protected $fillable = [
		'name'
	];

	public function libraries()
	{
		return $this->hasMany(Library::class);
	}
}
