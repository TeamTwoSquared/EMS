@extends('layouts.client')
@section('content')
@php
 use App\Http\Controllers\event\CatergoryImageController;
 use App\Http\Controllers\event\CatergoriesController;
 $catergories=CatergoriesController::client_index();
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
<section class="welcome p-t-10" data-pg-collapsed> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-12"> 
                <h1 class="title-4">Welcome back <span>John!</span> </h1> 
                <hr class="line-seprate"> 
            </div>             
        </div>         
    </div>     
</section>
<section class="statistic statistic2" data-pg-collapsed> 
    <div class="container"> 
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @foreach($catergories as $catergory)
                    @php
                    $randomImage=CatergoryImageController::getRandomImages($catergory->catergory_id)
                    @endphp
                    <div class="grid col-md-4 col-sm-6 col-xs-12">
                        <figure class="effect-lily">
                            @if($randomImage->count()!=0)
                            <img src="/storage/images/catergory/{{$randomImage->imgurl}}" alt="{{$catergory->name}}"/>
                            @else
                            <img src="/storage/images/catergory/noimage.jpg" alt="{{$catergory->name}}"/>
                            @endif
                            <figcaption>
                                <h2><span>{{$catergory->name}}</span></h2>
                                <p>{{$catergory->description}}</p>
                            <a href="/client/catergory/{{$catergory->catergory_id}}"></a>
                            </figcaption>                             
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <img src="http://c86og3avv551mqtcy2adcf845a-wpengine.netdna-ssl.com/wp-content/uploads/2015/03/radaruk-300x600.png">
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