<?php 

require 'header.php';

?>
    <!--=================================
    Header -->

    <!--=================================
    Inner Header -->
    <div class="inner-header bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
            <h1 class="breadcrumb-title mb-0">Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
              <li class="breadcrumb-item"><a href="index"><i class="fas fa-home me-1"></i>Home</a></li>
              <li class="breadcrumb-item active"><span>Service</span></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  <!--=================================
  Inner Header -->

  <!--=================================
  Service -->
  <section class="space-ptb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-4 mb-4">
          <div class="service-item">
            <div class="service-img">
              <img class="img-fluid" src="images/service/crypto.png" alt="">
              <a href="signin"><i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-info">

              <h6 class="service-info-title"><a href="signin">CRYPTOCURRENCY</a></h6>
              <p>Cryptocurrency are digital assets used in making investments. <?php echo $company_name ?> invests and trades on top cryptocurrencies like Bitcoin, Etherium, Litecoin, Ripple, etc. With the help of our market analysts, our investors make great profits no cryptocurrency exchange can provide.</p>

            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
          <div class="service-item">
            <div class="service-img">
              <img class="img-fluid" src="images/service/oil.jpg" alt="">
              <a href="signin"><i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-info">
              <h6 class="service-info-title"><a href="signin">OIL AND GAS</a></h6>
              <p>Oil and gas are crucial energy resources that power much of the world's economy. Extracted from beneath the Earth's surface, oil (petroleum) is refined into fuels like gasoline, diesel, and jet fuel, while natural gas is used for heating, electricity generation, and as a raw material in industries.</p>

            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
          <div class="service-item">
            <div class="service-img">
              <img class="img-fluid" src="images/service/real-estate.jpg" alt="">
              <a href="signin"><i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-info">
              <h6 class="service-info-title"><a href="signin">REAL ESTATE</a></h6>
              <p>Real estate investment involves the purchase, ownership, management, rental and/or sale of real estate for profit. Improvement of realty property as part of a real estate investment strategy is generally considered to be a sub-specialty of real estate investing called real estate development. <?php echo $company_name ?> helps you secure properties at any location of your choice.</p>

            </div>
          </div>
        </div>
        
        
        
       
       
        
      </div>
    </div>
  </section>
  <!--=================================
  Service -->

  <!--=================================
  footer-->
<?php 

require "footer.php";

?>