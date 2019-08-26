<?php

if ( ! function_exists( 'tsumugi_fonts_url' ) ) :
    /**
     * Register Google fonts for tsumugi.
     *
     * Create your own tsumugi_fonts_url() function to override in a child theme.
     */
    function tsumugi_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        /* translators: If there are characters in your language that are not supported by M PLUS 1p, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'M PLUS 1p font: on or off', 'tsumugi' ) ) {
            $fonts[] = 'M+PLUS+1p:300';
        }
        /* translators: If there are characters in your language that are not supported by M PLUS Rounded 1c, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'M PLUS Rounded 1c font: on or off', 'tsumugi' ) ) {
            $fonts[] = 'M+PLUS+Rounded+1c:500';
        }
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => implode( '|', $fonts ),
            ), 'https://fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
    endif;

function etsumugi_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'tsumugi' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<div class="col-md-6"><section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section></div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar2', 'tsumugi' ),
        'id'            => 'sidebar-2',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget-top %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-top-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'etsumugi_widgets_init' );

function etsumugi_setup() {
    add_theme_support( 'custom-header', apply_filters( 'tsumugi_custom_header_args', array(
		'default-image'          => get_stylesheet_directory_uri() . '/img/header.jpg',
		'default-text-color'     => '000000',
		'width'                  => 1200,
		'height'                 => 400,
		'flex-height'            => true,
		'wp-head-callback'       => 'tsumugi_header_style',
		'video' => true,
	) ) );
	remove_action('after_setup_theme', 'tsumugi_custom_header_setup');
    remove_action('widgets_init', 'tsumugi_widgets_init');
}
add_action('after_setup_theme', 'etsumugi_setup');

add_editor_style( array( tsumugi_fonts_url(), get_template_directory_uri() . '/editor-style.css'  ) );