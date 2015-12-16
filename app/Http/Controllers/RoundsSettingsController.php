<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events;
use App\Rounds;
use App\Categories;
use App\CategoryRounds;


use Illuminate\Http\Request;

class RoundsSettingsController extends Controller{

    public function __construct() { }

    public function index(Request $request, $eventid)
    {
        // Code

        return view('settings-rounds',['events' => Events::find($eventid)]);
    }

    public function edit(Request $request, $eventid, $id)
    {

        $event = Events::find($eventid);
        if($request->isMethod('post') && count($request->input('roundlistbox'))>0) {

            foreach($event->categories as $category) {
                if($category->id == $id) {
                    foreach($category->rounds as $r) {
                        $category->rounds()->detach($r->pivot->rounds_id);
                    }
                    foreach($request->input('roundlistbox') as $round_id){
                        $category->rounds()->attach($round_id,['events_id'=>$eventid]);
                    }

                    //print_r($category->rounds());die;
                }

            }


            //$event->rounds()->save($request->input('roundlistbox'));
            //print_r($request->input('roundlistbox'));die;

        }
        $category = Categories::find($id);

        $rounds = Rounds::all();
        foreach($rounds as $key=>$round) {
            $rounds[$key]->isSelected = false;
            foreach($category->rounds as $r) {
                if($r->pivot->rounds_id == $round->id && $r->pivot->events_id ==$eventid){
                    $rounds[$key]->isSelected = true;
                }

            }
        }
        return view('settings-rounds-edit',['rounds' => $rounds,'category'=>$category, 'event'=>$event]);
    }
}
