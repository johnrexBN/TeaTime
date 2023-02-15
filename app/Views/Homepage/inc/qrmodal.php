
<?php
use App\Models\GcashModel;
 $qr_model =  new GcashModel();
 $data = [
	'gcash'=> $qr_model->first()
 ];?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scan QR Code for Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <img src="<?= base_url('assets/img/'.$data['gcash']['image'])?>" alt="QRcode">
      </div>
      <div>
        <p style="text-align: center;"><strong><?= $data['gcash']['name']?>: <?= $data['gcash']['phone_num']?></strong></p>
      </div>
    </div>
  </div>
</div>
