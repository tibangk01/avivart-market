<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BankOperation
 * 
 * @property int $id
 * @property int $bank_id
 * @property int $bank_operation_type_id
 * @property float $amount
 * @property string|null $comment
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property BankOperationType $bank_operation_type
 * @property Bank $bank
 *
 * @package App\Models
 */
class BankOperation extends Model
{
	protected $table = 'bank_operations';

	protected $casts = [
		'bank_id' => 'int',
		'bank_operation_type_id' => 'int',
		'amount' => 'float'
	];

	protected $fillable = [
		'bank_id',
		'bank_operation_type_id',
		'amount',
		'comment'
	];

	public function bank_operation_type()
	{
		return $this->belongsTo(BankOperationType::class);
	}

	public function bank()
	{
		return $this->belongsTo(Bank::class);
	}

	public function getNumber()
	{
		return Carbon::parse($this->created_at)->format('dmYHis');
	}
}
