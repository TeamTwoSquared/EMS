@extends('layouts.svp')
@section('content')
@php
use App\Http\Controllers\svp\SVPBookingServicesController;
use App\Http\Controllers\service\ServiceCustomerBookingsController;
@endphp
<div class="row" data-pg-collapsed>
    <div class="col-md-11">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Manage Booking</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Today</option>
                        <option value="">3 Days</option>
                        <option value="">1 Week</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters
                </button>
                <div class="rs-select2--light rs-select2--md">
                    <input id="datepicker" name="date" value="Select Date"/>
                        <script>
                            $('#datepicker').datepicker(
                                {
                                    header: true,
                                    modal: true,
                                    format: 'yyyy-dd-mm',
                                    footer: true,
                                    uiLibrary: 'bootstrap4',
                                    select: function (e, type) 
                                    {
                                        alert(JSON.stringify(e, null, 4));
                                    },
                                    disableDates:  function (date) 
                                    {
                                        var enable= [10,15,20,25]; //dates to activate
                                        if (enable.indexOf(date.getDate()) == -1 ) {
                                            return false;
                                        } else {
                                            return true;
                                        }
                                    }
                                }
                               );
                        </script>
                </div>
            </div>
            <div class="table-data__tool-right">
                <a href="booking/add"> 
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add Booking&nbsp;
                    </button>
                </a>
                <a href="booking/delete">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small bg-danger">
                        <i class="zmdi zmdi-minus"></i>remove Booking&nbsp;
                    </button>
                </a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>status</th>
                        <th>services</th>
                        <th>Client</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Start TABLE ROW-->
                    @foreach($bookings as $booking)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td class="agenda-date" class="active" rowspan="1">
                            @php
                            $date = new DateTime($booking->date);                                
                            @endphp 
                            <div class="dayofmonth">{{$date->format('d')}}</div>                                             
                            <div class="dayofweek">{{$date->format('l')}}</div>                                             
                            <div class="shortdate text-muted">{{$date->format('F')}}, {{$date->format('Y')}}</div>                                             
                        </td>
                        <td class="agenda-time">
                            <div>{{$booking->stime}}</div>
                            <div>to</div>
                            <div>{{$booking->etime}}</div> 
                        </td> 
                        @if($booking->status == 0)
                        <td><span class="status--process">active</span></td>
                        @elseif($booking->status == 1)
                        <td><span class="status--pending">pending</span></td>
                        @else
                        <td><span class="status--denied">blocked</span></td>
                        @endif
                        <td class="active" rowspan="1">
                            @php
                                $services=SVPBookingServicesController::getServices($booking->booking_id);
                            @endphp
                            @foreach ($services as $service)
                                <div>{{$service->name}}</div> 
                            @endforeach
                        </td>
                        <td class="active" rowspan="1">
                            @php
                                $clients=ServiceCustomerBookingsController::getClients($booking->booking_id);
                            @endphp
                                @foreach ($clients as $client)
                                    <div>{{$client->name}}</div>
                                @endforeach
                        </td>  
                        <td>
                            <div class="table-data-feature">
                                <a href="booking/block/{{$bookings[0]->booking_id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Lock">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </a>                                
                                <button onclick ="deleteMe({{$bookings[0]->booking_id}})" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                    <script>
                                        function deleteMe(id) 
                                        {
                                            if (confirm("Are you sure you want to delete this catergory!")) 
                                            {
                                                window.location.replace("booking/delete/"+id);
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
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection