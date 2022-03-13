<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MoneyMovement
 * 
 * @property int $id
 * @property int|null $fk_money_place
 * @property int|null $fk_type
 * @property float|null $amount_affect
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property MoneyPlace|null $money_place
 * @property Catalogue|null $catalogue
 *
 * @package App\Models
 */
class MoneyMovement extends Model
{
	protected $table = 'money_movements';

	protected $casts = [
		'fk_money_place' => 'int',
		'fk_type' => 'int',
		'amount_affect' => 'float',
		'active' => 'bool'
	];

	protected $fillable = [
		'fk_money_place',
		'fk_type',
		'amount_affect',
		'active',
		'user'
	];

	public function money_place()
	{
		return $this->belongsTo(MoneyPlace::class, 'fk_money_place');
	}

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_type');
	}
}
