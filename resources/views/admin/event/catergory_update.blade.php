@extends('layouts.admin')
@section('content')
@php
use App\Catergory;
use App\CatergoryImage;
use App\Http\Controllers\event\CatergoriesController;
use App\Http\Controllers\event\CatergoryImageController;
$catergoryImages = CatergoryImageController::getImages($catergory->catergory_id);
$j=1; //Use to have cover image number
@endphp
<div class="row" data-pg-collapsed> 
    <div class="col-xl-12"> 
        <div class="card">              
            <div class="card-header">
                <strong>Update</strong> Category
            </div>
            <div class="card-body card-block"> 
                
            <form onsubmit="return confirm('Do you really want to update the catergoty {{$catergory->name}}?')" action="update/{{$catergory->catergory_id}}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                    {{ csrf_field() }}
                    <div class="row form-group"> 
                        <div class="col col-md-3 col-xl-3"> 
                            <label for="text-input" class="form-control-label">Category Name</label>                             
                        </div>                                                 
                        <div class="col-12 col-md-9"> 
                            <input type="text" id="name" name="name" value="{{$catergory->name}}" class="form-control" >                             
                        </div>                        
                    </div>                     
                    <div class="row form-group"> 
                        <div class="col col-md-3">Description</div>                         
                        <div class="col-12 col-md-9"> 
                            <textarea name="description" id="description" rows="9"  class="form-control">{{$catergory->description}}</textarea>                             
                        </div>                         
                    </div> 
                    <div class="row form-group">
                        <div class="col col-md-3" data-pg-collapsed>
                            <label class="form-control-label">Cover Images</label>
                        </div>
                        <div class="form-check" data-pg-collapsed>
                            <section class="content-block gallery-2">
                                <div class="container">
                                    <div class="row">
                                    @foreach($catergoryImages as $catergoryImage)
                                        <div class="grid col-md-4 col-sm-6 col-xs-12" data-pg-collapsed>
                                            <figure class="effect-lily">
                                                <img src="/storage/images/catergory/{{$catergoryImage->imgurl}}" alt="Catergory Image.{{$j}}"/>
                                                <figcaption>
                                                    <h2><span>{{$j}}</span></h2>
                                                    <!-- <p>Beautifully subtle animated hover effect for your gallery</p> -->
                                                    <!-- <a href="#">View more</a> -->

                                                </figcaption>                             
                                            </figure>
                                            
                                            <div class="checkbox">
                                                <label for="checkbox_{{$j}}" class="form-check-label">
                                                    <input type="checkbox" id="{{$catergoryImage->imgurl}}" name="delete_images[]" value="{{$catergoryImage->imgurl}}"  class="form-check-input" >Delete Me
                                                </label>
                                            </div>
                                        </div>
                                    @php
                                    $j++;  
                                    @endphp
                                    @endforeach
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.container -->
                            </section>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">New Cover Images&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        <div class="col-12 col-md-9"> 
                            <input type="file" id="catergory_new_images" name="catergory_new_images[]" multiple class="form-control-file"> 
                        </div>
                    </div>                               
                    <div class="card-footer">
                            <button type="update" class="btn btn-primary btn-sm" >
                                    <i class="fa fa-dot-circle-o"></i>Update                                    
                            </button>               
                        <button type="reset" class="btn btn-danger btn-sm"> 
                            <i class="fa fa-ban"></i> Reset
                        </button>                 
                    </div>
                </form>
                             
            </div>         
        </div>     
    </div>
</div>
@endsection