<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductFeature
 * 
 * @property int $id
 * @property int|null $fk_product
 * @property string|null $description
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product|null $product
 * @property Collection|ProductFeatureValue[] $product_feature_values
 *
 * @package App\Models
 */
class ProductFeature extends Model
{
	protected $table = 'product_features';

	protected $casts = [
		'fk_product' => 'int',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_product',
		'description',
		'active',
		'user'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'fk_product');
	}

	public function product_feature_values()
	{
		return $this->hasMany(ProductFeatureValue::class, 'fk_product_feature');
	}
}
