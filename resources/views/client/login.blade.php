@extends('layouts.client_login')

@section('content')
<div class="login-wrap" data-pg-collapsed> 
    <div class="login-content bg-ems-admin border-ems-admin"> 
        <div class="login-logo"> 
            <a href="#"> 
                <img src="/client/images/icon/logo-client.png" alt="EMS"> 
            </a>             
        </div>         
        <div class="login-form"> 
            <form action="dologin" method="post"> 
                {{ csrf_field() }}
                <div class="form-group"> 
                    <label class="text-white font-weight-bold">Email Address</label>                     
                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email"> 
                </div>                 
                <div class="form-group"> 
                    <label class="text-white font-weight-bold">Password</label>                     
                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password"> 
                </div>                 
                <div class="login-checkbox"> 
                    <label class="text-white font-weight-normal"> 
                        <input type="checkbox" name="remember">Remember Me
                    </label>                     
                    <label> 
</label>                     
                </div>                 
                <button class="au-btn au-btn--block au-btn--green m-b-20 text-body font-weight-bold" type="submit">sign in</button>                 
            </form>             
            <div class="register-link"> 
                <p class="text-white"> 
                    Don't you have account? <a href="register" class="text-warning">Sign Up Here</a> </p>
                <p class="text-white"> 
                    <a href="/client/redirect" class="btn btn-primary">Login With Google</a> 
                </p> 
            </div>             
        </div>         
    </div>     
</div>
@endsection