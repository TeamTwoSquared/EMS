@extends('layouts.client')
@section('content')
@php
 use App\Http\Controllers\event\TemplatesController;
 use App\Http\Controllers\event\TemplateTasksController;
 use App\Http\Controllers\event\TemplateImagesController;
 use App\Http\Controllers\event\EventTemplateTasksController;
 use App\Http\Controllers\event\EventsController;

 $default_template = session()->get('default_template');

 
$i = 1; //to number rows
$is_old = 2; //Specify whether event is old or not
$my_event_id=$event_id; //Current event id is recieved
$my_event = EventsController::getEvent($my_event_id);
$default_tasks = EventTemplateTasksController::getTasks($my_event_id);

@endphp
<section class="au-breadcrumb2 pad-bottom5 pad15" data-pg-collapsed> 
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
<section class="statistic statistic2 pad5" data-pg-collapsed> 
    <div class="container"> 
        <div class="row">
            <div class="col-md-12"> 
                @if($is_old==0)         
                <div class="row">
                    <div class="alert font-weight-bold" role="alert">
                        Managing Event: {{$my_event->name}}
                    </div>
                </div>
                @endif
                <div class="row">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button id="invite" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                                Invite
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Invite Friends</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="store" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{ csrf_field() }} 
                                    <div class="modal-body">                                   
                                        <div class="row form-group">
                                            <div class="col col-md-2 col-xl-2 "> 
                                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Email address</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="emailtag">
                                                    <div id="tags" name="tags">
                                                        <input type="text" value="">
                                                        <input type="hidden" id="emails"name="emails" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                     
                                    </div>
                                    <input type="hidden" id="event_id"name="event_id" value="{{$my_event->event_id}}" >
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Invite</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <form name="edit_tasks" id="edit_tasks">
                            
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Event Name</label>
                                <input type="text" class="form-control" id="validationDefault01" placeholder="My First Event" name = "event_name" id="event_name" value="{{$my_event->name}}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">Event Date and Time</label>
                                    <input type="text" class="form-control" id="validationDefault02" placeholder="" name = "event_date" id="event_date" value="{{$my_event->datetime}}" required>
                                </div>
                                <input type="hidden" name="event_id" id="event_id" value="{{$my_event->event_id}}">
                            
                            
                        <table class="table" id="dynamic_field">
                            <thead> 
                                <tr> 
                                     
                                    <th>Task</th>
                                    <th>Service Providers</th> 
                                    <th></th> 
                                </tr>                                 
                            </thead>                             
                            <tbody> 
                                <input type="hidden" id="task_id" name="default_task_id[]" value="1"/>
                                <input type="hidden" name="new_task[]" id="new_task" value="0"/>
                                
                                @foreach($default_tasks as $default_task)
                                <tr id="row{{$i}}" class="MoveableRow table table-bordered bg-clouds shadow"> 
                                     
                                    <td><input type="text" value="{{$default_task->name}}" class="form-control name_list"/> <input type="hidden" id="task_id" name="default_task_id[]" value="{{$default_task->task_id}}"/></td>
                                    <td>Select</td> 
                                    <td>
                                        <div class="table-data-feature flex-row-reverse">
                                            
                                                <button type="button" name="down" id="down" class="item down_button" title="Move Down">
                                                    <i class="fa-chevron-down fa"></i>
                                                </button>
                                           
                                            &nbsp;
                                            
                                                <button type="button"  name="up" id="up" class="item up_button" title="Move Up">
                                                    <i class="fa fa-chevron-up"></i>
                                                </button>
                                                
                                            
                                            &nbsp;
                                            <button type="button" name="remove" id="{{$i++}}" class="item btn_remove" title="Delete">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous">
</script>
<script src="/client/taginput.js"></script>
<script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var is_old = {{$is_old}};
            var i={{$i}};
            i--;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'" class="table table-bordered bg-clouds shadow MoveableRow">'+
                                    '<td><input type="text" name="new_task[]" id="new_task" placeholder="Enter a Task" class="form-control name_list"/></td>'+
                                    '<td>Select</td>'+
                                    '<td>'+
                                        '<div class="table-data-feature flex-row-reverse">'+
                                                '<button type="button" name="down" id="down" class="item down_button" title="Move Down">'+
                                                    '<i class="fa-chevron-down fa"></i>'+
                                                '</button>'+
                                            '&nbsp;'+
                                                '<button type="button" name="up" id="up" class="item up_button" title="Move Up">'+
                                                    '<i class="fa fa-chevron-up"></i>'+
                                                '</button>'+
                                            '&nbsp;'+
                                            '<button type="button" name="remove" id="'+i+'" class="item btn_remove" title="Delete">'+
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
                if(is_old==0)
                {
                    $.ajax({
                        type:'POST',
                        url:'/client/savenewtemplate',
                        data:$('#edit_tasks').serialize(),
                        success:function(data)
                        {
                            if(data==2) alert("Please Name Your Event");
                            else if(data==1) 
                            {
                                alert("Event Created Successfully");
                                is_old = 1;
                            }
                            else if(data==0) alert("Please add atleast one task for the event");
                            
                            //$('#edit_tasks')[0].reset(); //redirect to myevent/eventid 
                        }
                    });
                }
                else if(is_old==1)
                {
                    $.ajax({
                        type:'POST',
                        url:'/client/savetemplate1',
                        data:$('#edit_tasks').serialize(),
                        success:function(data)
                        {
                            alert(data);
                            //$('#edit_tasks')[0].reset(); //redirect to myevent/eventid
                        }
                    });
                }
                else if(is_old==2)
                {
                    $.ajax({
                        type:'POST',
                        url:'/client/savetemplate2',
                        data:$('#edit_tasks').serialize(),
                        success:function(data)
                        {
                            if(data==2) alert("Please Name Your Event and Specify Event Date");
                            else if(data==1) 
                            {
                                alert("Event Saved Successfully");
                                is_old = 1;
                            }
                            else if(data==0) alert("Please add atleast one task for the event");
                            else alert(data);
                            //$('#edit_tasks')[0].reset(); //redirect to myevent/eventid
                            // url:'/client/savetemplate2',
                        }
                    }); 
                }
            });
            
        });
</script>
@endsection