<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MoneyPlace
 * 
 * @property int $id
 * @property int|null $fk_type
 * @property int|null $fk_family
 * @property int|null $fk_user
 * @property string|null $description
 * @property float|null $current_amount
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Catalogue|null $catalogue
 * @property Collection|MoneyMovement[] $money_movements
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class MoneyPlace extends Model
{
	protected $table = 'money_places';

	protected $casts = [
		'fk_type' => 'int',
		'fk_family' => 'int',
		'fk_user' => 'int',
		'current_amount' => 'float',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_type',
		'fk_family',
		'fk_user',
		'description',
		'current_amount',
		'active',
		'user'
	];

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_family');
	}

	public function money_movements()
	{
		return $this->hasMany(MoneyMovement::class, 'fk_money_place');
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class, 'fk_place');
	}
}
