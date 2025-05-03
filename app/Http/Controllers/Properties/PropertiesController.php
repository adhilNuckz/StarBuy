<?php

namespace App\Http\Controllers\Properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties\Property;
use App\Models\Properties\PropertyImages;

class PropertiesController extends Controller
{
    public function index() {
        
        $properties = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
    
        return  view ('home' , compact('properties'));
    
    }



    public function singleProp($id) {
        
        $propDetaile = Property::find($id  ) ;

        $propImages =  PropertyImages::where('prop_id' , $id)->get() ;
    
        return  view ('properties.prop-detaile' , compact('propDetaile' , 'propImages'));
    
    }
}
