     <h3 class="text-center">value</h3>  
	   <!-- ======= Values Section ======= -->
        <section id="values" class="bg-light mb-4">
            <div class="container">
                <div class="row">

                <?php
			$posts = new WP_Query(
				array(
					'post_type' => 'post',//products
					'posts_per_page' => 4,
                    'cat' => '2'
				)
			);
			if($posts->have_posts()){
				while($posts->have_posts()){
					$posts->the_post();
			?>

        <div class=" col-12 col-md-4 mb-3">           
        <div class="card post-card">
        <?php
        		if(has_post_thumbnail()){
        			$image = array(
        				'alt' => get_the_title(),
        				'title' => get_the_title(),
        				'class' => 'card-img-top'
        			);
        			the_post_thumbnail('medium',$image);
        		} else {
        			echo '<img src="https://s4.uupload.ir/files/photo-1542831371-29b0f74f9713_amlh.jpg" alt="34345">';
        		}
        	?>
  <div class="card-body">
    <h5 class="card-title"><?php the_title();?></a></h5>
    <div class="read-more"><a href="<?php the_permalink();?>"><i class="icofont-arrow-right"></i> Read More</a></div>
  </div>
</div>

        </div>

        		<?php
        }
        wp_reset_postdata();
        } else {
        	echo '<h4>هیچ پستی جهت نمایش وجود ندارد!</h4>';
        }
				?> 
                </div>
            </div>
        </section>
        <!-- End Values Section -->
