<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductAlertDetail
 * 
 * @property int $id
 * @property int|null $fk_product_alert
 * @property int|null $fk_family
 * @property string|null $value_consider
 * @property Carbon|null $date_event
 * @property bool|null $active
 * @property string|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Catalogue|null $catalogue
 * @property ProductAlert|null $product_alert
 *
 * @package App\Models
 */
class ProductAlertDetail extends Model
{
	protected $table = 'product_alert_details';

	protected $casts = [
		'fk_product_alert' => 'int',
		'fk_family' => 'int',
		'active' => 'bool'
	];

	protected $dates = [
		'date_event'
	];

	protected $fillable = [
		'fk_product_alert',
		'fk_family',
		'value_consider',
		'date_event',
		'active',
		'user'
	];

	public function catalogue()
	{
		return $this->belongsTo(Catalogue::class, 'fk_family');
	}

	public function product_alert()
	{
		return $this->belongsTo(ProductAlert::class, 'fk_product_alert');
	}
}
