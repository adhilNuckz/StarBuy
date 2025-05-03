<?php

namespace App\Models\Properties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model

{
    use HasFactory ;

    protected $table =  'properties';
    protected $primaryKey = 'prop_id' ;

    protected $fillable =  [

        'title ', 
        'price' , 
        'bgimage' , 
        'beds' , 
        'baths' , 
        'sqft' , 
        'type' , 
        'year_built' ,
        'price_sqft' ,
        'description' ,
        'address' ,
        'agent_name',
        'deal_type' ,
        



    ] ;

    public $timestamps = true;


}
