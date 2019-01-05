<!-- Ads Payment Confirm -->
<!-- Modal -->
<div class="modal fade" id="adsPayModal" tabindex="-1" role="dialog" aria-labelledby="adsPayModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adsPayModalLabel">Confirm Payment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="modal-loader" style="display: none; text-align: center;">
            <img src="/images/ajax-loader.gif">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
        </div>

         <!-- content will be load here -->                          
         <div id="dynamic-content"></div>

      </div>
    
    </div>
  </div>
</div>

<!-- Service Video Play Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <div>
            <iframe width="100%" height="350" src=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Client Reservation Models -->
<div class="modal fade bd-reservation-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="modal-loader-reserve" style="display: none; text-align: center;">
          <img src="/images/ajax-loader.gif">
      </div>

         <!-- content will be load here -->                          
         <div id="dynamic-content-reserve"></div>
    </div>
  </div>
</div>
