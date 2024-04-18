<!DOCTYPE html>
<html lang="<?= get_bloginfo( 'language' ); ?>">
<!-- <?php language_attributes();?> -->
<head>
<meta name="theme-color" content="#264653">
 <meta charset="<?= bloginfo('charset')?>">
 <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
 <title>Bagino</title>
 <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"> -->
 <meta content="" name="descriptison">
 <meta content="" name="keywords">
 <?php wp_head() ?>
 <?php $hero_group = wl_get_option('wl_hero_group')?>

</head>

<body>

<header >


  
<nav class="navbar navbar-expand-md navbar-dark bg-dark p-3 text-light" role="navigation">
  <div class="container-fluid">
   

<?php

$current_user_info = wp_get_current_user();

$current_user = $current_user_info->user_login;

if ( ($current_user_info instanceof WP_User) ) {
   
   $current_user_profile =  get_avatar( $current_user_info->ID, 32 );
    
}


?>







<!-- <div class="nav-form pl-2">

<form class="form-inline " action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input class="form-control nav-inputform" name="s" type="search" placeholder="Search" aria-label="Search">
</form>

</div> -->

<a class="navbar-brand" href="<?= get_bloginfo('wpurl'); ?>"><?= $hero_group[0]['test'] ?></a>


    




<?php if(!is_user_logged_in()){
      
      if(get_permalink() != wp_login_url() && !is_user_logged_in()){
           ?>
          <a class="text-dark" href="<?= wp_login_url( get_permalink() ); ?>" title="Login">ورود</a>
        
  <?php } ?>

    
      <?php }else{ ?>

  

                  <div class="dropdown ">
<a class="btn btn-secondary dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
<?= $current_user  ?>

</a>

<div class="dropdown-main dropdown-menu text-right " dir="rtl" aria-labelledby="dropdownMenuLink">
<a class="dropdown-item" href="http://localhost/my-account/">حساب کاربری</a>
<a class="dropdown-item" href="http://localhost/cart/">سبد خرید</a>
<a class="dropdown-item" href="http://localhost/wp-login.php?action=logout">خروج از حساب </a>
</div>
</div>

      <div class="navbar-profile">
            <?= $current_user_profile ?>
        </div>

          <?php  } ?>



          <?php
        wp_nav_menu( array(
            'theme_location'    => 'megamenu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav  ml-auto ',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>



          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>
  


       
    </div>
</nav>

</header>

    <!-- <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br> -->
    <!-- End Header -->

