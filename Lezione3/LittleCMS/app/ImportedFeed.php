<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportedFeed extends Model
{
    protected $table = 'imported_feed';

    protected $fillable = [
        'title','pub_date','description', 'link', 'brand'
    ];
}
