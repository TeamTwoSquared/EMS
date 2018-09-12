@extends('layouts.admin')
@section('content')
@php
use App\Catergory;
use App\Http\Controllers\event\CatergoriesController;

@endphp
<div class="row" data-pg-collapsed>
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Manage Catergory</h3>
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
                <a href="catergory/add"> 
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add Category&nbsp;
                    </button>
                </a>
                <a href="catergory/delete">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small bg-danger">
                        <i class="zmdi zmdi-minus"></i>remove Category&nbsp;
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
                        <th>name</th>
                        <th>description</th>
                        <th>number of templates</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Start TABLE ROW-->
                    @foreach($catergories as $catergory)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{$catergory->name}}</td>
                        <td>{{$catergory->description}}</td>
                        <td>{{$catergory->numberOftemplates}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="catergory/edit/{{$catergory->catergory_id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <a href="catergory/block/{{$catergory->catergory_id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Lock">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </a>
                                <a href="catergory/delete/{{$catergory->catergory_id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </a>
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