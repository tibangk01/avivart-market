<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductRay
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|ProductCategory[] $product_categories
 *
 * @package App\Models
 */
class ProductRay extends Model
{
	protected $table = 'product_rays';

	protected $fillable = [
		'name'
	];

	public function product_categories()
	{
		return $this->hasMany(ProductCategory::class);
	}

    /**
     * toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
