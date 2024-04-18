<?PHP 
 define('TMP_DIR',get_template_directory_uri());


 
function setup_callback(){
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
register_nav_menus(
    array(
            'megamenu' => 'megamenu'
    )
);
}
add_action('init','setup_callback');

function load_assets(){
    // wp_enqueue_style( 'bootstrap.min',TMP_DIR.'/assets/css/bootstrap-v4.css');
    wp_enqueue_style( 'bootstrap.min',TMP_DIR.'/assets/css/bootstrap-v4.css');
    wp_enqueue_style( 'swiper',TMP_DIR.'/assets/css/swiper.min.css');
    wp_enqueue_style( 'boxicons',TMP_DIR.'/assets/vendor/boxicons/css/boxicons.min.css');
    wp_enqueue_style( 'icofont',TMP_DIR.'/assets/vendor/icofont/icofont.min.css');
    wp_enqueue_style( 'style',TMP_DIR.'/style.css');

    wp_enqueue_script( 'jQuery',TMP_DIR.'/assets/script/jquery.js',array('jquery'),'1',true);
    wp_enqueue_script( 'poper',TMP_DIR.'/assets/script/poper.js',array('jquery'),'1',true);
    wp_enqueue_script( 'bootstrap',TMP_DIR.'/assets/script/bootstrap-md.js',array('jquery'),'1',true);
    wp_enqueue_script( 'swiper',TMP_DIR.'/assets/script/swiper.min.js',array('jquery'),'1',true);
    wp_enqueue_script( 'main',TMP_DIR.'/assets/script/main.js',array('jquery','poper','bootstrap','swiper'),'1',true);

}
add_action('wp_enqueue_scripts','load_assets');

// dynamic widget
function register_sidebar_callback(){
    register_sidebar(
        array(
            'name' => 'سایدبار صفحات داخلی',
            'description' => 'از این قسمت می توانید سایدبار صفحات داخلی را ویرایش کنید.',
            'id' => 'single-sidebar',
            'class' => '',
            'before_widget' => '<aside class="single-aside">',
            'before_title' => '<h4 class="aside-title">',
            'after_title' => '</h4>',
            'after_widget' => '</aside>'
        )
    );
}
add_action('widgets_init','register_sidebar_callback');




function wp_learn_list_comments($comment,$args,$depth){
    ?>
    <div class="container-fluid">
    <div class="row  reply-comment">

        <div class="col-11 col-md-11">
            <div>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID()?>">
    
    <div class="comment-<?php comment_ID()?>">
    
        <div class="head-comment">
            
            <?php if($comment->comment_approved == 0){
                echo '<em>نظر شما هنوز توسط مدیر تایید نشده است!</em>';
            }
            ?>
            <div class="comment-meta">
                <span class="comment-date">  <span ><?= get_comment_author_link()?> </span>  &nbsp;&nbsp;  | &nbsp;&nbsp;   <span> <?= get_comment_date() ?></span>  </span>
                <!-- . ' ' . get_comment_time(); -->
                <?php edit_comment_link('ویرایش نظر');?>
            </div>
        </div>
        <div class="comment-text">
            <?php comment_text();?>
        </div>
        <div class="reply">
            <?php
            comment_reply_link(
                array(
                    'depth' => $depth,
                    'max_depth' => $args['max_depth']
                )
            );
            ?>
        </div>
    </div>
</li>
</div>
        </div>

        <div class="col-1 col-md-1 ">
        <div class="comment_author">
                    <?= get_avatar($comment->comment_author_email);?>
                   
                </div>
        </div>
    </div>
    </div>

    <?php
}




// post type
function custom_post_type() {
    $labels = array(
        'name'                => 'محصولات',
        'singular_name'       => 'محصول',
        'menu_name'           => 'محصولات',
        'parent_item_colon'   => 'محصول والد',
        'all_items'           => 'همه محصولات',
        'view_item'           => 'مشاهده محصول',
        'add_new_item'        => 'افزودن محصول جدید',
        'add_new'             => 'افزودن جدید',
        'edit_item'           => 'ویرایش محصول',
        'update_item'         => 'ویرایش محصول',
        'search_items'        => 'جستجوی محصول',
        'not_found'           => 'چیزی پیدا نشد!',
        'not_found_in_trash'  => 'در سطل زباله چیزی پیدا نشد!',
    );
    $args = array(
        'label'               => 'products',
        'description'         => 'لیست محصولات سایت',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        'taxonomies'          => array( 'category','post_tag'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'products', $args );

}
add_action( 'init', 'custom_post_type', 0 );

// taxonomy
function create_product_type_taxonomy() {
    $labels = array(
        'name' => 'رنگ محصولات',
        'singular_name' => 'colors',
        'search_items' => 'جستجوی رنگ محصول',
        'all_items' => 'همه محصولات',
        'parent_item' => 'مادر',
        'parent_item_colon' => 'مادر',
        'edit_item' => 'تغییر رنگ',
        'update_item' => 'ویرایش رنگ',
        'add_new_item' => 'افزودن جدید',
        'new_item_name' => 'افزودن رنگ جدید',
        'menu_name' => 'رنگ محصولات',
    );

    register_taxonomy('colors',array('products'), array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array( 'slug' => 'colors' ),
    ));
}
add_action( 'init', 'create_product_type_taxonomy', 0 );








require_once dirname(__FILE__).'/includes/cmb2/init.php';
require_once dirname(__FILE__).'/functions/cmb2-option.php';
require_once dirname(__FILE__).'/functions/class-wp-bootstrap-navwalker.php';

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );




