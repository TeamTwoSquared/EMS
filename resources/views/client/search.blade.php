@extends('layouts.client')
@section('content')
@php
    use App\Http\Controllers\service\ServicesController;
    use App\Http\Controllers\service\ServiceImagesController;
    use App\Http\Controllers\svp\SVPsController;
@endphp

<section class="au-breadcrumb2 pad-bottom5 pad15" data-pg-collapsed> 
    <div class="container"> 
        <div class="row "> 
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
                            <li class="list-inline-item">Search Results</li>
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
            <div class="col-md-2 pl-4">
                <div class="row">
                    <h5 class="font-weight-bold">Refine Results</h5>
                </div>
                <div class="row">
                    <h6 class="font-weight-bold">Price Ranges</h6>
                </div>
                <div class="row">
                    <form role="form" class="col-md-12 p-1"> 
                        <div class="form-group"> 
                            <label class="pl-2">Rs.</label>
                            <input type="text" class="form-control" id="">
                            <label class="pl-2">to</label>
                            <input type="text" class="form-control" id="">
                            <i class="fas fa-chevron-circle-right pl-3"></i> 
                        </div>                         
                    </form>
                </div>
                <hr/>
                <div class="row ">
                    <h6 class="font-weight-bold">Online Status</h6>
                    <div class="form-check col-md-12 form-check-inline pl-2"> 
                        <input class="form-check-input" type="checkbox" id="formInput50" value="option1"> 
                        <label class="form-check-label" for="formInput50">Online</label>                         
                    </div>
                </div>
                <hr/>
                <div class="row ">
                    <h6 class="font-weight-bold">Seller Level</h6>
                    <div class="form-check col-md-12 form-check-inline pl-2"> 
                        <input class="form-check-input" type="checkbox" id="formInput50" value="option1"> 
                        <label class="form-check-label" for="formInput50">                        New Seller</label>                         
                    </div>
                    <div class="form-check col-md-12 form-check-inline pl-2"> 
                        <input class="form-check-input" type="checkbox" id="formInput50" value="option1"> 
                        <label class="form-check-label" for="formInput50">                        Level 1</label>                         
                    </div>
                    <div class="form-check col-md-12 form-check-inline pl-2"> 
                        <input class="form-check-input" type="checkbox" id="formInput50" value="option1"> 
                        <label class="form-check-label" for="formInput50">                       Level 2</label>                         
                    </div>
                    <div class="form-check col-md-12 form-check-inline pl-2"> 
                        <input class="form-check-input" type="checkbox" id="formInput50" value="option1"> 
                        <label class="form-check-label" for="formInput50">                        Top Rated Seller</label>                         
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="form-group col-md-12 pl-0"> 
                        <label for="formInput9">
                            <h6> <strong>Service Location</strong> </h6>
                        </label>                         
                        <select id="formInput9" class="form-control pt-0 "> 
                            <option value="0">Select a District</option>                             
                            <option value="1">1</option>                             
                            <option>3</option>                             
                        </select>
                    </div>
                </div>                 
            </div>
            <div class="col-md-10">
                <div class="row">
                    @foreach($service_ids as $service_id)
                    @php
                    $service = ServicesController::getService($service_id);
                    $svp = SVPsController::getSVP2($service->service_provider_id);
                    $randomImage=ServiceImagesController::getRandomImages($service->service_id);
                    @endphp
                        <div class="card col-md-3 pt-1 mb-4">
                            <a href="/client/view/service/{{$service->service_id}}">
                             @if($randomImage->count()!=0)
                                <img class="card-img-top" alt="{{$service->name}}" src="/storage/images/services/{{$randomImage->imgurl}}"/>
                            @else
                                <img class="card-img-top" alt="{{$service->name}}" src="/storage/images/services/noimage.jpg"/>
                            @endif
                            </a>
                            <div class="card-body pt-2 ">
                                <div class="row">
                                    <div class="image col-md-3 pl-0 pr-0"> 
                                        <a href="/client/view/svp/{{$svp->service_provider_id}}"><img src="/storage/images/profile/{{$svp->profilepic}}" alt="{{$svp->username}}" class="rounded-circle"/></a>
                                    </div>
                                    <div class="image col-md-9 pr-0 pl-1 ">
                                    <p><a href="/client/view/svp/{{$svp->service_provider_id}}"><strong>{{$svp->username}}</strong></a> (Level {{$svp->level}})</p> 
                                    </div>
                                </div>
                                <p class="card-text"><a href="/client/view/service/{{$service->service_id}}">{{$service->name}}</a></p>
                                <p class="card-text"><i class="fa fa-star"></i> {{$svp->star}}.0</p>
                                <p class="card-text"><i class="far fa-money-bill-alt"></i> {{$service->price}}</p>
                                <p class="card-text"><i class="fas fa-box"></i> Package Service</p>
                            </div>
                        </div>
                    @endforeach
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
