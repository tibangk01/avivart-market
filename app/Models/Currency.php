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
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Currency extends Model
{
	protected $table = 'currencies';

	protected $fillable = [
		'name'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
