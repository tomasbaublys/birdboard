<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Calendar;

class EventController extends Controller
{
	public function index()
	{
   		$events = [];

    	$data = Event::all();
           if($data->count()){
              foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day')
                );
            }
        }

        $calendar = Calendar::addEvents($events); 

        return view('events', compact('calendar'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $event = create($attributes);

        return redirect('events');
    }
}
