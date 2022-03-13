<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductFeatureValue
 * 
 * @property int $id
 * @property int|null $fk_product_feature
 * @property string|null $value
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ProductFeature|null $product_feature
 * @property Collection|MarketListDetail[] $market_list_details
 * @property Collection|ProductDetail[] $product_details
 * @property Collection|PurchaseDetail[] $purchase_details
 *
 * @package App\Models
 */
class ProductFeatureValue extends Model
{
	protected $table = 'product_feature_values';

	protected $casts = [
		'fk_product_feature' => 'int',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_product_feature',
		'value',
		'active',
		'user'
	];

	public function product_feature()
	{
		return $this->belongsTo(ProductFeature::class, 'fk_product_feature');
	}

	public function market_list_details()
	{
		return $this->hasMany(MarketListDetail::class, 'fk_feature_vale');
	}

	public function product_details()
	{
		return $this->hasMany(ProductDetail::class, 'fk_feature_value');
	}

	public function purchase_details()
	{
		return $this->hasMany(PurchaseDetail::class, 'fk_feature_value');
	}
}
