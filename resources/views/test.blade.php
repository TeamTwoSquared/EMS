@include('inc.messages')
@php
use App\Http\Controllers\event\CatergoryTemplatesController;
$catergory_names=CatergoryTemplatesController::getCatergories(1);
@endphp
{{$catergoryTemplate}}
