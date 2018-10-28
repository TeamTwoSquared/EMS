@extends('layouts.client')
@section('content')
@php
 use App\Http\Controllers\event\TemplatesController;
 use App\Http\Controllers\event\TemplateTasksController;
 use App\Http\Controllers\event\TemplateImagesController;
 $default_template = session()->get('default_template');
 $templates = session()->get('templates');
 $default_tasks = TemplateTasksController::getTasks($default_template->template_id);
$i = 1; //to number rows
@endphp
<section class="au-breadcrumb2" data-pg-collapsed> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-12"> 
                <div class="au-breadcrumb-content"> 
                    <div class="au-breadcrumb-left"> 
                        <span class="au-breadcrumb-span">You are here:</span> 
                        <ul class="list-unstyled list-inline au-breadcrumb__list"> 
                            <li class="list-inline-item active"> 
                                <a href="#">Home</a> 
                            </li>                             
                            <li class="list-inline-item seprate"> 
                                <span>/</span> 
                            </li>                             
                            <li class="list-inline-item">Dashboard</li>
                            <li class="list-inline-item seprate"> 
                                <span>/</span> 
                            </li>                             
                            <li class="list-inline-item">Manage Event</li>                           
                        </ul>                         
                    </div>                     
                    <form class="au-form-icon--sm" action="" method="post"> 
                        <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports..."> 
                        <button class="au-btn--submit2" type="submit"> 
                            <i class="zmdi zmdi-search"></i> 
                        </button>                         
                    </form>                     
                </div>                 
            </div>             
        </div>         
    </div>     
</section>
<section class="statistic statistic2" data-pg-collapsed> 
    <div class="container"> 
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                 <form name="event_name" id="event_name">
                    <input type="text" name = "event_name" id="event_name" placeholder="Name to your event" class="form-control name_list"/>
                    <button type="button" name="done" id="done" class="btn btn-success btn-sm">
                        <i class="fa fa-magic"></i>&nbsp; Done
                    </button>
                </form>
                </div>          
                <div class="row">
                    <div class="alert font-weight-bold" role="alert">
                        Editing Template: {{$default_template->name}}
                    </div>
                </div>
                <div class="row">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Invite</button>
                        </div>
                </div>
                <div class="row">
                    <div class="table-responsive" style="max-height:35em; overflow: auto;">
                        <form name="edit_tasks" id="edit_tasks">
                        <table class="table" id="dynamic_field">
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Task</th>
                                    <th>Service Providers</th> 
                                    <th></th> 
                                </tr>                                 
                            </thead>                             
                            <tbody> 
                                @foreach($default_tasks as $default_task)
                                <tr id="row{{$i}}" class="MoveableRow table table-bordered bg-clouds shadow"> 
                                    <th scope="row">{{$i++}}</th> 
                                    <td><input type="text" value="{{$default_task->name}}" class="form-control name_list"/> <input type="hidden" id="task_id" name="default_task_id[]" value="{{$default_task->task_id}}"/></td>
                                    <td>Select</td> 
                                    <td>
                                        <div class="table-data-feature flex-row-reverse">
                                            
                                                <button type="button" name="down" id="down" class="item down_button" data-toggle="tooltip" data-placement="top" title="Move Down">
                                                    <i class="fa-chevron-down fa"></i>
                                                </button>
                                           
                                            &nbsp;
                                            
                                                <button type="button"  name="up" id="up" class="item up_button" data-toggle="tooltip" data-placement="top" title="Move Up">
                                                    <i class="fa fa-chevron-up"></i>
                                                </button>
                                                
                                            
                                            &nbsp;
                                            <button type="button" name="remove" id="{{$i}}" class="item btn_remove" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>  
                                @endforeach                               
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
                <div class="row" data-pg-collapsed>
                        <button type="button" name="add" id="add" class="btn btn-secondary btn-outline-secondary active btn-block">Add New Task</button>
                </div>
                <div class="row">
                    <button type="button" name="save" id="save" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row pg-empty-placeholder">
                    <div class="table-responsive" style="height:51em; overflow: auto;">
                        <table class="table"> 
                            <thead> 
</thead>                             
                            <tbody>
                                <tr data-pg-collapsed> 
                                    <td>
                                        <div class="alert font-weight-bold alert-primary" role="alert">
                                             Select your desired template :)
                                        </div>
                                    </td>     
                                </tr>
                                @foreach($templates as $template) 
                                @php
                                $randomImage=TemplateImagesController::getRandomImages($template->template_id)
                                @endphp
                                <tr> 
                                    <td>
                                        <a href="/client/manage/11/{{$template->template_id}}">
                                        @if($randomImage->count()!=0)
                                            <img src="/storage/images/template/{{$randomImage->imgurl}}" alt="{{$template->name}}"/>
                                        @else
                                            <img src="/storage/images/template/noimage.jpg" alt="{{$template->name}}"/>
                                        @endif
                                        </a>
                                    </td>                                     
                                </tr>  
                                @endforeach                               
                            </tbody>                             
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-4">
                <img src="https://c86og3avv551mqtcy2adcf845a-wpengine.netdna-ssl.com/wp-content/uploads/2015/03/AG-ever-336x280-300x250.png">
                <hr/>
            </div>
            <div class="col-md-4">
                <img src="https://c86og3avv551mqtcy2adcf845a-wpengine.netdna-ssl.com/wp-content/uploads/2015/03/AG-ever-336x280-300x250.png">
                <hr/>
            </div>
            <div class="col-md-4">
                <img src="https://c86og3avv551mqtcy2adcf845a-wpengine.netdna-ssl.com/wp-content/uploads/2015/03/AG-ever-336x280-300x250.png">
                <hr/>
            </div>
            <div class="col-md-4">
                <img src="https://c86og3avv551mqtcy2adcf845a-wpengine.netdna-ssl.com/wp-content/uploads/2015/03/AG-ever-336x280-300x250.png">
                <hr/>
            </div>
            <div class="col-md-4">
                <img src="https://c86og3avv551mqtcy2adcf845a-wpengine.netdna-ssl.com/wp-content/uploads/2015/03/AG-ever-336x280-300x250.png">
                <hr/>
            </div>
            <div class="col-md-4">
                <img src="https://c86og3avv551mqtcy2adcf845a-wpengine.netdna-ssl.com/wp-content/uploads/2015/03/AG-ever-336x280-300x250.png">
                <hr/>
            </div>
        </div>         
    </div>     
</section>
<script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var i={{$i}};
            i--;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'" class="table table-bordered bg-clouds shadow MoveableRow">'+
                                    '<th scope="row">'+i+'</th>'+
                                    '<td><input type="text" name="new_task[]" id="new_task" placeholder="Enter a Task" class="form-control name_list"/></td>'+
                                    '<td>Select</td>'+
                                    '<td>'+
                                        '<div class="table-data-feature flex-row-reverse">'+
                                                '<button type="button" name="down" id="down" class="item down_button" data-toggle="tooltip" data-placement="top" title="Move Down">'+
                                                    '<i class="fa-chevron-down fa"></i>'+
                                                '</button>'+
                                            '&nbsp;'+
                                                '<button type="button" name="up" id="up" class="item up_button" data-toggle="tooltip" data-placement="top" title="Move Up">'+
                                                    '<i class="fa fa-chevron-up"></i>'+
                                                '</button>'+
                                            '&nbsp;'+
                                            '<button type="button" name="remove" id="'+i+'" class="item btn_remove" data-toggle="tooltip" data-placement="top" title="Delete">'+
                                                '<i class="zmdi zmdi-delete"></i>'+
                                            '</button>'+
                                        '</div>'+
                                    '</td>'+
                                '</tr>');
            });

            $(document).on('click','.down_button', function(){
                var rowToMove = $(this).parents('tr.MoveableRow:first');
                var next = rowToMove.next('tr.MoveableRow')
                if (next.length == 1) { next.after(rowToMove); }

            });

            $(document).on('click','.up_button', function(){
                var rowToMove = $(this).parents('tr.MoveableRow:first');
                var prev = rowToMove.prev('tr.MoveableRow')
                if (prev.length == 1) { prev.before(rowToMove); }

            });



            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();

            });
            $('#save').click(function(){
                if({{session()->get('default_event','NULL')}}==NULL)
                {
                    $.ajax({
                        type:'POST',
                        url:'/client/savenewtemplate',
                        data:$('#edit_tasks').serialize(),
                        success:function(data)
                        {
                            alert(data);
                            //$('#edit_tasks')[0].reset(); //redirect to myevent/eventid
                        }
                    });
                }
            });
            $('#done').click(function(){
                var event_session = $('#event_session').val();
                //var event_session=("{{session()->get('default_event')}}");
                if(event_session)
                {
                    $.ajax({
                        type:'POST',
                        url:'/client/update_event',
                        data:$('#event_name').serialize(),
                        success:function(data)
                        {
                        //alert("{{session()->get('default_event')}}");
                        alert(event_session);
                        }
                    });
                }
                else
                {
                    $.ajax({
                        type:'POST',
                        url:'/client/create_event',
                        data:$('#event_name').serialize(),
                        success:function(data)
                        {
                        alert(event_session);
                        }
                    }); 
                }
            });
        });
    </script>
@endsection