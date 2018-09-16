<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Blank Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" href="components/pg.blocks/css/blocks.css">
        <link rel="stylesheet" href="components/pg.blocks/css/plugins.css">
        <link rel="stylesheet" href="components/pg.blocks/css/style-library-1.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="card">
                    <img class="card-img-top soft-scroll" alt="Card image cap" src="http://pinegrow.com/placeholders/img20.jpg"/>
                    <div class="card-body text-center font-weight-bold">
                        <h2 class="card-title font-weight-bold">Welcome to EMS</h2>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title font-weight-normal mb-5">Thank you for registering with EMS,</h4>
                        <h4 class="card-title font-weight-normal"></h4>
                        <h4 class="card-title font-weight-normal d-inline-block mb-5">You're almost ready !</h4>
                        <h4 class="card-title font-weight-normal d-inline-block"></h4>
                        <h4 class="card-title font-weight-normal d-inline-block"></h4>
                        <h4 class="card-title font-weight-normal mb-5">First,
                                        please take a minute to verify your email by clicking the button below:</h4>
                        <h4 class="card-title font-weight-normal mb-5">*If
                                        you cannot open the link, copy and paste this link into your
                        browser: <a href = "{{ config('app.url', 'ems2.dv') }}/{{$verify->identity}}/{{$verify->id}}/{{$verify->verifyLink}}">{{ config('app.url', 'ems2.dv') }}/{{$verify->identity}}/{{$verify->id}}/{{$verify->verifyLink}}</a></h4>
                        <h4 class="card-title font-weight-normal mb-5">If you have any questions, let our support know at <a href="mailto:contact@ems.dv">contact@ems.dv</a>.</h4>
                        <h4 class="card-title font-weight-normal">Sincerely,</h4>
                        <h4 class="card-title font-weight-normal">EMS Team.</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <a class="btn btn-primary active" href="{{ config('app.url', 'ems2.dv') }}/{{$verify->identity}}/{{$verify->id}}/{{$verify->verifyLink}}">Click to Verify</a>
            </div>
            <div class="row pg-empty-placeholder"></div>
        </div>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="components/pg.blocks/js/plugins.js"></script>
        <script type="text/javascript" src="components/pg.blocks/js/bskit-scripts.js"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    </body>
</html>
