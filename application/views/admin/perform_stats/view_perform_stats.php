<div class="row">
  <div class="col-md-8">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <div class="d-flex justify-content-between align-items-center px-3">
            <h6 class="text-white text-capitalize">PERFORMANCE STATISTICS WEB COMPONENT</h6>
            
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <?php
              $expiryDate = time() + (3 * 24 * 60 * 60);
              $userid = "NXG-Markets";
              $brokerid = "898";
              $accountType = "0";
              $secretKey = "b767-0407ab8";
              $token = md5("${userid}|${accountType}|${expiryDate}${secretKey}");
              $autochartistURL = "https://component.autochartist.com/performancestats-v2/?";
              $autochartistURL .= "broker_id=$brokerid";
            ?>
            <iframe  class="mg" src="<?= $autochartistURL ?>"></iframe>
            <!-- https://component.autochartist.com/performancestats-v2/?broker_id=898 -->
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  iframe.mg {
    height: 1050px;
    width: 100%;
}
  </style>