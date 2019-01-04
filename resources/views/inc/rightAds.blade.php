@php
    use App\Http\Controllers\ad\AdsController;
    use App\Http\Controllers\ad\AdImagesController;

    $rightAds = AdsController::getRightAds();

@endphp
<div class="col-md-3 " data-pg-collapsed>
    @foreach($rightAds as $rightAd)
    @php
        $randomImage=AdImagesController::getRightRandomImages($rightAd->ad_id); 

    @endphp
        <div class="row">
            @if($rightAd->ad_url==NULL)
                <a href="/client/view/svp/{{$rightAd->service_provider_id}}" target="_blank"> <img src="/storage/images/ad/{{$randomImage->imgurl}}"/> </a>
            @else
                <a href="{{$rightAd->ad_url}}" target="_blank"> <img src="/storage/images/ad/{{$randomImage->imgurl}}"/> </a>
            @endif
        </div>
        <hr/>
    @endforeach
    
</div>