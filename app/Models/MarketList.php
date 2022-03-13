<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MarketList
 * 
 * @property int $id
 * @property int|null $fk_family
 * @property Carbon|null $date_buy
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Catalogue|null $catalogue
 * @property Collection|MarketListDetail[] $market_list_details
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class MarketList extends Model
{
	protected $table = 'market_lists';

	protected $casts = [
		'fk_family' => 'int',
		'active' => 'bool'
	];

	protected $dates = [
		'date_buy'
	];

	protected $fillable = [
		'fk_family',
		'date_buy',
		'active',
		'user'
	];

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_family');
	}

	public function market_list_details()
	{
		return $this->hasMany(MarketListDetail::class, 'fk_market_list');
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class, 'fk_market_list');
	}
}
