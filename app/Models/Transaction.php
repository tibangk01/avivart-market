<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * 
 * @property int $id
 * @property string $activity
 * @property Carbon $created
 * @property Carbon $modified
 * @property int $transaction_type_id
 * @property int $user_id
 * 
 * @property TransactionType $transaction_type
 * @property User $user
 *
 * @package App\Models
 */
class Transaction extends Model
{
	protected $table = 'transactions';
	public $timestamps = false;

	protected $casts = [
		'transaction_type_id' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'activity',
		'created',
		'modified',
		'transaction_type_id',
		'user_id'
	];

	public function transaction_type()
	{
		return $this->belongsTo(TransactionType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
