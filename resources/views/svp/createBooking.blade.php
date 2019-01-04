@extends('layouts.svp')
@section('content')
@php
use App\Http\Controllers\service\ServicesController;
use App\Http\Controllers\svp\SVPsController;   
@endphp
<div class="row" data-pg-collapsed> 
    <div class="col-xl-12"> 
        <div class="card">              
            <div class="card-header">
                <strong>Create</strong> Booking
            </div>
            <div class="card-body card-block"> 
                <form action="store" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                    {{ csrf_field() }}
                    <div class="row form-group"> 
                        <div class="col col-md-3 col-xl-3"> 
                            <label for="text-input" class="form-control-label">Event Date</label>                             
                        </div>                         
                        <div class="col-12 col-md-4"> 
                                <input id="datepicker"/>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                        </div>
                    </div>
                    <div class="row form-group"> 
                        <div class="col col-md-3 col-xl-3"> 
                            <label for="text-input" class="form-control-label">Start Time</label>                             
                        </div>                         
                        <div class="col-12 col-md-4">
                                <input id="s_time" />
                                <script>
                                    $('#s_time').timepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script> 
                        </div>                           
                    </div>
                    <div class="row form-group"> 
                        <div class="col col-md-3 col-xl-3"> 
                            <label for="text-input" class="form-control-label">End Time</label>                             
                        </div>                         
                        <div class="col-12 col-md-4">
                                <input id="e_time" />
                                <script>
                                    $('#e_time').timepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script> 
                        </div>                           
                    </div>                    
                    <div class="row form-group"> 
                        <div class="col col-md-3">Services</div>                         
                        <div class="col-12 col-md-9">
                            <div class="input-group mb-3">
                                    <section>

                                            <div class="row">
                                              <div class="col-md-6">
                                        
                                                <div class="select-wrapper mdb-select colorful-select dropdown-primary md-form"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-76e16562-b206-408b-b7aa-8e22b0b3eb20" value=""><ul id="select-options-76e16562-b206-408b-b7aa-8e22b0b3eb20" class="dropdown-content select-dropdown w-100 multiple-select-dropdown" style="width: 451.297px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;"><span class="search-wrap ml-2"><div class="md-form mt-0"><input type="text" class="search form-control w-100 d-block" placeholder="Search here.."></div></span><li class="disabled "><span class="filtrable"><input type="checkbox" class="form-check-input" disabled=""><label></label>  Choose your country</span></li><li class="select-toggle-all"><span><input type="checkbox" class="form-check-input"><label>Select all</label></span></li><li class=" "><span class="filtrable"><input type="checkbox" class="form-check-input"><label></label>  USA</span></li><li class="active"><span class="filtrable"><input type="checkbox" class="form-check-input"><label></label>  Germany</span></li><li class="active"><span class="filtrable"><input type="checkbox" class="form-check-input"><label></label>  France</span></li><li class="active"><span class="filtrable"><input type="checkbox" class="form-check-input"><label></label>  Poland</span></li><li class=" "><span class="filtrable"><input type="checkbox" class="form-check-input"><label></label>  Japan</span></li><button class="btn-save btn btn-primary btn-sm waves-effect waves-light">Save</button></ul><select class="mdb-select colorful-select dropdown-primary md-form initialized" multiple="" searchable="Search here..">
                                                  <option value="" disabled="" selected="">Choose your country</option>
                                                  <option value="1">USA</option>
                                                  <option value="2">Germany</option>
                                                  <option value="3">France</option>
                                                  <option value="4">Poland</option>
                                                  <option value="5">Japan</option>
                                                </select></div>
                                                <label>Label example</label>
                                                
                                        
                                              </div>
                                            </div>
                                        
                                          </section>
                            </div>
                        </div>                        
                    </div>
                    <div class="row form-group"> 
                        <div class="col col-md-3 col-xl-3"> 
                            <label for="text-input" class="form-control-label">Client's Email</label>                             
                        </div>                         
                        <div class="col-12 col-md-9"> 
                            <input type="text" id="client" name="client" placeholder="" class="form-control"> 
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