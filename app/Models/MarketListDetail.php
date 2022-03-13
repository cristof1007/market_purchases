<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MarketListDetail
 * 
 * @property int $id
 * @property int|null $fk_market_list
 * @property int|null $fk_product
 * @property int|null $fk_feature_vale
 * @property int|null $quantity
 * @property float|null $price_expected
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property MarketList|null $market_list
 * @property ProductFeatureValue|null $product_feature_value
 * @property Product|null $product
 * @property Collection|PurchaseDetail[] $purchase_details
 *
 * @package App\Models
 */
class MarketListDetail extends Model
{
	protected $table = 'market_list_details';

	protected $casts = [
		'fk_market_list' => 'int',
		'fk_product' => 'int',
		'fk_feature_vale' => 'int',
		'quantity' => 'int',
		'price_expected' => 'float',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_market_list',
		'fk_product',
		'fk_feature_vale',
		'quantity',
		'price_expected',
		'active',
		'user'
	];

	public function market_list()
	{
		return $this->belongsTo(MarketList::class, 'fk_market_list');
	}

	public function product_feature_value()
	{
		return $this->belongsTo(ProductFeatureValue::class, 'fk_feature_vale');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'fk_product');
	}

	public function purchase_details()
	{
		return $this->hasMany(PurchaseDetail::class, 'fk_list_detail');
	}
}
