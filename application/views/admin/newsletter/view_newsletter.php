<div class="row">
  <div class="col-md-8">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <div class="d-flex justify-content-between align-items-center px-3">
            <h6 class="text-white text-capitalize">NEWSLETTER</h6>
            
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <?php
              $expiryDate = "1759356000";
              $brokerid = "898";
              $userid = "NXG-Markets";
              $accountType = "0";
              $secretKey = "b767-0407ab8";
              $reportid = "926";
            //   $token = md5("${userid}|${accountType}|${expiryDate}${secretKey}");
              $token = "186c5230aa31539b6560a2ddb0596162";
              $autochartistURL = "https://reports.autochartist.com/signup/market-reports?";
              $autochartistURL .= "bid=$brokerid&user=email&demo=0&locale=en&expire=$expiryDate&token=$token";
            ?>
            <!-- https://reports.autochartist.com/signup/market-reports?bid=898&user=email&demo=0&
            locale=en&expire=1759356000&token=186c5230aa31539b6560a2ddb0596162 -->
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