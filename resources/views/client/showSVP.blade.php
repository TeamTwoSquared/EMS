@extends('layouts.client')
@section('content')
@php
    use App\Http\Controllers\service\ServicesController;
    use App\Http\Controllers\service\ServiceImagesController;
    use App\Http\Controllers\svp\SVPsController;
    use App\Http\Controllers\service\ServiceVideosController;

    $svp = SVPsController::getSVP2($svp_id);
    $services = ServicesController::getServices($svp_id);
@endphp

<section class="au-breadcrumb2 pad-bottom5 pad15" data-pg-collapsed> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-12"> 
                    <div class="au-breadcrumb-content"> 
                        <div class="au-breadcrumb-left"> 
                                                     
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
                @if($services->count()!=0)
                <div class="row">
                    <h4 class="font-weight-bold">Services of {{$svp->username}}</h4>
                </div>
                <div class="row">
                    @foreach($services as $service)
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
                @else
                    <div class="row">
                        <h4 class="font-weight-bold">Services of {{$svp->username}}</h4>
                    </div>
                    <div class="row" data-pg-collapsed>
                        <h6 class="font-italic">No Service Available</h6>
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
                                    <h5 class="text-sm-center mt-2 mb-1"><a href="/client/view/svp/{{$svp->service_provider_id}}"><strong>{{$svp->username}}</strong></a></h5>
                                    <div class="location text-sm-center">
                                        <i class="fa fa-map-marker"></i> {{$svp->city}}
                                    </div>
                                    <p class="card-text text-sm-center">
                                        @for ($i = 0; $i < $svp->star; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        {{$svp->star}}.0
                                    </p>
                                    <p class="card-text text-sm-center">
                                        @if($svp->level == 0) (New)
                                        @elseif($svp->level == 3) (Top Rated)
                                        @else 
                                        (Level {{$svp->level}})
                                        @endif
                                    </p>
                                    <p class="card-text text-sm-center">Online Status :
                                        @if($svp->isonline==1) 
                                            <span class="dot dot--green"></span>
                                        @else
                                            <span class="dot dot--red"></span>
                                        @endif
                                    </p>
                                    <button type="button" class="btn btn-light float-none text-body btn-block active asbestos-hover">Contact Me</button>
                                </div>
                                <hr>
                                <h6>Memeber Since :
                                    @php
                                        $datetime = explode(" ",$svp->reg_date);
                                        echo $datetime[0];
                                    @endphp 
                                    </h6>
                            </div>
                        </div>
                        </div>
                    </div>                 
                </div>             
            </div>         
            <hr/> 
            <!-- Bottom-Pane Ads-->
                @include('inc.bottomAds')             
            <!-- End of Ads -->
        </div>     
    </section>
    <hr/>

@endsection