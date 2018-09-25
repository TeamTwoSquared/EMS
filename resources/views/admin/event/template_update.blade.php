@extends('layouts.admin')
@section('content')
@php
use App\Template;
use App\TemplateImage;
use App\TemplateKeyword;
use App\CatergoryTemplate;
use App\Http\Controllers\event\CatergoriesController;
use App\Http\Controllers\event\CatergoryTemplatesController;
$savedCatergories=CatergoryTemplatesController::getCatergoriesTemp($template->template_id);
$allCatergories = CatergoriesController::getCatergories();
$i=1; //use to have checkbox number
@endphp
<div class="row" data-pg-collapsed>
    <div class="col-lg-6 col-xl-9">
        <div class="card">
            <div class="card-header">
                <strong>Update</strong> Template
            </div>
            <div class="card-body card-block">
                <form  onsubmit="return confirm('Do you really want to update the template {{$template->name}}')" action="update/{{$template->template_id}}"method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Template Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" value="{{$template->name}}" class="form-control" >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">Description</div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="9"  class="form-control">{{$template->description}}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">Keywords</div>
                        <div class="col-12 col-md-9">
                        <textarea name="keywords" id="keywords" rows="9" class="form-control">@foreach($templateKeywords as $templateKeyword){{$templateKeyword->keyword}}{{" "}}@endforeach</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Catergories</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check">
                                @foreach($allCatergories as $catergory)
                                    <div class="checkbox">
                                    <label for="checkbox_{{$i}}" class="form-check-label">
                                            <input type="checkbox" id="{{$catergory->name}}" name="catergories[]" value="{{$catergory->catergory_id}}"  class="form-check-input" >{{$catergory->name}}
                                        </label>
                                    </div>
                                    @php
                                      $i++;  
                                    @endphp
                                @endforeach
                                @foreach($savedCatergories as $catergory)
                                    <script>
                                        document.getElementById("{{$catergory->name}}").checked = true;
                                    </script>
                                @endforeach                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                            <button type="update"class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update
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