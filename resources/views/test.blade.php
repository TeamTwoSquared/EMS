<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>     
    <body class="animsition"> 
        <div class="container">
            <br><br>
            <h2 align="center"> Test form </h2>
            <div class="form-group">
                <form name="add_name" id="add_name">
                        
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td><input type="text" name="name[]" id="name" placeholder="Enter name" class="form-control name_list" /></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                        
                        <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit">
                        
                    </table>
                </form>
            </div>
        </div>
        
        



        <!-- Jquery JS-->         
        <script src="vendor/jquery-3.2.1.min.js"></script>         
        <!-- Bootstrap JS-->         
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>         
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>         
        <!-- Vendor JS       -->         
        <script src="vendor/slick/slick.min.js">
    </script>         
        <script src="vendor/wow/wow.min.js"></script>         
        <script src="vendor/animsition/animsition.min.js"></script>         
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>         
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>         
        <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>         
        <script src="vendor/circle-progress/circle-progress.min.js"></script>         
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>         
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>         
        <script src="vendor/select2/select2.min.js">
    </script>         
        <!-- Main JS-->         
        <script src="js/main.js"></script>         
        <script type="text/javascript" src="components/pg.blocks/js/plugins.js"></script>
        <script type="text/javascript" src="components/pg.blocks/js/bskit-scripts.js"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    </body>     
</html> 
<script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" placeholder="Enter name" class="form-control name_list"></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();

            });
            $('#submit').click(function(){
                $.ajax({
                    type:'POST',
                    url:'/tadd',
                    data:$('#add_name').serialize(),
                    success:function(data)
                    {
                        alert(data);
                        $('#add_name')[0].reset();
                    }
                });
            });
        });
    </script>
<!-- end document-->