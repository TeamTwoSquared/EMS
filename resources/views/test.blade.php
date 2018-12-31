<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>     
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
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
<!-- end document-->