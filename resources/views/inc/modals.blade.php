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