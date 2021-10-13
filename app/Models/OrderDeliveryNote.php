<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderDeliveryNote
 * 
 * @property int $id
 * @property int $order_id
 * @property int $library_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Order $order
 * @property Library $library
 *
 * @package App\Models
 */
class OrderDeliveryNote extends Model
{
	protected $table = 'order_delivery_notes';

	protected $casts = [
		'order_id' => 'int',
		'library_id' => 'int',
	];

	protected $fillable = [
		'order_id',
		'library_id'
	];

	public function library()
	{
		return $this->belongsTo(Library::class);
	}

	public function order()
	{
		return $this->belongsTo(Order::class, 'order_id', 'id');
	}

	public function getNumber()
	{
		return Carbon::parse($this->created_at)->format('dmYHis');
	}
}
