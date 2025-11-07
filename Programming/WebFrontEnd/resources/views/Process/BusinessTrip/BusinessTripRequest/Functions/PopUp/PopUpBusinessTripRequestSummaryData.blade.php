<div class="modal fade" id="businessTripRequestFormModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document" style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="margin: 0px;font-weight:bold;">Are you sure you want to save this data?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-bottom: 1rem;">
          <div class="col" style="font-size: 0.9rem;">
            Travel & Fares
          </div>
          <div id="travel_fares_modal_summary" class="col text-right" style="font-size: 0.9rem;">
            0.00
          </div>
        </div>

        <div class="row" style="margin-bottom: 1rem;">
          <div class="col" style="font-size: 0.9rem;">
            Allowance
          </div>
          <div id="allowance_modal_summary" class="col text-right" style="font-size: 0.9rem;">
            0.00
          </div>
        </div>

        <div class="row" style="margin-bottom: 1rem;">
          <div class="col" style="font-size: 0.9rem;">
            Entertainment
          </div>
          <div id="entertainment_modal_summary" class="col text-right" style="font-size: 0.9rem;">
            0.00
          </div>
        </div>

        <div class="row" style="margin-bottom: 1rem;">
          <div class="col" style="font-size: 0.9rem;">
            Other
          </div>
          <div id="other_modal_summary" class="col text-right" style="font-size: 0.9rem;">
            0.00
          </div>
        </div>

        <div class="row" style="margin-bottom: 1rem;">
          <div class="col">
            <!-- <div style="font-size: 0.9rem;text-align: right;margin-bottom: 0.3rem;">+</div> -->
            <hr style="margin: 0; border: 1px solid #000;" />
          </div>
        </div>

        <div class="row" style="margin-bottom: 1rem;">
          <div class="col" style="font-size: 0.9rem;">
            Total BRF
          </div>
          <div id="total_brf_modal_summary" class="col text-right" style="font-size: 0.9rem;">
            0.00
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> No, cancel
        </button>

        <button type="button" id="submitBRF" class="btn btn-default btn-sm" onclick="SubmitForm();" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Yes, save it
        </button>
      </div>
    </div>
  </div>
</div>