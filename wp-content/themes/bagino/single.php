<?php get_header();?>


<div class="container-fluid mt-3">
           
              <!-- <h2>
               <?php
               // the_category()
               $category = get_the_category();
               echo $category[0]->cat_name;
               ?>
                 </h2> -->
              
                 <nav aria-label="breadcrumb">
         <div class="breadcrumbs px-3 " typeof="BreadcrumbList" vocab="https://schema.org/">
                     <?php
                     if(function_exists('bcn_display')) {
                         bcn_display();
                     }
                     ?>
                 </div>
                </nav>
        </div>

<?php
if(have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <section class="sec-margin">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-12 col-md-9 mt-3">
                        <article class="card">
                 
                            <div class="p-3 text-left">
                                <?php the_content();?>
                            </div>
                            
                        </article>

                        <div class="card mt-2 pt-3">
                        <div class="container-fluid text-right ">
                            <h5> نظرات کاربران درباره این پست</h5>
                            <?php if(!is_user_logged_in()){?> 
                            <div class="alert alert-primary border-border mt-2 py-3" role="alert">

                            جهت ثبت نظر باید در سایت عضو شوید و یا وارد سایت شده باشید .
                            <?php
                            if(get_permalink() != wp_login_url() && !is_user_logged_in()){
                                // wp_redirect( wp_login_url() ); exit;
                        ?>
                                <a class="text-dark" href="<?= wp_login_url( get_permalink() ); ?>" title="Login">ورود</a>
                        <?php
                            }
                        ?>

                            </div>
                            <?php } ?>
                            </div>
                            
                         <div class="pt-3 pr-3">
                                <?php
                                comments_template('/custom-comments.php');
                                ?>
                            </div>
                            </div>

                    </div>

                    <div class="col-12 col-md-3 mt-3">
                      <div class="card p-4 text-right">
                      <h4><a href="<?php the_permalink()?>"><?php the_title();?></a></h4>
                      <span class="font-weight-bold"><?= get_the_date();?></span>
                                
                  <?php $comments_count = wp_count_comments(get_the_ID());?>
                                
                      <span class="tagtie"><span><?php the_author()?></span> : نویسنده</span>
                      <span class="tagtie"><span><?= $comments_count->total_comments;?></span> : نظرات</span>
                      <span class="tagtie"> <span><?= wp_statistics_pages( 'total', "", get_the_ID() );?></span> : بازدید </span>
                   
                                </div>
                                <div class="card mt-3 py-4 px-2 text-right">
                                <div class="postclass">


                      <?php 
                    //   the_tags( ' <div class="py-3"> <span class="posttag">  ', '</span> <span class="posttag ">', ' </span>   &nbsp;  <span class="tags-span">: برچسب ها</span> </div>' ); 
                      
                    $posttags = get_the_tags();
                    if ($posttags) {
                        echo '<span class="text-right mb-3">برچسب ها</span><br><div class="mb-3 mt-3"> </div>';
                        
                      foreach($posttags as $tag) {
                        $tags = $tag->name; 
                        ?>
                        
                         <span dir="rtl" class="mt-4  border-border pr-2 font-weight-bold">
                             <span class=""><?='#' . $tags?></span>
                        </span>
                       
                     <?php }
                    }
                      ?>
                    </div>
                                </div>

                                <div class="card mt-3">
                                <div class="row text-center pl-5 py-3">
                                    <div class="col">
                                       <div class="row">

                <button type="button" class="btn bmd-btn-icon">
            <a  href="#" class="text-danger"><i class='bx bxl-instagram-alt'></i></a>
        </button>
                <button type="button" class="btn bmd-btn-icon">
            <a  href="#" class="text-primary"><i class='bx bxl-telegram' ></i></a>
        </button>
                <button type="button" class="btn bmd-btn-icon">
            <a  href="#" class="text-success"><i class='bx bxl-twitter' ></i></a>
        </button>
                    
                                       </div>
                                    </div>
                                    <div class="col">
                                      <span>مارا دنبال کنید</span>
                                    </div>
                                </div>
                            </div>

                    </div>



              
                    <!-- <?php get_sidebar();?> -->

                </div>
            </div>
        </section>
        <?php
    }
}
?>

<?php get_footer();?>