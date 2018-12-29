<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Task;
use App\EventTemplateTask;

class EventTemplateTasksController extends Controller
{
    public static function getTasks($event_id)
    {
        //Use to return a tasks of Clients+Defaults when a event ID and template ID is provided
        $event_tasks = EventTemplateTask::select('task_id')->where('event_id',$event_id)->get();
        $tasks = Array();
        foreach($event_tasks as $event_task)
        {
            $task =  Task::where('task_id',$event_task->task_id)->get();
            $task =  $task[0];
            $tasks = array_prepend($tasks,$task);
            
        }
        return $tasks;
        

    }
}
