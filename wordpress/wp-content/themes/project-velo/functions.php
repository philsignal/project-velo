<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function twentytwentytwo_support() {

        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style.css' );
    }
endif;
add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :
    /**
     * Enqueue styles.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function twentytwentytwo_styles() {
        // Register theme stylesheet.
        $theme_version = wp_get_theme()->get( 'Version' );

        $version_string = is_string( $theme_version ) ? $theme_version : false;
        wp_register_style(
            'twentytwentytwo-style',
            get_template_directory_uri() . '/style.css',
            array(),
            $version_string
        );

        // Enqueue theme stylesheet.
        wp_enqueue_style( 'twentytwentytwo-style' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

//  Adding custom blocks here for ACF
//    NOTE: "Since ACF 6.0, We recommend you register blocks with the new block.json syntax syntax rather than the legacy acf_register_block_type() detailed here."
//    https://www.advancedcustomfields.com/resources/acf_register_block_type/

// Enqueue ACF block script.
// Commented out as acf-block-script.js doesn't exist (in /wp-admin -> view console log)
function enqueue_acf_block_script() {
    wp_enqueue_script(
        'acf-block-script',
        get_stylesheet_directory_uri() . '/js/acf-block-script.js',
        array('wp-blocks', 'wp-editor', 'wp-components', 'wp-i18n', 'acf-blocks'),
        time(),
        true
    );
}
add_action('enqueue_block_editor_assets', 'enqueue_acf_block_script');

// Register ACF block.
function register_acf_block_types() {
    // Change 'acf/block-name' to your block name.
    acf_register_block_type(array(
        'name'            => 'acf/carousel',
        'title'           => __('ACF Carousel'),
        'description'     => __('A custom Carousel ACF block.'),
//        'render_callback' => 'render_acf_block',
        'render_template' => plugin_dir_path( __FILE__ ) . 'templates/blocks/block-carousel.php',
        'category'        => 'common',
        'icon'            => 'admin-comments',
        // to review PL 08/04/24
        'keywords'        => array('acf', 'block', 'carousel'),
        'post_types' => array('page'),
        'align_content' => 'center',
    ));
}
add_action('acf/init', 'register_acf_block_types');

// Render ACF block via callback function
// commented out as now using 'render_template' to call template block in acf_register_block_type()
//function render_acf_block($block, $content = '', $is_preview = false) {
//    // Change 'acf/block-name' to your block name.
//    $block_slug = str_replace('acf/', '', $block['name']);
//
//    // Load the block template.
//    include get_stylesheet_directory() . "/templates/blocks/block-{$block_slug}.php";
//
//}

// Add ACF block categories.
function add_acf_block_categories($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'acf',
                'title' => __('ACF Blocks', 'acf'),
                'icon'  => 'wordpress',
            ),
        )
    );
}
add_filter('block_categories', 'add_acf_block_categories', 10, 2);


// Add index.js
/* commented out index.js, main.js as:
 1) main.js causing exception: "Uncaught SyntaxError: Cannot use import statement outside a module (at main.js:1:1)"
 2) index.js, main.js are wrapped in bundle.js
*/
wp_enqueue_script( 'index-js', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
wp_enqueue_script( 'main-bundle-js', get_stylesheet_directory_uri()  . '/assets/dist/bundle.js',  array(), null, true );

function velo_enqueue_styles()
{
    wp_enqueue_style( 'velo-style', get_stylesheet_directory_uri() . '/assets/dist/bundle.css' );
}
add_action( 'wp_enqueue_scripts', 'velo_enqueue_styles' );


// Custom image sizes
// helps to optimise page load speed (if uploaded image is over specified dimensions), trade off is an increase in disk space overtime
function define_image_sizes(){

    // Custom theme support
    add_theme_support( 'post-thumbnails' );

    // carousel slider
    add_image_size('carousel-slider', 1600, 840, true);
    add_image_size('carousel-slider-mobile', 1000, 600, true);
}
add_action('after_setup_theme', 'define_image_sizes');

