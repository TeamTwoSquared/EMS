@php
   use App\EventTemplateTask;
   $ett = EventTemplateTask::where('event_id',6)->whereNotIn('task_id',Array(79))->get(); 
   
@endphp

@foreach($ett as $t)
{{$t->name}}
@endforeach