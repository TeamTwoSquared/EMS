@php
use App\Http\Controllers\svp\SVPsController;
if(!(SVPsController::checkLogged(0))){
header("Location: /svp/login");
die();
}
$svp=SVPsController::getSVP();                   
@endphp
@include('inc.messages')
@yield('content')