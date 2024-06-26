<?php

/*
  =============================================================
  1.0 - Theme Support
  =============================================================
 */
  add_action('after_setup_theme', 'theme_setup');

  function theme_setup() {
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'script', 'style'));
    add_theme_support('post-thumbnails'); 
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support( 'woocommerce');
    add_post_type_support('page', 'excerpt'); 
    add_theme_support('wc-product-gallery-lightbox'); 
    add_theme_support('wc-product-gallery-slider'); 
  }


/*
  =============================================================
  2.0 - Register Menu
  =============================================================
 */

function register_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Headermeny'),
            'product-menu' => __('Product Menu'),
            // 'mobile-menu' => __('Mobile Menu'),
            'footer-menu_1' => __('Footer menu 1'),
            'footer-menu_2' => __('Footer menu 2'),
        )
    );
}
add_action('init', 'register_menus');


/*
  =============================================================
  3.0 - Scripts styles enqueue
  =============================================================
 */

  function theme_enqueue_scripts() {
    // Styles

     wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.0.0', 'all');

    wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/theme-styles.css', '', filemtime(get_stylesheet_directory() . '/css/theme-styles.css'));

    // Scripts
    wp_enqueue_script('bootstrap-script', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true);    
    wp_enqueue_script('object-fit', get_stylesheet_directory_uri() . '/js/ofi.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('app-script', get_stylesheet_directory_uri() . '/js/app.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/app.js'), true);
    wp_localize_script( 'app-script', 'adminajax', array(
      'ajax_url' => admin_url( 'admin-ajax.php' ),
    ));

  }

  add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
  

// Defer javascript files
add_filter( 'script_loader_tag', 'async_scripts', 10, 3 );
function async_scripts( $tag, $handle, $src ) {
    // The handles of the enqueued scripts we want to defer
    $defer_scripts = array(
        'bootstrap-script',
        'object-fit',
        'slick-js',
        'app-script',
        // 'magnify-script'
    );
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer"></script>' . "\n";
    }
    return $tag;
}

// Preload styles
add_filter( 'style_loader_tag', 'async_styles', 10, 4 );

function async_styles( $tag, $handle, $href, $media ) {
    // The handles of the enqueued styles we want to preload
    $defer_scripts = array(
        'slick-css',
        'theme-style',
    );
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<link rel="preload stylesheet" href="' . $href . '" as="style" type="text/css">' . "\n";
    }
    return $tag;
}



//Add support for SVG images
  define('ALLOW_UNFILTERED_UPLOADS', true);
  add_action('upload_mimes', 'add_file_types_to_uploads');
  function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
  }
  

/*
  =============================================================
  4.0 - acf theme options
  =============================================================
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Site Innstillinger',
        'menu_title' => 'Site Innstillinger',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Logoer',
        'menu_title' => 'Logoer',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Headertekst',
        'menu_title' => 'Headertekst',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'SOME',
        'menu_title' => 'SOME',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'USPer',
        'menu_title' => 'USPer',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Footerinfo',
        'menu_title' => 'Footerinfo',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Fraktgrense',
        'menu_title' => 'Fraktgrense',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Product pop-ups',
        'menu_title' => 'Product pop-ups',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Produkt kan ikke kjøpes',
        'menu_title' => 'Produkt kan ikke kjøpes',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Mobilnavigasjon',
        'menu_title' => 'Mobilnavigasjon',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));                
    acf_add_options_sub_page(array(
        'page_title' => '404',
        'menu_title' => '404',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ));
}

/*
  =============================================================
  5.0 - misc
  =============================================================
 */


add_action( 'init', 'create_custom_posts' );
function create_custom_posts() {


}


