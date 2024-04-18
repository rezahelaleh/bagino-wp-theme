<?php
 $opal_group = wl_get_option('wl_opal_group');


 ?>
       
       <!-- ======= Our opal Section ======= -->
        <section id="opal" class="opal">
            <div class="container">

                <div class="section-eren">
                    <h2>services</h2>


                    
                   
                </div><br>

              <div class="row">
                   <?php foreach($opal_group as $service) {?>
                  <div class="col-md-6 col-lg-3 col-12 d-flex align-items-stretch mb-5 mb-lg-0">
                      <div class="icon-box main-shadow">
                          <div class="icon"><i class="bx <?= $service['test7'];?>"></i></div>
                          <h4 class="title text-left"><a href=""><?= $service['test6'];?></a></h4>
                          <p class="description text-left"><?= $service['test8'];?></p>
                      </div>
                  </div>
                  <?php } ?>
                </div>
            </div>
        </section>
        <!-- End Our opal Section -->
      








        