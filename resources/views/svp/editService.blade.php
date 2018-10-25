@extends('layouts.svp')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Album example for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">

    <style>
        input[type=checkbox].css-checkbox{}

        .css-label{
            padding-left: 20px;
            display: flex;
            width: 50%;
            height: 300px;

            background-color: #E9EEF4;
            background-size: contain;
        }

        input[type=checkbox].css-checkbox:checked + label.css-label {
            background-position: 0 0;
            border: 3px solid #2FBCDF;
        }
    </style>

</head>
<body>
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <form>
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput">Service Name </label>
                    <input type="text" class="form-control" name='sName' id="formGroupExampleInput"  value="{{$service_info->name}}"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput2">Service Price</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name='price' placeholder="" value="{{$service_info->price}}"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput2">About The Service</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name='description' placeholder="" value="{{$service_info->description}}"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput2">Service Locations</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name='location[]' value=" " placeholder="NO Locations" multiple/>


                </div>
                <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput2">Service Keywords</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name='keyword[]' placeholder="" multiple/>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput2">Service Types</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name='type[]' placeholder="" multiple/>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput2">Service video URL</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name='url' placeholder=""/>
                </div>
            </form>
            <div class="row">
                @foreach($service_images as $serviceImage)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow" >
                        <input id="checkboxid" type="checkbox" class="css-checkbox" >
                        <label for="checkboxid" class="css-label"></label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

@endsection