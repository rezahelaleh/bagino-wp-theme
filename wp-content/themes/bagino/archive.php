<?php get_header();?>


            <div class="container-fluid mt-2">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php
                    if(function_exists('bcn_display')) {
                        bcn_display();
                    }
                    ?>
                </div>
            </div>

                    <!-- <h2>
               <?php
              
               $category2 = get_the_category();
               echo $category2[0]->cat_name;
               ?>
                 </h2> -->
         



            <div class="container"> 
                            <div class="row">
                
            <?php
                    if(have_posts()) {
                        while (have_posts()) {
                            the_post();
                            ?>
                            
                                <div class="col-12 col-md-4">
                      <div class="card text-right mb-5">
                      <h5 class="px-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                <div class="image-box">
                                    <?php
                                    if(has_post_thumbnail()){
                                        $image = array(
                                            'alt' => get_the_title(),
                                            'title' => get_the_title(),
                                            'class' => 'img-fluid px-0'
                                        );
                                        the_post_thumbnail('large',$image);
                                    } else {
                                        echo '<img src="">';
                                    }
                                    ?>
                                </div>
                                <div class="px-2">
                                <span class="post-date"><?= get_the_date();?></span>
                                <?php $comments_count = wp_count_comments(get_the_ID());?>
                                
                                <div class="post-data">
                                    <span>توسط: <?php the_author();?></span>
                                    <span><?= $comments_count->total_comments;?> دیدگاه</span>
                                    <span><?= wp_statistics_pages( 'total', "", get_the_ID() );?> بازدید</span>
                                </div>
                                <div class="clear"></div>
                               
                                <!-- <div class="content">
                                    <p>
                                        <?php
                                        the_excerpt();
                                        ?>
                                    </p>
                                </div> -->
                                
                                <div class="pb-3 pt-3">
                                    <a href="<?php the_permalink();?>" class="btn btn-primary "
                                            data-text="ادامه مطلب">
                                        <span>ادامه مطلب</span>
                                    </a>
                                </div>
                                </div>
                           </div>
                            </div>
                       
                            <?php
                        }
                    ?>
                         </div>
            </div>
                   <?php } else{
                        echo 'no any post';
                    }
                    ?>
                   





<?php get_footer();?>