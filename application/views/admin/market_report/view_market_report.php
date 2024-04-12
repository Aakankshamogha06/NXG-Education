<div class="row">
  <div class="col-md-8">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <div class="d-flex justify-content-between align-items-center px-3">
            <h6 class="text-white text-capitalize">MARKET REPORT WEB COMPONENT</h6>
            
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
              $reportid = "926";
              $token = md5("${userid}|${accountType}|${expiryDate}${secretKey}");
              $autochartistURL = "https://reports.autochartist.com/mr/?";
              $autochartistURL .= "broker_id=$brokerid&rid=$reportid&demo=$accountType&token=$token";
              $autochartistURL .= "&expire=$expiryDate&locale=en_GB&user=$userid";
            ?>
            <!-- 
            https://reports.autochartist.com/mr/?broker_id=<brokerid>&rid=<reportid>&demo=<account_type>&token=<token>
              &expire=<expiry>&locale=<language>&user=<user>&css=<css>
            
            https://reports.autochartist.com/mr/?broker_id=898&token=150d9cb642f96518e2d0fbb5c6157ee6&expire=1759356000&user=NXG-Markets&
            locale=en&rid=926&demo=0&css=https://broker-resources.autochartist.com/css/components/898-mr-app.css#/report/latest -->
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