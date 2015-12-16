<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events;
use App\Rounds;
use App\Categories;

use Illuminate\Http\Request;

class SettingsController extends Controller{

   public function __construct() { }

    public function index()
    {
        // Code

        return view('settings',['events' => Events::all()]);
    }

    public function edit(Request $request, $id)
    {
       
       if($request->isMethod('post') && count($request->input('catlistbox'))>0) {
	       	$event = Events::find($id);
	       	foreach($event->categories as $r) {
                $event->categories()->detach($r->pivot->categories_id);
	       	}
	       	foreach($request->input('catlistbox') as $cat_id){
                $event->categories()->attach($cat_id);
	       	}


       }
        $event = Events::find($id);
       $categories = Categories::all();
       foreach($categories as $key=>$cat) {
           $categories[$key]->isSelected = false;
       	 foreach($event->categories as $r) {
       	 	if($r->pivot->categories_id == $cat->id){
                $categories[$key]->isSelected = true;
       	 	}

       	 }
       }
        return view('settings-edit',['categories' => $categories,'event'=>$event]);
    }
}
