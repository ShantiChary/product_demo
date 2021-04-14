<?php
/**
 * product_demo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package product_demo
 */

if ( ! function_exists( 'product_demo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function product_demo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on product_demo, use a find and replace
		 * to change 'product_demo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'product_demo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'product_demo' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'product_demo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'product_demo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function product_demo_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'product_demo_content_width', 640 );
}
add_action( 'after_setup_theme', 'product_demo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function product_demo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'product_demo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'product_demo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'product_demo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function product_demo_scripts() {
	wp_enqueue_style( 'product_demo-style', get_stylesheet_uri() );

	wp_enqueue_script( 'product_demo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'product_demo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'product_demo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*==========================================================================================================*/
/* WYSIWYG EDITOR CUSTOMIZATION */
// function remove_h1_from_heading($args) {
// 	// Omit h1 from the list in Paragraph drop-down
	// $args['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Pre=pre';
	// return $args;
	// }
	// add_filter('tiny_mce_before_init', 'remove_h1_from_heading' );
/*==========================================================================================================*/

/**
 * Removes buttons from the first row of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons
 * @return   array                The updated array of buttons that exludes some items
 */
// add_filter( 'mce_buttons', 'jivedig_remove_tiny_mce_buttons_from_editor');
// function jivedig_remove_tiny_mce_buttons_from_editor( $buttons ) {
//     $remove_buttons = array(
//         'bold',
//         'italic',
//         'strikethrough',
//         'bullist',
//         'numlist',
//         'blockquote',
//         'hr', // horizontal line
//         'alignleft',
//         'aligncenter',
//         'alignright',
//         'link',
//         'unlink',
//         'wp_more', // read more link
//         'spellchecker',
//         'dfw', // distraction free writing mode
//         'wp_adv', // kitchen sink toggle (if removed, kitchen sink will always display)
//     );
//     foreach ( $buttons as $button_key => $button_value ) {
//         if ( in_array( $button_value, $remove_buttons ) ) {
//             unset( $buttons[ $button_key ] );
//         }
//     }
//     return $buttons;
// }



/*
 * Removes buttons from the second row (kitchen sink) of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons in the kitchen sink
 * @return   array                The updated array of buttons that exludes some items
 */
// add_filter( 'mce_buttons_2', 'jivedig_remove_tiny_mce_buttons_from_kitchen_sink');
// function jivedig_remove_tiny_mce_buttons_from_kitchen_sink( $buttons ) {
//     $remove_buttons = array(
//         'formatselect', // format dropdown menu for <p>, headings, etc
//         'underline',
//         'alignjustify',
//         'forecolor', // text color
//         'pastetext', // paste as text
//         'removeformat', // clear formatting
//         'charmap', // special characters
//         'outdent',
//         'indent',
//         'undo',
// 		'redo',
// 		'strikethrough',
// 		'hr',				
//         'wp_help', // keyboard shortcuts
//     );
//     foreach ( $buttons as $button_key => $button_value ) {
//         if ( in_array( $button_value, $remove_buttons ) ) {
//             unset( $buttons[ $button_key ] );
//         }
//     }
//     return $buttons;
// }


/*==========================================================================================================*/
/*ADD SUPERSCRIPT, FONT SELECT, FONT SIZE... */
//* Enable hidden buttons to third row of post editor
// function my_custom_mce_buttons_3( $buttons ) {	
// 	/**
// 	 * Enable core button(s) that are disabled by default
// 	 */

// 	$buttons[] = 'fontselect';
// 	$buttons[] = 'fontsizeselect';
// 	$buttons[] = 'wp_page';
// 	$buttons[] = 'superscript';
// 	$buttons[] = 'subscript';
// 	$buttons[] = 'underline';

// 	return $buttons;
// }
// add_filter( 'mce_buttons_3', 'my_custom_mce_buttons_3' );



/*==========================================================================================================*/
//ACF Editor customization
function product_demo_toolbars( $toolbars )
{
	// Uncomment to view format of $toolbars
	/*
	echo '< pre >';
		print_r($toolbars);
	echo '< /pre >';
	die;
         * 
         * 
      < preArray ( 
         * [Full] => Array ( 
         * [1] => Array ( [0] => bold [1] => italic [2] => strikethrough [3] => bullist [4] => numlist [5] => blockquote [6] => hr [7] => alignleft [8] => aligncenter [9] => alignright [10] => link [11] => unlink [12] => wp_more [13] => spellchecker [14] => fullscreen [15] => wp_adv ) 
         * [2] => Array ( [0] => formatselect [1] => underline [2] => alignjustify [3] => forecolor [4] => pastetext [5] => removeformat [6] => charmap [7] => outdent [8] => indent [9] => undo [10] => redo [11] => wp_help [12] => code ) 
         * [3] => Array ( ) 
         * [4] => Array ( )
         *  ) 
         * [Basic] => Array ( 
         * [1] => Array ( [0] => bold [1] => italic [2] => underline [3] => blockquote [4] => strikethrough [5] => bullist [6] => numlist [7] => alignleft [8] => aligncenter [9] => alignright [10] => undo [11] => redo [12] => link [13] => unlink [14] => fullscreen )
         *  )
         *  ) 
	*/

    // Add a NEW toolbar called "Extremely Basic"
	// - this toolbar has only 1 row of buttons
	// $toolbars['Extremely Basic' ] = array();
	// $toolbars['Extremely Basic' ][1] = array('fullscreen');
    
	// Add a NEW toolbar called "Very Basic"
	// - this toolbar has only 1 row of buttons
	// $toolbars['Very Basic' ] = array();
	// $toolbars['Very Basic' ][1] = array('bold' , 'italic' , 'underline', 'fullscreen' );

                
        
	// Add a NEW toolbar called "Custom"
	// - this toolbar has only 1 row of buttons
	// $toolbars['Custom' ] = array();
	// $toolbars['Custom' ][1] = array('pastetext' ,'bold' , 'italic' , 'underline', 'formatselect', 'blockquote', 'link', 'unlink', 'removeformat' );     

        
        
	// Edit the "Full" toolbar and remove 'underline' from the 2nd row
	// if( ($key = array_search('underline' , $toolbars['Full' ][2])) !== false )
	// {
	//     unset( $toolbars['Full' ][2][$key] );
	// }

        
    // Edit the "Full" toolbar and remove 'alignleft' from the 1st row
    // if( ($key = array_search('alignleft' , $toolbars['Full' ][1])) !== false )
	// {
	//     unset( $toolbars['Full' ][1][$key] );
	// }
         
        
        
    // Edit the "Full" toolbar and add 'fontsizeselect' if not already present.
    // if (($key = array_search('fontsizeselect' , $toolbars['Full'][2])) !== true) {
    //     array_unshift($toolbars['Full'][2], 'fontsizeselect');
    // }

        
	// remove the 'Basic' toolbar completely
	// unset( $toolbars['Basic' ] );

       
	// return $toolbars - IMPORTANT!
	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'product_demo_toolbars'  );

/*=========================================================================================*/


