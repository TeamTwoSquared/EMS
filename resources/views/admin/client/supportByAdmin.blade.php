@extends('layouts.admin')
@section('content')


<div class="container">
          
    @foreach ($notfication_title as $notification)
        <div class="alert alert-info" role="alert"> 
        <a href="/admin/notification/{{$notification->notification_id}}">
                {{$notification->notification}}
            </a>
        </div>
    @endforeach
                   
</div>
@endsection 