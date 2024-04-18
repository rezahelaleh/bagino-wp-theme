<?php
add_action('cmb2_admin_init','wl_register_options_meta_box');

function wl_register_options_meta_box(){
    $cmb_options = new_cmb2_box(array(
        'id' => 'wl_option_metabox',
        'title' => 'تنظیمات قالب',
        'object_types' => array('options-page'),
        'option_key' => 'wl_options'
    ));

    // hero

    $wl_hero_group = $cmb_options->add_field(array(
       'id' => 'wl_hero_group',
        'type' => 'group',
        'repeatable' => false,
        'options' => array(
            'group_title' => 'Hero Options',
            'closed' => false,
        ),
    ));

    $cmb_options->add_group_field($wl_hero_group,array(
        'name' => 'text one',
        'id' => 'test',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($wl_hero_group,array(
        'name' => 'text two',
        'id' => 'test2',
        'type' => 'text'
    ));


    // whyus
    $wl_whyus_group = $cmb_options->add_field(array(
       'id' => 'wl_whyus_group',
        'type' => 'group',
        'repeatable' => true,
        'options' => array(
            'group_title' => 'whyus Options',
            'closed' => false,
            'sortable' => true,
        ),
    ));

    $cmb_options->add_group_field($wl_whyus_group,array(
        'name' => 'title',
        'id' => 'test3',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($wl_whyus_group,array(
        'name' => 'boxicon',
        'id' => 'test4',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($wl_whyus_group,array(
        'name' => 'main-text',
        'id' => 'test5',
        'type' => 'textarea'
    ));
    

    // opal
    $wl_opal_group = $cmb_options->add_field(array(
       'id' => 'wl_opal_group',
        'type' => 'group',
        'repeatable' => true,
        'options' => array(
            'group_title' => 'opal Options',
            'closed' => false,
            'sortable' => true,
        ),
    ));

    $cmb_options->add_group_field($wl_opal_group,array(
        'name' => 'title',
        'id' => 'test6',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($wl_opal_group,array(
        'name' => 'boxicon',
        'id' => 'test7',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($wl_opal_group,array(
        'name' => 'main-text',
        'id' => 'test8',
        'type' => 'textarea'
    ));


// testimentional

$wl_testimentionals_group = $cmb_options->add_field(array(
    'id' => 'wl_testimentionals_group',
    'type' => 'group',
    'repeatable' => false,
    'options' => array(
        'group_title' => 'Testimentional Options',
        'closed' => false,
    ),
));
$cmb_options->add_group_field($wl_testimentionals_group,array(
    'name' => 'Testimentionals',
    'id' => 'Testimentionals_logo',
    'type' => 'file_list'
));


}


// Add term page
function pippin_taxonomy_add_new_meta_field() {
    ?>
    <div class="form-field">
        <label for="term_meta[custom_term_meta]"><?php _e( 'عدد موقعیت منو', 'pippin' ); ?></label>
        <input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
        <p class="description"><?php _e( 'لطفا یک عدد برای ستون بندی منو اضافه کنید.','pippin' ); ?></p>
    </div>
    <?php
}
add_action( 'category_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );

// Edit term page
function pippin_taxonomy_edit_meta_field($term) {
    $t_id = $term->term_id;
    $term_meta = get_option( "taxonomy_$t_id" ); ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e( 'عدد موقعیت منو', 'pippin' ); ?></label></th>
        <td>
            <input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="<?php echo esc_attr( $term_meta['custom_term_meta'] ) ? esc_attr( $term_meta['custom_term_meta'] ) : ''; ?>">
            <p class="description"><?php _e( 'لطفا یک عدد برای ستون بندی منو اضافه کنید.','pippin' ); ?></p>
        </td>
    </tr>
    <?php
}
add_action( 'category_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2 );

// save term page
function save_taxonomy_custom_meta( $term_id ) {
    if (isset($_POST['term_meta'])) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        update_option( "taxonomy_$t_id", $term_meta );
    }
}
add_action( 'edited_category', 'save_taxonomy_custom_meta', 10, 2 );
add_action( 'create_category', 'save_taxonomy_custom_meta', 10, 2 );


function wl_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        return cmb2_get_option( 'wl_options', $key, $default );
    }

    $opts = get_option( 'wl_options', $default );
    $val = $default;
    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }
    return $val;
}