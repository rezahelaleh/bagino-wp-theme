        <!-- ======= Testimonials Section ======= -->
        <?PHP $companies_group = wl_get_option('wl_testimentionals_group'); 
        
    //   print_r($companies_group[0]['Testimentionals_logo']);

        
        ?>
        <h3 class="text-center">testimentional</h3>
        <section id="testimonials" class="bg-jumbotron">
            <div class="container">
    
                    <div class="swiper-container-3 ">
                    <div class="swiper-wrapper d-flex justify-content-center">
                        <?php foreach($companies_group[0]['Testimentionals_logo'] as $logo){ ?>
                                <div class="swiper-slide">
                                    <img src="<?= $logo?>" class="testimonial-img img-fluid" alt="gfgfgf">
                                </div>
                          <?php } ?>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- End Testimonials Section -->
  <!-- <div class="testimonial-item">
                        <img src="https://s4.uupload.ir/files/e779218c690eb392da1441789b4ce9fd_87y.jpg" class="testimonial-img" alt="">
                        <h3>RBA Shipping</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div> -->