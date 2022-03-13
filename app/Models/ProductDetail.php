<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductDetail
 * 
 * @property int $id
 * @property int|null $fk_family
 * @property int|null $fk_product
 * @property int|null $fk_feature_value
 * @property float|null $quantity
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Catalogue|null $catalogue
 * @property ProductFeatureValue|null $product_feature_value
 * @property Product|null $product
 *
 * @package App\Models
 */
class ProductDetail extends Model
{
	protected $table = 'product_details';

	protected $casts = [
		'fk_family' => 'int',
		'fk_product' => 'int',
		'fk_feature_value' => 'int',
		'quantity' => 'float',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_family',
		'fk_product',
		'fk_feature_value',
		'quantity',
		'active',
		'user'
	];

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_family');
	}

	public function product_feature_value()
	{
		return $this->belongsTo(ProductFeatureValue::class, 'fk_feature_value');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'fk_product');
	}
}
