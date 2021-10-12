<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Staff
 * 
 * @property int $id
 * @property int $staff_type_id
 * @property int $human_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Human $human
 * @property StaffType $staff_type
 * @property Collection|Agency[] $agencies
 * @property Collection|CashRegisterTransaction[] $cash_register_transactions
 * @property Collection|SalePlace[] $sale_places
 * @property Collection|Society[] $societies
 *
 * @package App\Models
 */
class Staff extends Model
{
	protected $table = 'staffs';

	protected $casts = [
		'staff_type_id' => 'int',
		'human_id' => 'int'
	];

	protected $fillable = [
		'staff_type_id',
		'human_id'
	];

	public function human()
	{
		return $this->belongsTo(Human::class);
	}

	public function staff_type()
	{
		return $this->belongsTo(StaffType::class);
	}

	public function agencies()
	{
		return $this->belongsToMany(Agency::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function cash_register_transactions()
	{
		return $this->hasMany(CashRegisterTransaction::class);
	}

	public function sale_places()
	{
		return $this->belongsToMany(SalePlace::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function societies()
	{
		return $this->belongsToMany(Society::class)
					->withPivot('id')
					->withTimestamps();
	}
}
