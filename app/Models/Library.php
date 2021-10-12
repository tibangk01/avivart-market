<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Library
 * 
 * @property int $id
 * @property int $library_type_id
 * @property string $folder
 * @property string|null $local
 * @property string|null $remote
 * @property string|null $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property LibraryType $library_type
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Library extends Model
{
	protected $table = 'libraries';

	protected $casts = [
		'library_type_id' => 'int'
	];

	protected $fillable = [
		'library_type_id',
		'folder',
		'local',
		'remote',
		'description'
	];

	public function library_type()
	{
		return $this->belongsTo(LibraryType::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
