<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MoneyBag
 * 
 * @property int $id
 * @property int|null $fk_family
 * @property string|null $description
 * @property float|null $max_amount
 * @property float|null $current_amount
 * @property string|null $observation
 * @property Carbon|null $start
 * @property Carbon|null $end
 * @property bool|null $is_finished
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Catalogue|null $catalogue
 * @property Collection|PurchaseDetail[] $purchase_details
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class MoneyBag extends Model
{
	protected $table = 'money_bags';

	protected $casts = [
		'fk_family' => 'int',
		'max_amount' => 'float',
		'current_amount' => 'float',
		'is_finished' => 'bool',
		'active' => 'bool'
	];

	protected $dates = [
		'start',
		'end'
	];

	protected $fillable = [
		'fk_family',
		'description',
		'max_amount',
		'current_amount',
		'observation',
		'start',
		'end',
		'is_finished',
		'active',
		'user'
	];

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_family');
	}

	public function purchase_details()
	{
		return $this->hasMany(PurchaseDetail::class, 'fk_money_bag');
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class, 'fk_money_bag');
	}
}
