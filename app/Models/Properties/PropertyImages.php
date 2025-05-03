<?php

namespace App\Models\Properties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImages extends Model
{
    use HasFactory;
    protected $table =  'property_images';
    protected $primaryKey = 'image_id' ;

    protected $fillable =  [
        'image_id',
        'prop_id' ,
        'image' , 
        
        



    ] ;

    public $timestamps = true;

    //
}
