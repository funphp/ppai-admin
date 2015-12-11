<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events;
use App\Rounds;

use Illuminate\Http\Request;

class settingsController extends Controller{

   public function __construct() { }

    public function index()
    {
        // Code

        return view('settings',['events' => Events::all()]);
    }

    public function edit(Request $request, $id)
    {
       
       if($request->isMethod('post') && count($request->input('roundlistbox'))>0) {
	       	$event = Events::find($id);
	       	foreach($event->rounds as $r) {
	       		$event->rounds()->detach($r->pivot->rounds_id);
	       	}
	       	foreach($request->input('roundlistbox') as $round_id){
	       		$round = Rounds::find($round_id);
	       		$event->rounds()->attach($round_id);
	       	}
	       	//$event->rounds()->save($request->input('roundlistbox'));
	       	//print_r($request->input('roundlistbox'));die;

       }
       $event = Events::find($id);
       $rounds = Rounds::all();
       foreach($rounds as $key=>$round) {
       	 $rounds[$key]->isSelected = false;
       	 foreach($event->rounds as $r) {
       	 	if($r->pivot->rounds_id == $round->id){
       	 		$rounds[$key]->isSelected = true;
       	 	}

       	 }
       }
        return view('settings-edit',['rounds' => $rounds,'event'=>$event]);
    }
}
