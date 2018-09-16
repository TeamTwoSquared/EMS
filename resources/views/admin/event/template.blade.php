@extends('layouts.admin')
@section('content')
@php
use App\Http\Controllers\event\CatergoryTemplatesController;

@endphp
<div class="row" data-pg-collapsed>
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Manage Templates</h3>
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
                <a href="template/add"> 
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add template&nbsp;
                    </button>
                </a>
                <a href="template/delete">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small bg-danger">
                        <i class="zmdi zmdi-minus"></i>remove template&nbsp;
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
                        <th>status</th>
                        <th>catergories</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Start TABLE ROW-->
                    @foreach($templates as $template)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{$template->name}}</td>
                        <td>{{$template->description}}</td>
                        @if($template->istemp == 0)
                        <td><span class="status--process">active</span></td>
                        @elseif($template->istemp == 1)
                        <td><span class="status--pending">pending</span></td>
                        @else
                        <td><span class="status--denied">blocked</span></td>
                        @endif

                        <td class="desc">
                            @php
                            $catergory_names=CatergoryTemplatesController::getCatergories($template->template_id);
                                foreach($catergory_names as $catergory_name)
                                {
                                    echo $catergory_name;
                                    echo '  ';
                                }
                            @endphp

                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="template/edit/{{$template->template_id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <a href="template/block/{{$template->template_id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Lock">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </a>
                                
                                    <button onclick ="deleteMe()" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                        <script>
                                            function deleteMe() {
                                                    if (confirm("Are you sure you want to delete this template!")) {
                                                        window.location.replace("template/delete/{{$template->template_id}}");
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