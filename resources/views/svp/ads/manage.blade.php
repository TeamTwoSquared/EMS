@extends('layouts.svp')
@section('content')
@php
use App\Http\Controllers\svp\SVPsController;
if(!(SVPsController::checkLogged(0))){
header("Location: /svp/login");
die();
}
$svp=SVPsController::getSVP();
@endphp
<section class="statistic"> 
        <div class="section__content section__content--p30"> 
            <div class="container-fluid">
                <div class="row" data-pg-collapsed> 
                    <div style="padding:20px;" align="right" class="col-md-4"></div>
                    <div style="padding:20px;" align="right" class="col-md-4"></div>
                    <div style="padding:20px;" align="right" class="col-md-4" data-pg-collapsed>
                        <a href="/svp/ads/create"> <button class="btn btn-success" type="button">+ Add an advertisement</button> </a>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Placement</th>
                                <th>Status</th>
                                <th>Price (Rs.)</th>
                                <th>Impressions</th>
                                <th>Clicks</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Start TABLE ROW-->
                            @foreach($ads as $ad)
                            <tr class="tr-shadow">
                                <td>{{$ad->title}}</td>

                                @if($ad->type == 0)
                                <td>Picture</td>
                                @elseif($ad->type == 1)
                                <td>Text</td>
                                @endif

                                @if($ad->position == 0)
                                <td>Bottom Pane</td>
                                @elseif($ad->position == 1)
                                <td>Right Pane</td>
                                @else
                                <td>Bottom & Right</td>
                                @endif

                                @if($ad->isapprove == 1)
                                <td><span class="status--process">approved</span></td>
                                @elseif($ad->isapprove == 0)
                                <td><span class="status--pending">pending</span></td>
                                @elseif($ad->isapprove == 2)
                                <td><span class="status--denied">blocked</span></td>
                                @else
                                <td><span class="status--pending"><strong>EXPIRED</strong></span></td>
                                @endif
                                <td>{{$ad->price}}</td>
                                <td>{{$ad->impressions}}</td>
                                <td>{{$ad->numberOfclicks}}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="ads/edit/{{$ad->ad_id}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        <a href="ads/pay/{{$ad->ad_id}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Pay">
                                                <i class="far fa-money-bill-alt"></i>
                                            </button>
                                        </a>
                                        
                                            <button onclick ="deleteMe({{$ad->ad_id}})" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                                <script>
                                                    function deleteMe(id) {
                                                            if (confirm("Are you sure you want to delete this ad (Payments made for the AD won't refunded) !")) {
                                                                window.location.replace("ads/delete/"+id);
                                                            } 
                                                        }
                                                </script>
                                            </button>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                            @endforeach
                            <!-- END TABLE ROW-->
                        </tbody>
                    </table>
                </div>
    
                
            </div>
        </div>
</section>            
@endsection






