@extends('design_client.card');

@section('content')
@php
use App\CatergoryImage;
use App\http\client\ClientEventsController;
use Illuminate\Http\Request;
@endphp

  @foreach ($cat as $catergoryItems)
   <div class="catergory">
    <center><h3>{{$catergoryItems->name}}</h3></center> 
       @php
           $catgoryImages=CatergoryImage::where('catergory_id',$catergoryItems->catergory_id)->get();
          // $randomImage=$catgoryImages[rand(0,$catgoryImages.length-1)];
         // dd($catgoryImages);

       @endphp
        
      <a href='/client/{{$catergoryItems->name}}/templates'>
          <img alt="catergory Images" 10%x20 src="{{$catgoryImages->imgurl}}"> 
      </a> 

      <div class="caption"> 
            <center> 
            <p>{{$catergoryItems->description}}</p>
            <p><a href="/client/{{$catergoryItems->name}}/custermizeTemplate" class="btn btn-primary" role="button">Create Your Own</a> </p>
            </center> 
       </div>                     
    </div>     
  @endforeach
    

@endsection
        
