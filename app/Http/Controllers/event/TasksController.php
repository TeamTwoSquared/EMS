<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Task;
use App\TaskKeyword;
use App\TemplateTask;
use App\Template;



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
       // Validating submited details
        $this->validate($request, [
            'name'=> 'required',
            'description'=> 'required',
            'keywords'=> 'required',
            'time_duration'=>'integer|nullable'
        ]);


        //Storing an template in DB by admin
        $task = new Task();
        $task->name =  $request->name;
        $task->description =  $request->description;
        $task->timeduration =  $request->timeduration;
        $task->save();
        //Getting keywords to an array
        $keywords = explode(" ",$request->keywords);

        foreach($keywords as $keyword)
        {
            //Saving each keyword with template_id
            $taskKeyword = new TaskKeyword();
            $taskKeyword->task_id = $task->task_id;
            $taskKeyword->keyword = $keyword;
            $taskKeyword->save();
        }
        //On success go and add tasks
        return redirect('/admin/task/');
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
    public static function getTemplates()
    {
        //Use to return all templates as an Array
        $templates = Template::all();
        return $templates;
    }
}