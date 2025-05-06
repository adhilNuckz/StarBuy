<?php

namespace App\Models\Properties;

use Illuminate\Database\Eloquent\Model;

class SavedProps extends Model
{


    protected $table =  'saved_props' ;
    protected $primaryKey = 'saved_id' ;

    protected $fillable =  [

        'prop_id', 
        'user_id', 
        'prop_title' ,
        'prop_image', 
        'agent_id' , 
        'location' ,
      

        
        



    ] ;

    public $timestamps = true;
    //
}
