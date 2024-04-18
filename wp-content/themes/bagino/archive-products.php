<?php get_header();?>

<h2>
                        <?php
                        $category = get_the_category();
                        echo $category[0]->cat_name;
                        ?>
                    </h2>
                    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                        <?php
                        if(function_exists('bcn_display')) {
                            bcn_display();
                        }
                        ?>
                    </div>


        <div class="container">
         
                    <?php
                    if(have_posts()) {
                        while (have_posts()) {
                            the_post();
                            ?>
                            <article class="single-content">
                                <div class="image-box">
                                    <?php
                                    if(has_post_thumbnail()){
                                        $image = array(
                                            'alt' => get_the_title(),
                                            'title' => get_the_title(),
                                            'class' => 'img-post'
                                        );
                                        the_post_thumbnail('large',$image);
                                    } else {
                                        echo '<img src="">';
                                    }
                                    ?>
                                </div>
                                <span class="post-date"><?php echo get_the_date();?></span>
                                <?php $comments_count = wp_count_comments(get_the_ID());?>
                                <div class="post-data">
                                    <span>توسط: <?php the_author();?></span>
                                    <span><?php echo $comments_count->total_comments;?> دیدگاه</span>
                                    <span><?php echo wp_statistics_pages( 'total', "", get_the_ID() );?> بازدید</span>
                                </div>
                                <div class="clear"></div>
                                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                <div class="content">
                                    <p>
                                        <?php
                                        the_excerpt();
                                        ?>
                                    </p>
                                </div>
                                <div class="clear"></div>
                                <div class="bg-2">
                                    <a href="<?php the_permalink();?>" class="services-btn button button--rayen button--border-medium button--text-thin button--size-l button--inverted"
                                            data-text="ادامه مطلب">
                                        <span>ادامه مطلب</span>
                                    </a>
                                </div>
                            </article>
                            <?php
                        }
                    }
                    ?>
                </div>

              
        </div>
   

<?php get_footer();?>