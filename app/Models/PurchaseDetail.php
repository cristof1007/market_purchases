<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseDetail
 * 
 * @property int $id
 * @property int|null $fk_purchase
 * @property int|null $fk_product
 * @property int|null $fk_feature_value
 * @property int|null $fk_list_detail
 * @property int|null $fk_money_place
 * @property int|null $fk_money_bag
 * @property int|null $quantity
 * @property int|null $price
 * @property string|null $observations
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property MarketListDetail|null $market_list_detail
 * @property MoneyBag|null $money_bag
 * @property MoneyPlace|null $money_place
 * @property ProductFeatureValue|null $product_feature_value
 * @property Product|null $product
 * @property Purchase|null $purchase
 *
 * @package App\Models
 */
class PurchaseDetail extends Model
{
	protected $table = 'purchase_details';

	protected $casts = [
		'fk_purchase' => 'int',
		'fk_product' => 'int',
		'fk_feature_value' => 'int',
		'fk_list_detail' => 'int',
		'fk_money_place' => 'int',
		'fk_money_bag' => 'int',
		'quantity' => 'int',
		'price' => 'int',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_purchase',
		'fk_product',
		'fk_feature_value',
		'fk_list_detail',
		'fk_money_place',
		'fk_money_bag',
		'quantity',
		'price',
		'observations',
		'active',
		'user'
	];

	public function market_list_detail()
	{
		return $this->belongsTo(MarketListDetail::class, 'fk_list_detail');
	}

	public function money_bag()
	{
		return $this->belongsTo(MoneyBag::class, 'fk_money_bag');
	}

	public function money_place()
	{
		return $this->belongsTo(MoneyPlace::class, 'fk_money_place');
	}

	public function product_feature_value()
	{
		return $this->belongsTo(ProductFeatureValue::class, 'fk_feature_value');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'fk_product');
	}

	public function purchase()
	{
		return $this->belongsTo(Purchase::class, 'fk_purchase');
	}
}
