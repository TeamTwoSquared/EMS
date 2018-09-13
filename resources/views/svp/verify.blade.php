@extends('layouts.svp_login')

@section('content')
<div class="login-wrap" data-pg-collapsed> 
    <br> 
    <br> 
    <br> 
    <br> 
    <br> 
    <br> 
    <div> 
        <div class="alert alert-success" role="alert"> 
            <h4 class="alert-heading">Well done!</h4> 
            <p>Please confirm your email address using the verification link sent to 
you. In case it’s missing from your inbox, please check your spam folder</p> 
            <hr> 
        </div>         
        <a class="btn btn-primary float-right text-uppercase text-monospace active btn-lg btn-block" href="verifyagain">Resend</a> 
    </div>     
</div>
@endsection