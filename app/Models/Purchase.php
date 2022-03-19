<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 * 
 * @property int $id
 * @property int|null $fk_family
 * @property int|null $fk_place
 * @property int|null $fk_money_place
 * @property int|null $fk_money_bag
 * @property Carbon|null $date
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Catalogue|null $catalogue
 * @property MoneyBag|null $money_bag
 * @property MoneyPlace|null $money_place
 * @property Collection|MarketList[] $market_lists
 * @property Collection|PurchaseDetail[] $purchase_details
 *
 * @package App\Models
 */
class Purchase extends Model
{
	protected $table = 'purchases';

	protected $casts = [
		'fk_family' => 'int',
		'fk_place' => 'int',
		'fk_money_place' => 'int',
		'fk_money_bag' => 'int',
		'active' => 'bool'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'fk_family',
		'fk_place',
		'fk_money_place',
		'fk_money_bag',
		'date',
		'active',
		'user'
	];

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_place');
	}

	public function money_bag()
	{
		return $this->belongsTo(MoneyBag::class, 'fk_money_bag');
	}

	public function money_place()
	{
		return $this->belongsTo(MoneyPlace::class, 'fk_money_place');
	}

	public function market_lists()
	{
		return $this->hasMany(MarketList::class, 'fk_purchase');
	}

	public function purchase_details()
	{
		return $this->hasMany(PurchaseDetail::class, 'fk_purchase');
	}
}
