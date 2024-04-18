<?php get_header();?>




<?php
if(have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <section id="single-main-content">
            <div class="container">
               
                   
                        <article class="single-content">
                            <div class="image-box">
                                <?php
                                $margin = 'margin-top: 0;';
                                if(has_post_thumbnail()){
                                    $image = array(
                                        'alt' => get_the_title(),
                                        'title' => get_the_title(),
                                        'class' => 'img-post'
                                    );
                                    the_post_thumbnail('large',$image);
                                } else {
                                    $margin = 'margin-top: -30px';
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                            <h2 style="<?php echo $margin;?>"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            <div class="content">
                               <?php the_content();?>
                            </div>
                        </article>
                   

            </div>
        </section>
        <?php
    }
}
?>






<?php get_footer();?>