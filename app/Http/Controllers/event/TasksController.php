<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Task;
use App\TaskKeyword;
use App\TemplateTask;


class TasksController extends Controller
{

    public function admin_index()
    {
        //This returns all tasks from DB to Task Management of AdminDash
        $tasks = Task::all();
        return view('admin.event.task')->with('tasks',$tasks);
        
    }

    public function admin_create()//Here 'id' is the template id to which tasks belongs
    {
        return view('admin.event.task_create');

    }

    
    public function admin_store(Request $request)
    {
        //
    }

    public function template_task($id)//Here 'id' is the template id to which tasks belongs
    {
        $template_id = $id;
        return $template_id;
        //rediract to template_task add page with id

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