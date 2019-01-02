@extends('layouts.client')
@section('content')
@php
 use App\Http\Controllers\event\CatergoryImageController;
 use App\Http\Controllers\event\CatergoriesController;
 use App\Http\Controllers\client\ClientsController;
    if(!(ClientsController::checkLogged(0))){
    header("Location: /client/login");
    die();
    }
$client=ClientsController::getClient(); 
$catergories=CatergoriesController::client_index();
session()->forget('default_event');
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
<section class="welcome p-t-10" data-pg-collapsed> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-12"> 
                <h1 class="title-4">Welcome back <span>{{$client->username}}!</span> </h1> 
                <hr class="line-seprate"> 
            </div>             
        </div>         
    </div>     
</section>
<section class="statistic statistic2 pad5" data-pg-collapsed> 
    <div class="container"> 
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @foreach($catergories as $catergory)
                    @php
                    $randomImage=CatergoryImageController::getRandomImages($catergory->catergory_id)
                    @endphp
                    <div class="grid col-md-4">
                        <figure class="effect-lily">
                            @if($randomImage->count()!=0)
                            <img src="/storage/images/catergory/{{$randomImage->imgurl}}" alt="{{$catergory->name}}"/>
                            @else
                            <img src="/storage/images/catergory/noimage.jpg" alt="{{$catergory->name}}"/>
                            @endif
                            <figcaption>
                                <h2><span>{{$catergory->name}}</span></h2>
                                <p>{{$catergory->description}}</p>
                            <a href="/client/manage/{{$catergory->catergory_id}}"></a>
                            </figcaption>                             
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
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
<hr/>
@endsection