<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitati extends Model
{
    // === Nome della tabella
    protected $table = 'invitati';

    // === Elenco dei campi che possono essere assegnati
    protected $fillable = ['nominativo'];
}
