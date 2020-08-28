<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetConfig extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'label', 'name', 'value',
    ];
    protected $table = "settings";

}
