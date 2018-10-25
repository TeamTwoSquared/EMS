@extends('layouts.svp')
@section('content')

<section class="statistic"> 
    <div class="section__content section__content--p30"> 
        <div class="container-fluid">
            <div class="row" data-pg-collapsed> 
                <div class="col-lg-9"> 
                    <div class="card"> 
                        <div class="card-header">Add Your New Service</div>             
                        <div class="card-body card-block"> 
                            <form action="/svp/submitService" method="post" data-pg-collapsed enctype="multipart/form-data"> 
                            {{ csrf_field() }}
                                <div class="form-group" data-pg-collapsed> 
                                    <label for="inputAddress">Service Name</label>                         
                                <input type="text" class="form-control" name="name" placeholder="Name"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="inputAddress">Prices</label>                         
                                    <input type="number" class="form-control"  name="price" placeholder="Price Your Service ">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">Discription</label>
                                    <input type="text" class="form-control"  name="description" placeholder="Maximum 100 characters ">
                                </div>
                                <div class="form-group"> 
                                    <label for="inputAddress">Keywords</label>                         
                                    <input type="text" class="form-control"  name="keyword" placeholder="EX -: keyword 1, keyword 2, keyword 3" multiple>
                                </div>                     
                                <div class="form-group" data-pg-collapsed> 
                                    <label for="inputAddress2">Location</label>                         
                                    <input type="text" class="form-control"  name="location" placeholder="EX -: location 1, location 2, location 3" multiple>
                                </div>
                                <div class="form-group" data-pg-collapsed> 
                                    <label for="inputAddress2">Service Type</label>                         
                                    <input type="text" class="form-control" id="city" name="type" placeholder="EX -: Type 1, Type 2, Type 3" multiple>
                                </div>                     
                        </div>             
                    </div>         
                </div>     
            </div>



            <div class="row" data-pg-collapsed>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">Images Of Your Service</div>
                        <div class="card-body card-block">

                                <div class="form-actions form-group">
                                    <input type="file"  name="service_image[]" class="form-control-file" multiple>
                                </div>
        
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" data-pg-collapsed>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">Video Clip Of Your Service</div>
                            <div class="card-body card-block">
                                
                                    <div class="form-actions form-group">
                                        <input type="text" class="form-control"  name="service_video_url" placeholder=" URL of your video clip " >
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
               
            <div class="row" data-pg-collapsed>
                <div class="col-lg-9">
                    <center>
                        <div class="form-actions form-group">
                        <button type="submit" class="btn btn-success btn-sm">Add Your New Service</button>
                    </center>
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</section>            
@endsection