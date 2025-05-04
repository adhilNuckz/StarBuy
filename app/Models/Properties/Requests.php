<?php

namespace App\Models\Properties;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{


    protected $table =  'requests' ;
    protected $primaryKey = 'req_id' ;

    protected $fillable =  [

        'prop_id', 
        'user_id', 
        'name' , 
        'agent_name' , 
        'email' ,
        'message' ,
        'status' ,

        
        



    ] ;

    public $timestamps = true;


    //
}
