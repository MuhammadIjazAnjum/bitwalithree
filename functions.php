<?php

/* 
1.0		CONTANTS
2.0		VERSION COMPATIBILITY
3.0		BITWALI SETUP
4.0		content width
5.0 	Register Widgets Area
6.0		excerpt_more
7.0		javascript detection
8.0 	pingback
9.0		Custom Color
10.0	Enqueue scripts and styles
11.0	content image size attr
12.0	header image tag
13.0 	post thumbnail size attr
14.0	Front page templates

*/
/*3.0	BITWALITHREE SETUP */

function bitwalithree_setup(){
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'bitwalithree-featured-image', 2000, 1200, true );
	add_image_size( 'bitwalithree-thumbnail-avatar', 100, 100, true );
	
	
	register_nav_menus( array(
		'header'    => __( 'Header Menu', 'bitwalithree' ),
		'footer' => __( 'Footer Menu', 'bitwalithree' ),
	) );
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,

	) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				
				'search',
				
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'calendar',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				
				'search',
			),
		),//end of widgets

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
				
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

// 		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Bitwaliethree Theme starter content', 'bitwalithree' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Bitwaliethree Theme starter content', 'bitwalithree' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Bitwaliethree Theme starter content', 'bitwalithree' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

// 		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

// 		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

// 		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "Header" location.
			'header' => array(
				'name' => __( 'Header Menu', 'bitwalithree' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "Footer" location.
			'footer' => array(
				'name' => __( 'Footer Links Menu', 'bitwalithree' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),// nav_menus
	);//end of starter_content array

// 	/**
// 	 * Filters Twenty Seventeen array of starter content.
// 	 *
// 	 * @since Twenty Seventeen 1.1
// 	 *
// 	 * @param array $starter_content Array of starter content.
// 	 */
	
	add_theme_support( 'starter-content', $starter_content );

}//end of function bitwalithree_setup
add_action( 'after_setup_theme', 'bitwalithree_setup' );

// /*	5.0 Register Widgets Area*/
function bitwalithree_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bitwalithree' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'bitwalithree' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'bitwalithree' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'bitwalithree' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'bitwalithree' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'bitwalithree' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bitwalithree_widgets_init' );
// /*6.0	excerpt_more */

// /*7.0	javascript detection */

// /*9.0	Custom Color */

/*10.0	Enqueue scripts and styles */

 /*
 	11.0	content image size attr
 */
 /* 13.0		post thumbnail size attr*/
