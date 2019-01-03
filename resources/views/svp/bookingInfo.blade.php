@extends('layouts.svp')
@section('content')
@php
use App\Catergory;
use App\Http\Controllers\event\CatergoriesController;
use App\Http\Controllers\event\CatergoryTemplatesController;

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
                        <th>service</th>
                        <th>Client</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Start TABLE ROW-->
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td class="agenda-date" class="active" rowspan="1"> 
                            <div class="dayofmonth">26</div>                                             
                            <div class="dayofweek">Saturday</div>                                             
                            <div class="shortdate text-muted">July, 2014</div>                                             
                        </td>
                        <td class="agenda-time"> 
                            5:30 AM
                        </td> 
                        <td><span class="status--pending">pending</span></td>
                        <td>Hall</td>
                        <td>Sajun</td>  
                        <td>
                            <div class="table-data-feature">
                                <a href="catergory/edit/{{$catergories[0]->catergory_id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <a href="template/block/{{$catergories[0]->catergory_id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Lock">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </a>                                
                                <button onclick ="deleteMe({{$catergories[0]->catergory_id}})" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                    <script>
                                        function deleteMe(id) 
                                        {
                                            if (confirm("Are you sure you want to delete this catergory!")) 
                                            {
                                                window.location.replace("catergory/delete/"+id);
                                            } 
                                        }
                                    </script>
                                </button>                                
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    <!-- END TABLE ROW-->
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection