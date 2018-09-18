@extends('layouts.admin')
@section('content')
@php
use App\Catergory;
use App\CatergoryImage;
use App\Http\Controllers\event\CatergoriesController;

@endphp
<div class="row" data-pg-collapsed> 
    <div class="col-xl-9 col-lg-9"> 
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
                            <input type="text" id="name" name="name" value={{$catergory->name}} class="form-control" >                             
                        </div>                        
                    </div>                     
                    <div class="row form-group"> 
                        <div class="col col-md-3">Description</div>                         
                        <div class="col-12 col-md-9"> 
                            <textarea name="description" id="description" rows="9"  class="form-control">{{$catergory->description}}</textarea>                             
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