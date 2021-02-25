<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductData extends Model
{
    public $table = "tbl_product_data";

    public $fillable = ['id',
        'strProductName',
        'strProductDesc',
        'strProductCode',
        'dtmAdded',
        'dtmDiscontinued',
        'created_at','updated_at'];

    public $dates = ['created_at','updated_at'];
    public $primaryKey = 'id';

}
