@extends('layouts.svp')
@section('content')

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
                            <textarea name="services" id="services" rows="9" placeholder="Give a breif description of the Category..." class="form-control"></textarea>                             
                        </div>                         
                    </div>
                    <div class="row form-group"> 
                        <div class="col col-md-3 col-xl-3"> 
                            <label for="text-input" class="form-control-label">Client</label>                             
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