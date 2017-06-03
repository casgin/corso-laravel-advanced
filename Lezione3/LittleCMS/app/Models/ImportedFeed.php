<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 30 May 2017 18:03:08 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ImportedFeed
 * 
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon $pub_date
 * @property string $description
 * @property string $link
 * @property string $brand
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class ImportedFeed extends Eloquent
{
	protected $table = 'imported_feed';

	protected $dates = [
		'pub_date'
	];

	protected $fillable = [
		'title',
		'pub_date',
		'description',
		'link',
		'brand'
	];
}
