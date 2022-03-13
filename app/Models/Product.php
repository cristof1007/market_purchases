<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property int|null $fk_type
 * @property string|null $description
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Catalogue|null $catalogue
 * @property Collection|MarketListDetail[] $market_list_details
 * @property Collection|ProductAlert[] $product_alerts
 * @property Collection|ProductDetail[] $product_details
 * @property Collection|ProductFeature[] $product_features
 * @property Collection|PurchaseDetail[] $purchase_details
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'fk_type' => 'int',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_type',
		'description',
		'active',
		'user'
	];

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_type');
	}

	public function market_list_details()
	{
		return $this->hasMany(MarketListDetail::class, 'fk_product');
	}

	public function product_alerts()
	{
		return $this->hasMany(ProductAlert::class, 'fk_product');
	}

	public function product_details()
	{
		return $this->hasMany(ProductDetail::class, 'fk_product');
	}

	public function product_features()
	{
		return $this->hasMany(ProductFeature::class, 'fk_product');
	}

	public function purchase_details()
	{
		return $this->hasMany(PurchaseDetail::class, 'fk_product');
	}
}
