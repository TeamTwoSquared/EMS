@extends('layouts.svp')
@section('content')
@php
use App\Http\Controllers\svp\SVPsController;
$svp=SVPsController::getSVP();
@endphp
<section class="statistic" style="margin-top: 100px;"> 
    <div class="section__content section__content--p30"> 
        <div class="container-fluid">
            <div class="row" data-pg-collapsed>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">Change your Account Details</div>
                        <div class="card-body card-block">
                            <form action="update_profile" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                            
                                    <div class="card-body card-block">
                                        <label for="inputAddress">Name</label>
                                        <input type="text" class="form-control" name='name' placeholder="Name"/> 
                                        <form> 
                                            <div class="form-row"> 
                                                <div class="form-group">           
                                            </div>                                         
                                                <div class="form-group">     </div>                                         
                                                <div class="form-group col-md-6 col-lg-12"> 
                                                    <label for="inputAddress">User Name</label>
                                                    <input type="text" class="form-control"  name='userName' placeholder="user name"/>
                                                    <label for="inputEmail4">Email</label>                                             
                                                    <input type="email" class="form-control"  name='email' placeholder="Email"/>
                                                </div>
                                                <div class="form-group col-md-6 col-lg-12"> 
                                                    <label for="inputEmail4">Password</label>                                             
        
                                                    <input type="password" class="form-control"  name='password' placeholder="Password"/>
                                                </div>
                                                <div class="form-group col-md-6 col-lg-12"> 
                                                    <label for="inputEmail4">New Password</label>                                             
        
                                                    <input type="password" class="form-control"  name='newPassword' placeholder="new Password"/>
                                                </div>
                                                <div class="form-group col-md-6 col-lg-12"> 
                                                    <label for="inputEmail4">Comform Password</label>                                             
        
                                                    <input type="password" class="form-control"  name='comformPassword' placeholder="comform Password"/>
                                                </div>
                                            </div>                                     
                                            <div class="form-group"> 
                                                <label for="inputAddress">Address</label>                                         
                                                <input type="text" class="form-control"  name='address' placeholder="1234 Main St"/> 
                                            </div>                                     
                                            <div class="form-group"> 
                                                <label for="inputAddress2">Address 2</label>                                         
                                                <input type="text" class="form-control"  name='address2' placeholder="Apartment, studio, or floor"/> 
                                            </div>                                     
                                            <div class="form-row"> 
                                                <div class="form-group col-md-6"> 
                                                    <label for="inputCity">City</label>                                             
                                                    <input type="text" class="form-control" name='city' id="inputCity"/> 
                                                </div>                                         
                                                <div class="form-group col-md-4"> 
                                                    <label for="inputState">State</label>                                             
                                                    <input type="text" class="form-control" name='state' id="inputCity"/>                                          
                                                </div>                                         
                                                                                        
                                            </div> 
                            
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row" data-pg-collapsed>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">Change your Profile Picture</div>
                        <div class="card-body card-block">
                            <form action="change_img" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-actions form-group">
                                    <input type="file" id="profile_image" name="profile_image" class="form-control-file">
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Upload Image</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>            
@endsection