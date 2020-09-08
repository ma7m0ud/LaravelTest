<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'item_name'
        ,'description'
        ,'item_price'
        ,'quantity'
        ,'line_total'
    ];
}
