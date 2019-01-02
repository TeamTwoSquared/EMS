@extends('layouts.admin')
@section('content')
<head>
    <style>
        
    </style>
</head>
    
<div class="container" data-pg-collapsed>


    <div>
        <div class="row" data-pg-collapsed>
            <div class="col-md-1" data-pg-collapsed>
                <img alt="A generic square placeholder image where only the portion within the circle circumscribed about said square is visible" 140x140 class="img-circle img-responsive" src="http://pinegrow.com/placeholders/img20_thumb.jpg">
            </div>
            <div class="col-md-11" data-pg-collapsed>
                <h3>Column title</h3>              
            </div>
        </div>

        <div class="row" data-pg-collapsed>
            <div class="col-md-1">
            </div>
            
            <div class="col-md-10" data-pg-collapsed> 
                    <div class="container">
                            <ul class="list-group">
                                <li class="list-group-item">Service ID          </li>
                                <li class="list-group-item">Service Name         :</li>
                                <li class="list-group-item">About The Service    </li>
                                <li class="list-group-item">Price of the Service </li>
                                <li class="list-group-item">Service Provider ID  :</li>
                            </ul>
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                
                            </nav>
                    </div>
            </div>
        </div>
    </div>

  <!-- starting comment -->

    <div>
            <div class="row" data-pg-collapsed>
                <div class="col-md-3"> 
                </div>

                <div class="col-md-1" data-pg-collapsed>
                    <img alt="A generic square placeholder image where only the portion within the circle circumscribed about said square is visible" 140x140 class="img-circle img-responsive" src="http://pinegrow.com/placeholders/img20_thumb.jpg">
                </div>


                <div class="col-md-7" data-pg-collapsed>
                    <h3>Column title</h3> 
                </div>


            </div>

            <div class="row" data-pg-collapsed>
                <div class="col-md-3"> 
                </div>
                <div class="col-md-1"> 
                </div>

                <div class="col-md-7">
                    <dl data-pg-collapsed id="x"> 
                        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>                                  
                    </dl>             
                </div>
            </div>
    </div>

    <!-- ending comment -->
    
</div>


 <!-- comment box-->

<div class="row" data-pg-collapsed>
        <div class="col-md-1" data-pg-collapsed>
            <img alt="A generic square placeholder image where only the portion within the circle circumscribed about said square is visible" 140x140 class="img-circle img-responsive" src="http://pinegrow.com/placeholders/img20_thumb.jpg">
        </div>
        <div class="col-md-11" data-pg-collapsed>
            <h3>client</h3>              
        </div>
</div>

<form action="/notification/comment" method="POST">
    <div class="row" data-pg-collapsed>
        <div class="col-md-1">
        </div>
        <div class="col-md-10" data-pg-collapsed> 
                <div class="container">
                        <!--Textarea with icon prefix-->
                        <div class="md-form">
                            <i class="fas fa-pencil-alt prefix"></i><label for="form10"><h5><b><i>Reply here</i></b></h5></label>
                            <textarea type="text" id="form10" class="md-textarea form-control" rows="3"></textarea>
                        </div>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        </nav>                      
                </div>
                <button type="submit" class="btn btn-success btn-sm" style="float: right;">Send</button>
            </div>
    </div>
</form>
       

@endsection