@extends('layouts.client')
@section('content')
@php
 use App\helpModel;
 use Illuminate\Support\Facades\DB;
@endphp

<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <meta name="description" content=""> 
        <meta name="author" content=""> 
        <title>EMS</title>         
        <!-- Bootstrap core CSS -->         
        <link href="/bootstrap/css/bootstrap.css" rel="stylesheet"> 
        <!-- Custom styles for this template -->         
        <link href="/jumbotron.css" rel="stylesheet"> 
        <link rel="stylesheet" href="/components/pg.blocks/css/blocks.css"> 
        <link rel="stylesheet" href="/components/pg.blocks/css/plugins.css"> 
        <link rel="stylesheet" href="/components/pg.blocks/css/style-library-1.css"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"> 
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />

        <!-- drop dawn stylesheets-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>     
    <body>   
        <div class="container"> 
            <!-- Example row of columns -->             
            <div class="col-sm-offset-1 col-sm-12"> 
                <div class="underlined-title"> 
                    <h1>We are happy to answer any questions you have</h1> 
                </div>                 
                           
                <section class="statistic"> 
                        <div class="section__content section__content--p30"> 
                            <ul class="contact-info">
                                <div class="row" data-pg-collapsed>
                                    <div class="col-lg-9">
                                        <div class="card">
                                            <div class="card-header">We are ready to provide you with more information and answer any question you have.</div>
                                            <div class="card-body card-block">
                                                <span class="fa fa-envelope"></span> 
                                                <a href="mailto:buyme@example.com">emsbyucsc@gmail.com</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>                     
                            </ul> 
        
                            <div class="container-fluid">
                                <div class="row" data-pg-collapsed> 
                                    <div class="col-lg-9"> 
                                        <div class="card"> 
                                            <div class="card-header">Request A Help</div>             
                                            <div class="card-body card-block"> 
                                                <form action="/client/submitHelpRequest" method="post" data-pg-collapsed enctype="multipart/form-data"> 
                                                {{ csrf_field() }}
                                                    <div class="form-group" data-pg-collapsed> 
                                                        <label for="inputAddress">What Kind Of Issue</label>                         
                                                        <select name='issue_type'>
                                                            <?php
                                                                $Issue = DB::table('support_request_type')->get();
                                                            ?>
                                                                @foreach($Issue as $x)
                                                                    <option >{{$x->type}}</option>
                                                                @endforeach
                                                        </select> 
                                                    </div>
                                                    <div class="form-group"> 
                                                        <label for="inputAddress">Description Of Your Issue</label>                         
                                                        <textarea class="form-control"  name="description" placeholder="Type here.." ></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail4">Service Provider ID <small>(If Issue is regarding with customer)</small></label>
                                                        <input type="number" class="form-control"  name="svp_id" placeholder="Service Provider ID " min='1' >
                                                    </div>                  
                                            </div>             
                                        </div>         
                                    </div>     
                                </div>
                    
                                 <div class="row" data-pg-collapsed>
                                    <div class="col-lg-9">
                                        <div class="card">
                                            <div class="card-header">Images Of The Issue - <small>(Maximmum 6 Images Are Allowed !)</small></div>
                                            <div class="card-body card-block">
                    
                                                    <div class="form-actions form-group">
                                                        <input type="file"  name="issue_image[]" class="form-control-file" multiple>
                                                    </div>
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                               
                                   
                                <div class="row" data-pg-collapsed>
                                    <div class="col-lg-9">
                                        <center>
                                            <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-success btn-sm" style="margin:auto;display:block">Add Your New Service</button>
                                        </center>
                                        </div>
                                    </div>
                                </div>
                              </form>
                            </div>
                        </div>
                    </section>                                                       
                </div>                 
                <!-- /.form-container -->                 
            </div>             
            <hr> 
            <footer> 
                <p class="float-right"><a href="#top">Back to top</a></p> 
                <p>Copyright © 2018 EMS. All rights reserved. · <a href="/privacy">Privacy</a> · <a href="/tos">Terms</a></p> 
            </footer>             
        </div>         
        <!-- /container -->         
        <!-- Bootstrap core JavaScript
    ================================================== -->         
        <!-- Placed at the end of the document so the pages load faster -->         
        <script src="/assets/js/jquery.min.js"></script>         
        <script src="/assets/js/popper.js"></script>         
        <script src="/bootstrap/js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="/components/pg.blocks/js/plugins.js"></script>         
        <script type="text/javascript" src="/components/pg.blocks/js/bskit-scripts.js"></script>         
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script> 
        
        <!--drop down scipts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>     
</html>
@endsection