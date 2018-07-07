<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = "currencies";

    protected $fillable = ['iso_4712', 'currency_name', 'currency_country',
        'enable', 'created_at', 'updated_at'];

    public function products()
    {
        return $this->hasMany('App\Product', 'currency', 'iso_4712');
    }
}
