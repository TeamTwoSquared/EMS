@extends('layouts.client')
@section('content')
@php
 use App\Http\Controllers\event\TemplatesController;
 use App\Http\Controllers\event\TemplateTasksController;
 use App\Http\Controllers\event\TemplateImagesController;

 session()->forget('default_event');
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
                            <li class="list-inline-item">My Events</li>                             
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
        <div class="row" data-pg-collapsed> 
            <div class="col-md-9">
                <div class="row pr-2">
                    @foreach($events as $event)
                    @php
                    $randomImage=TemplateImagesController::getRandomImages($event->template_id)
                    @endphp
                    <div id= "event_card{{$event->event_id}}" class="card col-md-4" data-pg-collapsed>
                        @if($randomImage->count()!=0)
                            <img class="card-img-top" alt="{{$event->name}}" src="/storage/images/template/{{$randomImage->imgurl}}"/>
                        @else
                            <img class="card-img-top" alt="{{$event->name}}" src="/storage/images/template/noimage.jpg"/>
                        @endif
                        
                    <div class="card-body">
                            <h4 class="card-title text-capitalize">{{$event->name}}</h4>
                        <a href="/client/myevents/{{$event->event_id}}" class="btn btn-sm btn-success">Edit</a>
                        <button type="button" name="remove" id="{{$event->event_id}}" onclick ="deleteMe(this.id)" class="btn btn-sm btn-danger">Delete</button>
                        <script type="text/javascript">
                            function deleteMe(event_id)
                            {
                                if (confirm("Are you sure you want to delete this event!")) {
                                    $.ajax({
                                        type: "GET",
                                        url: '/client/myevents/delete/'+event_id,
                                    }).done(function( msg ) {
                                        $('#event_card'+event_id).remove();
                                    });
                                    
                                }

                            }
                            </script>
                        </div>
                    </div>
                    @endforeach
                </div>                 
            </div>             
            <div class="col-md-3 " data-pg-collapsed> 
                <div class="row">
                    <img src="http://flexdealer-media.imgix.net/media/bc1141/images/1515794061972421.jpg"/>
                    <hr/> 
                </div>
                <div class="row">
                    <img src="http://flexdealer-media.imgix.net/media/bc1141/images/1515794061972421.jpg"/>
                    <hr/> 
                </div>
                <div class="row">
                    <img src="http://flexdealer-media.imgix.net/media/bc1141/images/1515794061972421.jpg"/>
                    <hr/> 
                </div>                 
            </div>             
        </div>         
        <hr/> 
        <div class="row" data-pg-collapsed> 
            <div class="col-md-4"> 
                <img src="https://media.zigcdn.com/media/model/2017/Dec/lamborghini-urus-right_600x300.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="https://media.zigcdn.com/media/model/2017/Dec/lamborghini-urus-right_600x300.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="https://media.zigcdn.com/media/model/2017/Dec/lamborghini-urus-right_600x300.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="https://media.zigcdn.com/media/model/2017/Dec/lamborghini-urus-right_600x300.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="https://media.zigcdn.com/media/model/2017/Dec/lamborghini-urus-right_600x300.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="https://media.zigcdn.com/media/model/2017/Dec/lamborghini-urus-right_600x300.jpg"> 
                <hr/> 
            </div>             
        </div>         
    </div>     
</section>

@endsection