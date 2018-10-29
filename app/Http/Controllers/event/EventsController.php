<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Event;
use App\ClientEvent;
use App\EventTemplateTask;


class EventsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }
    public function new_event(Request $request)
    {
        //Creating an event
        $event = new Event();
        $event->name = $request->event_name;
        $event->save();
        session()->put('default_event',$event->event_id);
    }

    public function update_event(Request $request)
    {
        //Creating an event
        $event = Event::find(1);
        $event->name = $request->event_name;
        $event->save();
        //session()->put('default_event',$event->event_id);
    }

    public function store(Request $request)
    {
        $defaut_number = count($request->default_task_id);
        $new_number = count($request->new_task);
        

        if ($defaut_number > 0 )
        {
            //link the relevent template
            $event = Event::find(session()->get('default_event'));
            $event->template_id = session()->get('default_template')->template_id;
            $event->save();
            

            //Relate customer and event
            $client_event = new ClientEvent();
            $client_event->customer_id = session()->get('customer_id');
            $client_event->event_id = $event->event_id;
            $client_event->save();
            
            foreach($request->default_task_id as $task_id)
            {
             $event_template_task = new EventTemplateTask();
             $event_template_task->event_id = $event->event_id;
             $event_template_task->template_id = session()->get('default_template')->template_id;
             $event_template_task->task_id = $task_id;
             $event_template_task->save();
            }

            for($i=0;$i<$new_number;$i++)
            {
                if(trim($request->new_task[$i]) != '')
                {
                    //Add new Task to DB
                    $task = new Task();
                    $task->name =  $request->new_task[$i];
                    $task->save();

                    //Update EventTemplateTask
                    $event_template_task = new EventTemplateTask();
                    $event_template_task->event_id = $event->event_id;
                    $event_template_task->template_id = session()->get('default_template')->template_id;
                    $event_template_task->task_id = $task->task_id;
                    $event_template_task->save();
                    
                }
            }
            
            echo "Data Inserted";
        }
        else if ($defaut_number==0 && $new_number>0)
        {
            //create a new template etc.......
            return 0;
        }
        else
        {
            echo "Please Enter atleast one task for an event";
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}