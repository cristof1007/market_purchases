<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductAlert
 * 
 * @property int $id
 * @property int|null $fk_product
 * @property int|null $fk_type
 * @property string|null $description
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Catalogue|null $catalogue
 * @property Product|null $product
 * @property Collection|ProductAlertDetail[] $product_alert_details
 *
 * @package App\Models
 */
class ProductAlert extends Model
{
	protected $table = 'product_alerts';

	protected $casts = [
		'fk_product' => 'int',
		'fk_type' => 'int',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_product',
		'fk_type',
		'description',
		'active',
		'user'
	];

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_type');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'fk_product');
	}

	public function product_alert_details()
	{
		return $this->hasMany(ProductAlertDetail::class, 'fk_product_alert');
	}
}
