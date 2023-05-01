<?php
/**
 * Hibret Bank
 */

/**

*********************/
// Adding WP 3+ Functions & Theme Support
function hibretbank_theme_support() {
	register_nav_menus(
		array(
			'primary' => __( 'The Main Menu', 'hibretbank' ),   // main nav in header
            'quicklinks' => __( 'Quick Links', 'hibretbank' ), //  nav in footer
            'usefulLink' => __( 'USEFUL LINK', 'hibretbank' ), 
		)
	);
} /* end travel_notes theme support */

function hibretbank_theme_setup() {

  // launching this stuff after theme setup
  hibretbank_theme_support();
} 

// let's get this party started
add_action( 'after_setup_theme', 'hibretbank_theme_setup' );

function hibretbank_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
'unlink-homepage-logo' => true, 
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'hibretbank_custom_logo_setup' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


function wpse156165_menu_add_class( $atts, $item, $args ) {
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

function hibretbank_widgets_init() {
	
    $sidebars = array(
		'sidebar'   => array(
            'name'        => __( 'Sidebar', 'hibretbank' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'hibretbank' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'hibretbank' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'hibretbank' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s pt-30">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="popular-title pt-20">',
    		'after_title'   => '</h4>',
    	) );
    }
    
}


function my_shortcode_function( $atts ) {
    // Extract shortcode attributes
    extract( shortcode_atts( array(
        'param1' => 'default_value1',
        'param2' => 'default_value2',
        'param3' => 'default_value3'
    ), $atts ) );

    // Your shortcode logic here
    $output = '<div class="my-shortcode">';
    $output .= '<h2>' . $param1 . '</h2>';
    $output .= '<p>' . $param2 . '</p>';
    $output .= '<a href="' . $param3 . '">Learn More</a>';
    $output .= '</div>';

    // Return the shortcode output
    return $output;
}
add_shortcode( 'my_shortcode', 'my_shortcode_function' );




add_action( 'widgets_init', 'hibretbank_widgets_init' );


if( ! function_exists( 'hibretbank_footer_top' ) ) :
/**
 * Footer Top
*/
function hibretbank_footer_top(){    
    if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' )){
    ?>
      <div class="container">
            <div class="row">
			<?php if( is_active_sidebar( 'footer-one' ) ){ ?>
				<div class="col-lg-6 col-md-6 col-sm-6">
				   <?php dynamic_sidebar( 'footer-one' ); ?>	
				</div>
            <?php } ?>
			<?php if( is_active_sidebar( 'footer-two' ) ){ ?>
				<div class="col-lg-6 col-md-6 col-sm-6">
				   <?php dynamic_sidebar( 'footer-two' ); ?>	
				</div>
            <?php } ?>
		</div>
	</div>
    <?php 
    }   
}
endif;
add_action( 'hibretbank_footer', 'hibretbank_footer_top', 30 );

function custom_posts_per_page( $query ) {

if ( $query->is_archive('packages') ) {
    set_query_var('posts_per_page', 20);
}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

add_theme_support('post-thumbnails');

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});

function my_change_posts_order( $query ){
    if ( ! is_admin() && ( is_category( 'management' ) || is_tag() ) && $query->is_main_query() ) {
        $query->set( 'order', 'DESC' );
    }
};

add_action( 'pre_get_posts', 'my_change_posts_order'); 

add_theme_support( 'title-tag' );


function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

?>