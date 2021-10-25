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
 * @property string|null $mimes_type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property LibraryType $library_type
 * @property Collection|Enterprise[] $enterprises
 * @property Collection|OrderDeliveryNote[] $order_delivery_notes
 * @property Collection|Product[] $products
 * @property Collection|PurchaseDeliveryNote[] $purchase_delivery_notes
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
		'description',
		'mimes_type'
	];

	public function library_type()
	{
		return $this->belongsTo(LibraryType::class);
	}

	public function enterprises()
	{
		return $this->hasMany(Enterprise::class);
	}

	public function order_delivery_notes()
	{
		return $this->hasMany(OrderDeliveryNote::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function purchase_delivery_notes()
	{
		return $this->hasMany(PurchaseDeliveryNote::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
