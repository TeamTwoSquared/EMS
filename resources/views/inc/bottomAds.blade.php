@php
    use App\Http\Controllers\ad\AdsController;
    use App\Http\Controllers\ad\AdImagesController;

    $bottomAds = AdsController::getBottomAds();

@endphp
<div class="row" data-pg-collapsed> 
    @foreach($bottomAds as $bottomAd)
    @php
        $randomImage=AdImagesController::getBottomRandomImages($bottomAd->ad_id);

    @endphp
        <div class="col-md-4">
            @if($bottomAd->ad_url==NULL)
                <a href="/client/view/svp/{{$bottomAd->service_provider_id}}" target="_blank"> <img src="/storage/images/ad/{{$randomImage->imgurl}}"/> </a>
            @else
                <a href="{{$bottomAd->ad_url}}" target="_blank"> <img src="/storage/images/ad/{{$randomImage->imgurl}}"/> </a>
            @endif
            <hr/>
        </div>
    @endforeach
</div>