@extends('layouts.svp_login')

@section('content')
@php
use App\SVP;
$svp = session()->get('svp_id','null');
$new_svp = session()->get('new_svp','null');
if ($svp)
{
  $mysvp_id = $svp
}
else 
{
  $mysvp_id = $new_svp;
}
@endphp
<div class="login-wrap" data-pg-collapsed> 
    <br> 
    <br> 
    <br> 
    <br> 
    <br> 
    <br> 
    <div class="row">
        <div class="alert alert-success col-md-12" role="alert" id="notes">
          <h4>NOTES</h4>
          <ul>
            <li>Please confirm your email address using the verification link sent to 
                you. In case it’s missing from your inbox, please check your spam folder.</li>
            <li>If somehow, you did not recieve the verification email then <a href="/svpverification/{{$mysvp_id}}">resend the verification email</a></li>
          </ul>
        </div>
      </div>     
</div>
@endsection