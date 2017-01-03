<?php 
// cai dat hỗ trợ theme_child
if ( ! function_exists( 'demowp_theme_child_setup' ) ) {

    function theme_child_setup() {

        add_theme_support( 'post-thumbnails', array( 'post' ) );
        set_post_thumbnail_size( 672, 372, true );
        add_image_size( 'theme_child', 1038, 576, true );
    }
    add_action ( 'init', 'theme_child_setup' );

}
  //
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}
function short_code_price( $atts ) {
    $atts = shortcode_atts( array(
        'id' => null,
    ), $atts, 'bartag' );

    $html = '';

    if( intval( $atts['id'] ) > 0 && function_exists( 'wc_get_product' ) ){
         $_product = wc_get_product( $atts['id'] );
         $html = "<span>Giá bán:</span>" . $_product->get_price();
    }
    return $html;
}

add_shortcode( 'woocommerce_price', 'short_code_price' );
//
add_filter( 'woocommerce_add_to_cart_redirect', 'wc_custom_cart_redirect' );
function wc_custom_cart_redirect() {
  return get_permalink( wc_get_page_id( 'shop' ) );
} 
//
function getcount()
{
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();
    $total=0;
    foreach($items as $item => $values) { 
    $total+=$values['quantity'];
    } 
    return $total;
  }

// 
  function geturlcart()
  {
    global $woocommerce;

if ( sizeof( $woocommerce->cart->cart_contents) > 0 ) :
return  $woocommerce->cart->get_checkout_url();
endif;
  }
//regester menu
register_nav_menus( array(
  'primary' => __( 'Primary Menu','theme_child' ),
  'social'  => __( 'Social Links Menu', 'theme_child' ),
  'sidebar_menu'  => __( 'sidebar menu', 'theme_child' ),
  ) );
//load css
if(!function_exists('load_theme_child_styles')){
    function load_theme_child_styles(){
        if (is_child_theme()) {
            $stylesheet_url_css = get_template_directory_uri().'/css/';

             wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css' );

             wp_enqueue_style('fontawsome',get_template_directory_uri().'/css/font-awesome.min.css');
              wp_enqueue_style('prettyPhoto',get_template_directory_uri().'/css/prettyPhoto.css');
               wp_enqueue_style('price-range',get_template_directory_uri().'/css/price-range.css');
            wp_enqueue_style( 'reset',get_template_directory_uri().'/css/main.css' );


            wp_enqueue_style( 'style', get_template_directory_uri().'/style.css' );

            wp_enqueue_style( 'responsive',get_template_directory_uri().'/css/responsive.css' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'load_theme_child_styles' );
//load js
if(!function_exists('load_theme_child_js')){
    function load_theme_child_js(){
        if (!is_admin()) {
            $stylesheet_url = get_template_directory_uri().'/js/';
            // wp_enqueue_script( 'jquery','http://code.jquery.com/jquery-1.7.1.js' );


        }
    }
}
add_action( 'wp_enqueue_scripts', 'load_theme_child_js' );


/**
 * Add HTML5 theme_child support.
 */
function wpdocs_after_setup_theme_child() {
    add_theme_child_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme_child', 'wpdocs_after_setup_theme_child' );
add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
    ) );

    // This theme_child allows users to set a custom background.
add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
    'default-color' => 'f5f5f5',
    ) ) );

    // Add support for featured content.
add_theme_support( 'featured-content', array(
    'featured_content_filter' => 'twentyfourteen_get_featured_posts',
    'max_posts' => 6,
    ) );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme_child', 'woocommerce_support' );

//sub string

if(! function_exists(cuttitle))
{
    function cuttitle($text) {

        $huy_text = strip_tags($text);
        $blah = explode(' ', $huy_text);
        if (count($blah) > 1) {
            $k = 1;
            $use_dotdotdot = 1;
        } else {
            $k = count($blah);
            $use_dotdotdot = 0;
        }

        $ihuy = '';
        for ($i=0; $i<$k; $i++) {
            $ihuy .= $blah[$i] . ' ';
        }
        $ihuy .= ($use_dotdotdot) ? '&hellip;' : '';

        return $ihuy;


    }
}

//create _get_op
function theme_child_settings_page(){

    ?>
    <div class="wrap">
        <h1>theme_child Panel</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme_child-options");      
            submit_button(); 
            ?>          
        </form>
    </div>
    <?php


}

function add_theme_child_menu_item()
{
    add_menu_page("theme_child Panel", "theme_child Panel", "manage_options", "theme_child-panel", "theme_child_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_child_menu_item");
function display_twitter_element()
{
    ?>
    <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php

}

function display_facebook_element()
{
    ?>
    <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_theme_child_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme_child-options");
    
    add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme_child-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme_child-options", "section");

    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
}

add_action("admin_init", "display_theme_child_panel_fields");

function  pagination()
{

   if(paginate_links()!='') {?>
   <div class="quatrang">
    <?php
    global $wp_query;
    $big = 999999999;
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'prev_text'    => __('«'),
        'next_text'    => __('»'),
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
        ) );
        ?>

    </div>
    <?php  

}
}
function getPostViews($postID){
   $count_key = 'post_views_count';
   $count = get_post_meta($postID, $count_key, true);
   if($count==''){
       delete_post_meta($postID, $count_key);
       add_post_meta($postID, $count_key, '0');
       return "lượt xem:0";
   }
   return "Lượt xem:".$count;
}
function setPostViews($postID) {
   $count_key = 'post_views_count';
   $count = get_post_meta($postID, $count_key, true);
   if($count==''){
       $count = 0;
       delete_post_meta($postID, $count_key);
       add_post_meta($postID, $count_key, '0');
   }else{
       $count++;
       update_post_meta($postID, $count_key, $count);
   }
}

//breadcrums

function breadcrumbs() {
  
  $delimiter = '<span>&raquo;</span>';
  $name = 'Trang chủ'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
  
  if ( !is_home() || !is_front_page() || is_paged() ) {
  
    echo '<div id="crumbs">';
  
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
  
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      single_cat_title();
    }
  
    echo '</div>';
  
  }
}



/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme_child' hook.
 */


?>






