@extends('layouts.client')
@section('content')
@php
    use App\Http\Controllers\service\ServicesController;
    use App\Http\Controllers\service\ServiceImagesController;
    use App\Http\Controllers\svp\SVPsController;
    use App\Http\Controllers\service\ServiceVideosController;

    $service = ServicesController::getService($service_id);
    $svp = SVPsController::getSVP2($service->service_provider_id);
    $AllImages=ServiceImagesController::getAllImages($service->service_id);
    $Videos = ServiceVideosController::getVideos($service->service_id);
    $other_services = ServicesController::getServicesExceptOne($service->service_provider_id,$service->service_id);
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
                            <li class="list-inline-item">Service Provider Search</li>
                            <li class="list-inline-item seprate"> 
                                <span>/</span> 
                            </li>
                            <li class="list-inline-item">{{$service->name}}</li>
                        </ul>                         
                    </div>                     
                    <form class="au-form-icon--sm" action="/client/search" method="post">
                        {{ csrf_field() }} 
                        <input class="au-input--w300 au-input--style2" name = "data" type="text" placeholder="Find Services...."> 
                        <button class="au-btn--submit2" type="submit"> 
                            <i class="zmdi zmdi-search"></i> 
                        </button>                         
                    </form>                     
                </div>                 
            </div>             
        </div>         
    </div>     
</section>
<hr/>
<section class="statistic statistic2 pad5" data-pg-collapsed>
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-9 pl-4">
                <div class="row">
                    <div class="col-md-12 pl-5"> 
                        <div class="row pl-3">
                            <h3 class="font-weight-bold">{{$service->name}}</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div id="carousel1" class="carousel slide col-md-8" data-ride="carousel"> 
                                @php
                                   $count=0; 
                                @endphp
                                <ol class="carousel-indicators"> 
                                    @foreach($AllImages as $img)
                                        <li data-target="#carousel1" data-slide-to="{{$count++}}" class="active"></li> 
                                    @endforeach                                                                       
                                </ol>   
                                @php
                                   $count=1; 
                                @endphp
                                <div class="carousel-inner"> 
                                    @if($AllImages->count() == 0)
                                        <div class="carousel-item active"> 
                                            <img class="d-block w-100" src="/storage/images/services/noimage.jpg" alt="{{$count}} slide"> 
                                        </div> 
                                    @else
                                        @foreach($AllImages as $img)
                                        @if($count == 1)
                                            <div class="carousel-item active"> 
                                                <img class="d-block w-100" src="/storage/images/services/{{$img->imgurl}}" alt="{{$count++}} slide"> 
                                            </div> 
                                        @else
                                            <div class="carousel-item"> 
                                                <img class="d-block w-100" src="/storage/images/services/{{$img->imgurl}}" alt="{{$count++}} slide"> 
                                            </div>
                                        @endif
                                        @endforeach 
                                    @endif                                                                      
                                </div>                                 
                                <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
                                <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="card col-md-12">
                                <div class="card-header">
                                    About this Service
                                </div>
                                <div class="card-body pt-1">
                                    <blockquote class="blockquote mb-0">
                                        <p>{{$service->description}}</p>
                                        @foreach($Videos as $video)
                                            <p class="card-text">Video URL: {{$video->videourl}}</p>
                                        @endforeach
                                        <footer class="blockquote-footer">Price : 
                                            <cite title="Source Title">Rs. {{$service->price}} /=</cite>
                                        </footer>
                                    </blockquote>
                                </div>
                                <div class="row">
                                    <button type="button" class="btn btn-light bg-secondary col-md-3 ml-3">Reserve</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($other_services->count()!=0)
                <div class="row">
                    <h4 class="font-weight-bold">Other Services of {{$svp->username}}</h4>
                </div>
                <div class="row">
                    @foreach($other_services as $service)
                    @php
                       $randomImage=ServiceImagesController::getRandomImages($service->service_id); 
                    @endphp
                    <div class="card col-md-3 mb-4 pt-2">
                        <a href="/client/view/service/{{$service->service_id}}">
                            @if($randomImage->count()!=0)
                                <img class="card-img-top" alt="{{$service->name}}" src="/storage/images/services/{{$randomImage->imgurl}}"/>
                            @else
                                <img class="card-img-top" alt="{{$service->name}}" src="/storage/images/services/noimage.jpg"/>
                            @endif
                        </a>
                        <div class="card-body pt-2 ">
                            <p class="card-text"><a href="/client/view/service/{{$service->service_id}}">{{$service->name}}</a></p>
                            <p class="card-text"><i class="far fa-money-bill-alt"></i> {{$service->price}}</p>
                            <p class="card-text"><i class="fas fa-box"></i> Package Service</p>
                        </div>
                    </div>
                    @endforeach
                </div> 
                @endif                
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="/storage/images/profile/{{$svp->profilepic}}" alt="{{$svp->username}}">
                                    <h5 class="text-sm-center mt-2 mb-1"><strong>{{$svp->username}}</strong></h5>
                                    <div class="location text-sm-center">
                                        <i class="fa fa-map-marker"></i> {{$svp->city}}
                                    </div>
                                    <p class="card-text text-sm-center">
                                        @for ($i = 0; $i < $svp->star; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        {{$svp->star}}.0</p>
                                    <p class="card-text text-sm-center">Online Status : <span class="dot dot--green"></span></p>
                                    <button type="button" class="btn btn-light float-none text-body btn-block active asbestos-hover">Contact Me</button>
                                </div>
                                <hr>
                                <h6>Memeber Since : 2002</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pl-3 ml-1 pr-3 ">
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
            </div>             
        </div>         
        <hr/> 
        <div class="row"> 
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
<hr/>

@endsection