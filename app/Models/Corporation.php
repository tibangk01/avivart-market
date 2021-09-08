<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Corporation
 * 
 * @property int $id
 * @property int $enterprise_id
 * @property string $tppcr
 * @property string $fiscal_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Enterprise $enterprise
 * @property Collection|Customer[] $customers
 * @property Collection|Provider[] $providers
 *
 * @package App\Models
 */
class Corporation extends Model
{
	protected $table = 'corporations';

	protected $casts = [
		'enterprise_id' => 'int'
	];

	protected $fillable = [
		'enterprise_id',
		'tppcr',
		'fiscal_code'
	];

	public function enterprise()
	{
		return $this->belongsTo(Enterprise::class);
	}

	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

	public function providers()
	{
		return $this->hasMany(Provider::class);
	}
}
