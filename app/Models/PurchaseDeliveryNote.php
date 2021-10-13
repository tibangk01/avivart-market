<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseDeliveryNote
 * 
 * @property int $id
 * @property int $product_purchase_id
 * @property int $library_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Purchase $purchase
 * @property Library $library
 *
 * @package App\Models
 */
class PurchaseDeliveryNote extends Model
{
	protected $table = 'purchase_delivery_notes';

	protected $casts = [
		'purchase_id' => 'int',
		'library_id' => 'int',
	];

	protected $fillable = [
		'purchase_id',
		'library_id'
	];

	public function library()
	{
		return $this->belongsTo(Library::class);
	}

	public function purchase()
	{
		return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
	}

	public function getNumber()
	{
		return Carbon::parse($this->created_at)->format('dmYHis');
	}
}
