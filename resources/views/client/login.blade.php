@extends('layouts.client_login')

@section('content')
<div class="login-wrap">
        <div class="login-content">
            <div class="login-logo">
                <a href="#">
                    <img src="images/icon/client_logo.png" alt="EMS">
                </a>
            </div>
            <div class="login-form">
                <form action="dologin" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Email Address</label>
                        <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="login-checkbox">
                        <label>
                            <input type="checkbox" name="remember">Remember Me
                        </label>
                        <label>
</label>
                    </div>
                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                </form>
                <div class="register-link">
                    <p>
                    Don't you have account? <a href="register">Sign Up Here</a> </p>
                </div>
            </div>
        </div>
    </div>
@endsection