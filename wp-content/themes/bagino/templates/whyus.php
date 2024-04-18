<?php
 $whyus_group = wl_get_option('wl_whyus_group');


 ?>
<main id="main">
      <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

            
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                <?php foreach($whyus_group as $service) {?>
           
           <div class="col-12 col-xl-3">
             <div class="card main-shadow icon-box mt-4 mt-xl-0">
                 <i  class="bx <?= $service['test4'];?> " style="color:
                 <?php 
                 if ($service['test4'] == 'bxl-vuejs') echo '#00B584';
                 if ($service['test4'] == 'bxl-react') echo '#00DDFD';
                 if ($service['test4'] == 'bxl-angular') echo '#F60010';
                 if ($service['test4'] == 'bxl-nodejs') echo '#74C123';
                 ?>"></i>
                 <h4><?= $service['test3'];?></h4>
                 <span class="text-darkgreen font-weight-bold text-left"><?= $service['test5'];?></span>
             </div>
         </div>
                 <?php } ?>
            </div>

                            </div>
                        </div>
                  
                </div>

            </div>
        </section>
        <!-- End Why Us Section -->
