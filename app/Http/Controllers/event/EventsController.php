<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Event;
use App\ClientEvent;
use App\EventTemplateTask;

use App\Http\Controllers\event\TasksController;


class EventsController extends Controller
{

    public function client_index()
    {
        $client = session()->get('customer_id');
        $event_ids = ClientEvent::select('event_id')->where('customer_id',$client)->get();
        $events = Event::wherein('event_id',$event_ids)->get();
        return view('client.event.myevents')->with('events',$events);
    }

    public static function getEvent($id)
    {
        $event = Event::find($id);
        return $event;
    }


    public function create()
    {
        //
    }

    public function store_new(Request $request)
    {
        if(!isset($request->event_name)) {return 2;}//Please enter and event_name
        $default_task_ids = $request->default_task_id;
        $new_tasks = $request->new_task;

        array_splice($default_task_ids,0,1);
        array_splice($new_tasks,0,1);

        $default_number = count($default_task_ids);
        $new_number = count($new_tasks);
        

        if ($default_number > 0 )
        {
            //Creating an event and link the relevent template
            $event = new Event();
            $event->name = $request->event_name;
            $event->template_id = session()->get('default_template')->template_id;
            $event->save();
            session()->put('default_event',$event->event_id);

            //Relate customer and event
            $client_event = new ClientEvent();
            $client_event->customer_id = session()->get('customer_id');
            $client_event->event_id = $event->event_id;
            $client_event->save();
            
            foreach($default_task_ids as $task_id)
            {
             $event_template_task = new EventTemplateTask();
             $event_template_task->event_id = $event->event_id;
             $event_template_task->template_id = session()->get('default_template')->template_id;
             $event_template_task->task_id = $task_id;
             $event_template_task->save();
            }

            if($new_number > 0)
            {
            for($i=0;$i<$new_number;$i++)
            {
                if(trim($new_tasks[$i]) != '')
                {
                    //Add new Task to DB
                    $task = new Task();
                    $task->name =  $new_tasks[$i];
                    $task->istemp=1;
                    $task->save();

                    //Update EventTemplateTask
                    $event_template_task = new EventTemplateTask();
                    $event_template_task->event_id = $event->event_id;
                    $event_template_task->template_id = session()->get('default_template')->template_id;
                    $event_template_task->task_id = $task->task_id;
                    $event_template_task->save();
                    
                }
            }
            }
            
            return 1;//Event created Successfully
        }
        else if ($default_number==0 && $new_number>0)
        {
            //create a new template etc.......
            return 0;
        }
        else
        {
            return 0;//Add at least one task
        }
    }


    public function store1(Request $request)
    {
        if(!isset($request->event_name)) {return "Please Name Your Event";}
        $default_task_ids = $request->default_task_id;
        $new_tasks = $request->new_task;

        array_splice($default_task_ids,0,1);
        array_splice($new_tasks,0,1);

        $default_number = count($default_task_ids);
        $new_number = count($new_tasks);
        

        if ($default_number + $new_number  > 0 )
        {
            
            $event = Event::find(session()->get('default_event'));
            $event->name = $request->event_name;
            $event->save();

            TasksController::destroyTemps1($event->event_id); // Delete all associated previous temporary tasks
            EventTemplateTask::where('event_id',$event->event_id)->delete();//Delete all records from EventTempateTask before adding
            

            foreach($default_task_ids as $task_id)
            {
             $event_template_task = new EventTemplateTask();
             $event_template_task->event_id = $event->event_id;
             $event_template_task->template_id = session()->get('default_template')->template_id;
             $event_template_task->task_id = $task_id;
             $event_template_task->save();
            }

            for($i=0;$i<$new_number;$i++)
            {
                if(trim($new_tasks[$i]) != '')
                {
                    //Add new Task to DB
                    $task = new Task();
                    $task->name =  $new_tasks[$i];
                    $task->istemp=1;
                    $task->save();

                    //Update EventTemplateTask
                    $event_template_task = new EventTemplateTask();
                    $event_template_task->event_id = $event->event_id;
                    $event_template_task->template_id = session()->get('default_template')->template_id;
                    $event_template_task->task_id = $task->task_id;
                    $event_template_task->save();
                    
                }
            }
            
            echo "Event Saved Successfully";
        }
        else
        {
            echo "Please add atleast one task for the event";
        }
    }

    public function store2(Request $request)
    {
        if(!isset($request->event_name)) {return 2;}
        $default_task_ids = $request->default_task_id;
        $new_tasks = $request->new_task;

        array_splice($default_task_ids,0,1);
        array_splice($new_tasks,0,1);
        
        $default_number = count($default_task_ids);
        $new_number = count($new_tasks);
        

        if ($default_number + $new_number  > 0 )
        {
            
            $event = Event::find(session()->get('default_event'));
            $event->name = $request->event_name;
            $event->save();
            
            TasksController::destroyTemps2($event->event_id,$default_task_ids);
            
            //We can change this to delete only relevent tasks in destroyTemps2, but not implemented
            EventTemplateTask::where('event_id',$event->event_id)->delete();//Delete all records from EventTempateTask before adding

            

            foreach($default_task_ids as $task_id)
            {
             $event_template_task = new EventTemplateTask();
             $event_template_task->event_id = $event->event_id;
             $event_template_task->template_id = session()->get('default_template')->template_id;
             $event_template_task->task_id = $task_id;
             $event_template_task->save();
            }

            for($i=0;$i<$new_number;$i++)
            {
                if(trim($new_tasks[$i]) != '')
                {
                    //Add new Task to DB
                    $task = new Task();
                    $task->name =  $new_tasks[$i];
                    $task->istemp=1;
                    $task->save();

                    //Update EventTemplateTask
                    $event_template_task = new EventTemplateTask();
                    $event_template_task->event_id = $event->event_id;
                    $event_template_task->template_id = session()->get('default_template')->template_id;
                    $event_template_task->task_id = $task->task_id;
                    $event_template_task->save();
                    
                }
            }
            
            return 1;
        }
        else
        {
            return 0;
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
        $event = Event::find($id);
        $event->delete();
    }
}