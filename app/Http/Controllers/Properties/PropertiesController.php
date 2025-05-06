<?php

namespace App\Http\Controllers\Properties;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Properties\Property;
use App\Models\Properties\PropertyImages;
use App\Models\Properties\Requests;
use App\Models\Properties\SavedProps;

class PropertiesController extends Controller
{
    public function index()
    {

        $properties = Property::select()->take(9)->orderBy('created_at', 'desc')->get();

        return view('home', compact('properties'));

    }



    public function singleProp($id)
    {




        $propDetaile = Property::find($id);

        $propImages = PropertyImages::where('prop_id', $id)->get();
        // $relproperties = Property::select()->take(9)->orderBy('created_at', 'desc')->get();

        $relproperties = Property::where('prop_id', '!=', $id)->take(9)->orderBy('created_at', 'desc')->get();
      
        $isSaved = false;
        if (Auth::check()) {
            $isSaved = SavedProps::where('prop_id', $id)
                ->where('user_id', Auth::id())
                ->exists();
        }


        return view('properties.prop-detaile', compact('propDetaile', 'propImages', 'relproperties', 'isSaved'));




    }



    public function makeRequest(Request $request)
    {


        Request()->validate([
            'name' => 'required|min:6|max:20',
            'email' => 'required|email',
            'message' => 'required',
        ]);



        // check if the user is aleady made a request for this property

        $checkRequest = Requests::where('prop_id', $request->prop_id)
            ->where('user_id', Auth::user()->id)
            ->first();



        if ($checkRequest) {
            return redirect('prop-detaile/' . $request->prop_id . '')->with('error', 'You have already made a request for this property');
        }

        $makeRequest = Requests::create([
            'prop_id' => $request->prop_id,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'agent_name' => $request->agent_name,
            'email' => $request->email,
            'message' => $request->message,
            'status' => "sent",
        ]);


        $telegramToken = '7640069260:AAHEH7tW4VcyJu61klEucfLPBX_qAB_r-3k';
        $chatId = '1402610739';
        $messageText = "New Inquiry for Property ID: $request->prop_id\n" .
            "Agent: {$request->agent_name}\n" .
            "Name: {$request->name}\n" .
            "Email: {$request->email}\n" .
            "Message: {$request->message}";

        file_get_contents("https://api.telegram.org/bot$telegramToken/sendMessage?chat_id=$chatId&text=" . urlencode($messageText));


        return redirect('prop-detaile/' . $request->prop_id . '')->with('success', 'Your request has been sent successfully');

    }


    public function saveProp($id)
    {



        $checkSaved = SavedProps::where('prop_id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($checkSaved) {
            return redirect('prop-detaile/' . $id . '')->with('saved', 'Already saved this property');
        }
        $propDetaile = Property::find($id);
        $saveProp = SavedProps::create([
            'prop_id' => $id,
            'user_id' => Auth::user()->id,
            'prop_title' => $propDetaile->title,
            'prop_image' => $propDetaile->bgimage,
            'agent_id' => $propDetaile->agent_id,
            'location' => $propDetaile->address,
        ]);

      
        return redirect('prop-detaile/' . $id . '')->with('saved-success', 'Property saved successfully');

    }




    public function buyProps()
    {

        $propsBuy = Property::select()->where('deal_type' , 'Sale')->get();

        return view('properties.prop-buy', compact('propsBuy'));

    }



    public function rentProps()
    {

        $propsRent = Property::select()->where('deal_type' , 'Rent')->get();

        return view('properties.prop-rent', compact('propsRent'));

    }






}
