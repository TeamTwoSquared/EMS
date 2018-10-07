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
                    <div class="alert font-weight-bold" role="alert">
                        Editing Template: {{$default_template->name}}
                    </div>
                    </div>
                <div class="row">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Add New (+)</button>
                            <button type="button" class="btn btn-secondary">Invite</button>
                        </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Task</th>
                                    <th>Service Provider</th> 
                                    <th></th> 
                                </tr>                                 
                            </thead>                             
                            <tbody> 
                                @foreach($default_tasks as $default_task)
                                <tr class="bg-concrete shadow"> 
                                    <th scope="row">{{$i++}}</th> 
                                    <td>{{$default_task->name}}</td>
                                    <td>Select</td> 
                                    <td>
                                        <div class="table-data-feature flex-row-reverse">
                                            <a href="template/edit/">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Move Down">
                                                    <i class="fa-chevron-down fa"></i>
                                                </button>
                                            </a>
                                            &nbsp;
                                            <a href="template/block/">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Move Up">
                                                    <i class="fa fa-chevron-up"></i>
                                                </button>
                                            </a>
                                            &nbsp;
                                            <button onclick="deleteMe()" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                                <script>
                                            function deleteMe() {
                                                    if (confirm("Are you sure you want to delete this template!")) {
                                                        window.location.replace("template/delete/");
                                                    } 
                                                }
                                        </script>
                                            </button>
                                        </div>
                                    </td>
                                </tr>  
                                @endforeach                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row pg-empty-placeholder">
                    <div class="table-responsive">
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
@endsection