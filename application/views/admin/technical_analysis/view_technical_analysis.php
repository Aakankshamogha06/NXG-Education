<div class="row">
  <div class="col-md-8">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <div class="d-flex justify-content-between align-items-center px-3">
            <h6 class="text-white text-capitalize">TECHNICAL ANALYSIS WEB COMPONENT</h6>
            
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <?php
              $expiryDate = time() + (3 * 24 * 60 * 60);
              $brokerid = "898";
              $userid = "NXG-Markets";
              $accountType = "0";
              $secretKey = "b767-0407ab8";
              $token = md5("${userid}|${accountType}|${expiryDate}${secretKey}");
              $autochartistURL = "https://webapp.autochartist.com/componentcontainer/broker.php?";
              $autochartistURL .= "broker_id=$brokerid&user=$userid&logintoken=$token";
              $autochartistURL .= "&expire=$expiryDate&account_type=LIVE&locale=en_GB";
            ?>
            <iframe  class="mg" src="<?= $autochartistURL ?>"></iframe>
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