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
use App\Http\Controllers\event\TaskKeywordsController;
use App\Http\Controllers\event\TemplateTasksController;
use App\Http\Controllers\event\TemplatesController;

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
            'time_duration'=>'integer',
            'templates'=> 'required'
        ]);


        //Storing an template in DB by admin
        $task = new Task();
        $task->name =  $request->name;
        $task->description =  $request->description;
        $task->timeduration =  $request->time_duration;
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
        //Saving template_task data
        foreach($request->templates as $template)
        {
            $templaeTask = new TemplateTask();
            $templaeTask->template_id = $template;
            $templaeTask->task_id = $task->task_id;
            $templaeTask->save();
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


    public function admin_edit($id)
    {
        $task = (Task::where('task_id',$id)->get())[0];
        $taskKeywords=taskKeyword::where('task_id',$id)->get();
        return view('admin.event.task_update')->with('task',$task)->with('taskKeywords',$taskKeywords);
    }


    public function admin_update(Request $request, $id)
    {
        // Validating submited details
        $this->validate($request, [
            'name'=> 'required',
            'description'=> 'required',
            'keywords'=> 'required',
            'time_duration'=>'integer',
            'templates'=> 'required'
        ]);


        //Storing an template in DB by admin
        $task = Task::findOrFail($id);
        $task->task_id = $id;
        $task->name =  $request->name;
        $task->description =  $request->description;
        $task->timeduration =  $request->time_duration;
        $task->push();
        //Getting keywords to an array
        $keywords = explode(" ",$request->keywords);
        TaskKeywordsController::destroy($id);
        foreach($keywords as $keyword)
        {
            //Saving each keyword with template_id
            $taskKeyword = new TaskKeyword();
            $taskKeyword->task_id = $task->task_id;
            $taskKeyword->keyword = $keyword;
            $taskKeyword->save();
        }
        TemplateTasksController::taskDestroy($id);
        foreach($request->templates as $template)
        {
            $templaeTask = new TemplateTask();
            $templaeTask->template_id = $template;
            $templaeTask->task_id = $task->task_id;
            $templaeTask->save();
        }
        //On success go and add tasks
        return redirect('/admin/task/');
    }


    public function destroy($id)
    {
        Task::where('task_id',$id)->delete();        
        return redirect('/admin/task');
    }
    public static function getTemplates()
    {
        //Use to return all templates as an Array
        $templates = Template::all();
        return $templates;
    }
    public function block($id)
    {
        $task = Task::where('task_id',$id)->get();
        $task = $task[0];
        if ($task->istemp!=2)
        {
            $task->istemp=2;
        }
        else
        {
            $task->task=1;
        }
        $task->save();
        return redirect('/admin/task');
    }
}