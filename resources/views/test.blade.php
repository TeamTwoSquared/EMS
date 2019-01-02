@php
    use App\Http\Controllers\service\ServicesController;
    $other_services = ServicesController::getServicesExceptOne(12,3);

    dd($other_services);

@endphp