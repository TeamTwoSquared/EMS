@extends('layouts.admin')
@section('content')
@php
use App\Http\Controllers\event\TemplatesController;
$templates = TemplatesController::gettemplates();
$i=1; //use to have checkbox number
@endphp
<div class="row" data-pg-collapsed>
    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong> Task
            </div>
            <div class="card-body card-block">
                <form action="store" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Task Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">Description</div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="9" placeholder="Give a breif description of the task..." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">Keywords</div>
                        <div class="col-12 col-md-9">
                            <textarea name="keywords" id="keywords" rows="9" placeholder="Enter keywords each seperated by a space..." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">Time Duration</div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="time_duration" name="time_duration" placeholder="Enter approximate time duration in days(Optional)" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Templates</label>
                        </div>
                            <div class="col-12 col-md-9">
                                <div class="form-check">
                                    @foreach($templates as $template)
                                        <div class="checkbox">
                                        <label for="checkbox_{{$i}}" class="form-check-label">
                                                <input type="checkbox" id="templates" name="templates[]" value="{{$template->template_id}}" class="form-check-input">{{$template->name}}
                                            </label>
                                        </div>
                                        @php
                                          $i++;  
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
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