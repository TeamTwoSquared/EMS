@extends('layouts.client')
@section('content')


<section class="au-breadcrumb2" data-pg-collapsed> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-12"> 
                <div class="au-breadcrumb-content"> 
                    <div class="au-breadcrumb-left"> 
                        <span class="au-breadcrumb-span">You are here:</span> 
                        <ul class="list-unstyled list-inline au-breadcrumb__list"> 
                            <li class="list-inline-item active"> 
                                <a href="#">Home</a> 
                            </li>                             
                            <li class="list-inline-item seprate"> 
                                <span>/</span> 
                            </li>                             
                            <li class="list-inline-item">Support Center</li>                             
                        </ul>                         
                    </div>                     
                    <form class="au-form-icon--sm" action="" method="post"> 
                        <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports..."> 
                        <button class="au-btn--submit2" type="submit"> 
                            <i class="zmdi zmdi-search"></i> 
                        </button>                         
                    </form>                     
                </div>                 
            </div>             
        </div>         
    </div>     
</section>
<section class="statistic statistic2" data-pg-collapsed> 
    <div class="container"> 
        <div class="row" data-pg-collapsed> 
            <div class="col-md-9">
                <div class="row pr-2">
                        <div class="jumbotron"> 
                                <h1>Our Support Policy</h1> 
                                <h4>When you Get service from EMS, you are getting support*. In order to understand the support type, please read the following details.

                                        *All our FREE service get Community Support. </h4>
                                <ul>
                                        <li>1. All supported service have 6 months of included support.</li>
                                        <li>2. You have the option to add a further 6 months of support (a support upgrade) when getting service.</li>
                                        <li>3. Your item can only have a maximum of 12 months valid support at any given time.</li>
                                        <li>4. You also have the option to purchase a support extension or a support renewal if you have less than 6 months of support remaining and the author is still supporting the item.</li>
                                        <li>5. The cost of support is calculated as a percentage of the item price (the price paid to the author for the item licence) and is determined by when you make the support purchase.</li>
                                </ul>

                                <a href='/client/getSupport'>
                                    <button  class="btn btn-primary btn-lg" role="button">Get A Support</button>
                                </a>
                                 
                        </div>
                </div>          
            </div>   
            
            
            <div class="col-md-3 " data-pg-collapsed> 
                <div class="row">
                    <img src="\storage\images\services\ls.jpg"/>
                    <hr/> 
                </div>
                <div class="row">
                      <hr></hr>
                      <hr></hr>
                </div>
                
                <div class="row">
                    <img src="\storage\images\services\ls.jpg"/>
                    <hr/> 
                </div>                
            </div>             
        </div>         
        <hr/> 
        <div class="row" data-pg-collapsed> 
            <div class="col-md-4"> 
                <img src="\storage\images\services\ls.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="\storage\images\services\ls.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="\storage\images\services\ls.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="\storage\images\services\ls.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="\storage\images\services\ls.jpg"> 
                <hr/> 
            </div>             
            <div class="col-md-4"> 
                <img src="\storage\images\services\ls.jpg"> 
                <hr/> 
            </div>             
        </div>         
    </div>     
</section>

@endsection