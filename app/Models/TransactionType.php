<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $modified_at
 * 
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models
 */
class TransactionType extends Model
{
	protected $table = 'transaction_types';
	public $timestamps = false;

	protected $dates = [
		'modified_at'
	];

	protected $fillable = [
		'name',
		'modified_at'
	];

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
