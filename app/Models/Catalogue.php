<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Catalogue
 * 
 * @property int $id
 * @property int|null $fk_father
 * @property int|null $level
 * @property string|null $description
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|MarketList[] $market_lists
 * @property Collection|MoneyBag[] $money_bags
 * @property Collection|MoneyMovement[] $money_movements
 * @property Collection|MoneyPlace[] $money_places
 * @property Collection|ProductAlertDetail[] $product_alert_details
 * @property Collection|ProductAlert[] $product_alerts
 * @property Collection|ProductDetail[] $product_details
 * @property Collection|Product[] $products
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class Catalogue extends Model
{
	protected $table = 'catalogues';

	protected $casts = [
		'fk_father' => 'int',
		'level' => 'int',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_father',
		'level',
		'description',
		'active',
		'user'
	];

	public function market_lists()
	{
		return $this->hasMany(MarketList::class, 'fk_family');
	}

	public function money_bags()
	{
		return $this->hasMany(MoneyBag::class, 'fk_type');
	}

	public function money_movements()
	{
		return $this->hasMany(MoneyMovement::class, 'fk_type');
	}

	public function money_places()
	{
		return $this->hasMany(MoneyPlace::class, 'fk_family');
	}

	public function product_alert_details()
	{
		return $this->hasMany(ProductAlertDetail::class, 'fk_family');
	}

	public function product_alerts()
	{
		return $this->hasMany(ProductAlert::class, 'fk_type');
	}

	public function product_details()
	{
		return $this->hasMany(ProductDetail::class, 'fk_family');
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'fk_type');
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class, 'fk_place');
	}
}
