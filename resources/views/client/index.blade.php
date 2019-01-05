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
            <!-- Right-Pane Ads with col-md-3-->
            @include('inc.rightAds')               
            <!-- End of Ads -->            
        </div>         
        <hr/> 
        <!-- Bottom-Pane Ads-->
            @include('inc.bottomAds')             
        <!-- End of Ads -->         
    </div>     
</section>
<hr/>
@endsection