<?php

namespace App\Http\Controllers\Properties;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Properties\Property;
use App\Models\Properties\PropertyImages;
use App\Models\Properties\Requests;

class PropertiesController extends Controller
{
    public function index() {
        
        $properties = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
    
        return  view ('home' , compact('properties'));
    
    }



    public function singleProp($id) {
        
        $propDetaile = Property::find($id  ) ;

        $propImages =  PropertyImages::where('prop_id' , $id)->get() ;
        // $relproperties = Property::select()->take(9)->orderBy('created_at', 'desc')->get();

        $relproperties = Property::where('prop_id' , '!=' , $id)->take(9)->orderBy('created_at', 'desc')->get();
        return  view ('properties.prop-detaile' , compact('propDetaile' , 'propImages' , 'relproperties'));
    
    }



    public function makeRequest(Request $request) {
        
    
        Request()->validate( [
            'name' => 'required|min:6|max:20', 
            'email' => 'required|email',
            'message' => 'required',
        ]);

        

        $makeRequest = Requests::create([
            'prop_id' => $request->prop_id,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'agent_name' => $request->agent_name,
            'email' => $request->email,
            'message' => $request->message,
            'status' => "sent",
        ]);


        return  redirect('prop-detaile/'.$request->prop_id.''  )->with('success' , 'Your request has been sent successfully') ;
    
    }
    
}
