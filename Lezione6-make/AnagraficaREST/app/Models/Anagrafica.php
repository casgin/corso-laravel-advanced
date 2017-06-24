<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Jun 2017 20:36:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Anagrafica
 * 
 * @property int $id
 * @property string $ragione_sociale
 * @property string $indirizzo
 * @property string $citta
 * @property string $cap
 * @property string $provincia
 * @property string $website
 * @property string $tipo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Anagrafica extends Eloquent
{
	protected $table = 'anagrafica';

	protected $fillable = [
		'ragione_sociale',
		'indirizzo',
		'citta',
		'cap',
		'provincia',
		'website',
		'tipo'
	];
}
