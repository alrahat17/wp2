<?php
/**
 * Theme functions.
 *
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Theme support
 * --------------------------------------------------------------------------- */
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support('automatic-feed-links');
	add_theme_support('woocommerce');
//	add_editor_style( '/css/style-editor.css' );
}


/*-----------------------------------------------------------------------------------*/
/* Post Thumbnails
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) {
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 260, 146, false ); // admin - featured image
	add_image_size( '50x50', 50, 50, false ); // admin - lists
	
	add_image_size( 'offer-slider', 480, 340, true ); // slider offer
	
	add_image_size( 'portfolio-item', 380, 253, true ); // portfolio - content builder
	add_image_size( 'portfolio-list', 480, 320, true ); // portfolio - list
	add_image_size( 'portfolio-single', 954, 440, true ); // portfolio - single
	
	add_image_size( 'blog', 960, 390, true ); // blog
	add_image_size( 'blog-widget', 50, 40, true ); // blog - widget
	
	add_image_size( 'offer-item', 209, 115, true ); // offer item - slider
	add_image_size( 'offer-list', 380, 285, true ); // offer item - list
	
	add_image_size( '190x110', 190, 110, false ); // clients
}


/* ---------------------------------------------------------------------------
 * Excerpt
* --------------------------------------------------------------------------- */
function mfn_excerpt($post, $length = 180, $tags_to_keep = '<a><em><strong>', $extra = '') {
		
	if(is_int($post)) {
		$post = get_post($post);
	} elseif(!is_object($post)) {
		return false;
	}

	if(has_excerpt($post->ID)) {
		$the_excerpt = $post->post_excerpt;
		return apply_filters('the_content', $the_excerpt);
	} else {
		$the_excerpt = $post->post_content;
	}
	
	$the_excerpt = strip_shortcodes(strip_tags($the_excerpt, $tags_to_keep));
	$the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
	$excerpt_waste = array_pop($the_excerpt);
	$the_excerpt = implode($the_excerpt);
	$the_excerpt .= $extra;
	
	return apply_filters('the_content', $the_excerpt);
}


/* ---------------------------------------------------------------------------
 * Excerpt length
 * --------------------------------------------------------------------------- */
function mfn_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'mfn_excerpt_length', 999 );


/* ---------------------------------------------------------------------------
 * Pagination for Blog and Portfolio
 * --------------------------------------------------------------------------- */
function mfn_pagination()
{
	global $paged, $wp_query;
	
	$translate['next'] = mfn_opts_get('translate') ? mfn_opts_get('translate-next','Next page &rsaquo;') : __('Next page &rsaquo;','bretheon');
	$translate['prev'] = mfn_opts_get('translate') ? mfn_opts_get('translate-prev','&lsaquo; Prev page') : __('&lsaquo; Prev page','bretheon');
	
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
	
	if( empty( $paged ) ) $paged = 1;
	$prev = $paged - 1;							
	$next = $paged + 1;
	
	$end_size = 1;
	$mid_size = 2;
	$show_all = mfn_opts_get('pagination-show-all');
	$dots = false;	

	if( ! $total = $wp_query->max_num_pages ) $total = 1;
	
	if( $total > 1 )
	{
		echo '<div class="pager">';
		echo '<center>';
		
		if( $paged >1 ){
			echo '<a class="prev_page" href="'. previous_posts(false) .'">'. $translate['prev'] .'</a>';
		}

		for( $i=1; $i <= $total; $i++ ){
			if ( $i == $current ){
				echo '<a href="'. get_pagenum_link($i) .'" class="page active">'. $i .'</a>&nbsp;';
				$dots = true;
			} else {
				if ( $show_all || ( $i <= $end_size || ( $current && $i >= $current - $mid_size && $i <= $current + $mid_size ) || $i > $total - $end_size ) ){
					echo '<a href="'. get_pagenum_link($i) .'" class="page">'. $i .'</a>&nbsp;';
					$dots = true;
				} elseif ( $dots && ! $show_all ) {
					echo '<span class="page">...</span>&nbsp;';
					$dots = false;
				}
			}
		}
		
		if( $paged < $total ){
			echo '<a class="next_page" href="'. next_posts(0,false) .'">'. $translate['next'] .'</a>';
		}

		echo '</center>';
		echo '</div>'."\n";
	}
}


/* ---------------------------------------------------------------------------
 * No sidebar message for themes with sidebar 
 * --------------------------------------------------------------------------- */
function mfn_nosidebar()
{
	echo 'This template supports the sidebar\'s widgets. <a href="'. home_url() .'/wp-admin/widgets.php">Add one</a> or use Full Width layout.';	
}


/* ---------------------------------------------------------------------------
 * New Walker Category for categories menu
 * --------------------------------------------------------------------------- */
class New_Walker_Category extends Walker_Category {
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		extract($args);

		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		
		$link = '<a href="' . esc_attr( get_term_link($category) ) . '" ';
		if ( $use_desc_for_title == 0 || empty($category->description) )
			$link .= 'title="' . esc_attr( sprintf(__('View all posts filed under %s','bretheon'), $cat_name) ) . '"';
		else
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		$link .= '>';
		$link .= $cat_name;

		if ( !empty($show_count) )
			$link .= ' <span>(' . intval($category->count) . ')</span>';
			
		$link .= '</a>';

		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'cat-item cat-item-' . $category->term_id;
			if ( !empty($current_category) ) {
				$_current_category = get_term( $current_category, $category->taxonomy );
				if ( $category->term_id == $current_category )
					$class .=  ' current-cat';
				elseif ( $category->term_id == $_current_category->parent )
					$class .=  ' current-cat-parent';
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link\n";
		}
	}
}


/* ---------------------------------------------------------------------------
 * Current page URL
 * --------------------------------------------------------------------------- */
function curPageURL() {
	$pageURL = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


/* ---------------------------------------------------------------------------
 * Breadcrumbs
 * --------------------------------------------------------------------------- */
function mfn_breadcrumbs() {

	global $post;
	$homeLink = home_url();
	
	$translate['home'] = mfn_opts_get('translate') ? mfn_opts_get('translate-home','Home') : __('Home','bretheon');
	$translate['you-are-here'] = mfn_opts_get('translate') ? mfn_opts_get('translate-you-are-here','You are here:') : __('You are here:','bretheon');

	echo '<ul class="breadcrumbs">';
	echo '<li>'. $translate['you-are-here'] .'</li>';
	echo '<li><a href="'. $homeLink .'">'. $translate['home'] .'</a> <span><i class="icon-angle-right"></i></span></li>';

	// Blog Category
	if ( is_category() ) {
		echo '<li><a href="'. curPageURL() .'">' . __('Archive by category','bretheon').' "' . single_cat_title('', false) . '"</a></li>';

	// Blog Day
	} elseif ( is_day() ) {
		echo '<li><a href="'. get_year_link(get_the_time('Y')) . '">'. get_the_time('Y') .'</a> <span><i class="icon-angle-right"></i></span></li>';
		echo '<li><a href="'. get_month_link(get_the_time('Y'),get_the_time('m')) .'">'. get_the_time('F') .'</a> <span><i class="icon-angle-right"></i></span></li>';
		echo '<li><a href="'. curPageURL() .'">'. get_the_time('d') .'</a></li>';

	// Blog Month
	} elseif ( is_month() ) {
		echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <span><i class="icon-angle-right"></i></span></li>';
		echo '<li><a href="'. curPageURL() .'">'. get_the_time('F') .'</a></li>';

	// Blog Year
	} elseif ( is_year() ) {
		echo '<li><a href="'. curPageURL() .'">'. get_the_time('Y') .'</a></li>';

	// Single Post
	} elseif ( is_single() && !is_attachment() ) {
		
		// Custom post type
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			
			if( $slug['slug'] == mfn_opts_get('portfolio-slug','portfolio-item') && $portfolio_page_id = mfn_opts_get('portfolio-page') )
			{
				echo '<li><a href="' . get_page_link( $portfolio_page_id ) . '">'. get_the_title( $portfolio_page_id ) .'</a> <span><i class="icon-angle-right"></i></span></li>';
			} else {
				echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> <span><i class="icon-angle-right"></i></span></li>';
			}
			echo '<li><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';
			
		// Blog post	
		} else {
			$cat = get_the_category(); 
			$cat = $cat[0];
			echo '<li>';
				echo get_category_parents($cat, TRUE, ' <span><i class="icon-angle-right"></i></span>');
			echo '</li>';
			echo '<li><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';
		}

	// Taxonomy
	} elseif( get_post_taxonomies() ) {
		
		$post_type = get_post_type_object(get_post_type());
		if( $post_type->name == 'portfolio' && $portfolio_page_id = mfn_opts_get('portfolio-page') ) {
			echo '<li><a href="' . get_page_link( $portfolio_page_id ) . '">'. get_the_title( $portfolio_page_id ) .'</a> <span><i class="icon-angle-right"></i></span></li>';
		}

		echo '<li><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';

	// Page with parent
	} elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> <span><i class="icon-angle-right"></i></span></li>';
			$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $crumb) echo $crumb;
		
		echo '<li><a href="' . curPageURL() . '">'. get_the_title() .'</a></li>';

	// Default
	} else {
		echo '<li><a href="' . curPageURL() . '">'. get_the_title() .'</a></li>';
	}

	echo '</ul>';
}


/* ---------------------------------------------------------------------------
 * Posts per page & pagination fix
 * --------------------------------------------------------------------------- */
function mfn_option_posts_per_page( $value ) {
	if ( is_tax( 'portfolio-types' ) ) {
        $posts_per_page = mfn_opts_get( 'portfolio-posts', 6, true );
    } else {
        $posts_per_page = mfn_opts_get( 'blog-posts', 5, true );
    }
    return $posts_per_page;
}

function mfn_posts_per_page() {
    add_filter( 'option_posts_per_page', 'mfn_option_posts_per_page' ); 
}
add_action( 'init', 'mfn_posts_per_page', 0 );


/* ---------------------------------------------------------------------------
 *	Set Max Content Width
 * --------------------------------------------------------------------------- */
if ( ! isset( $content_width ) ) $content_width = 950;


/* ---------------------------------------------------------------------------
 *	WPML - Date Format
 * --------------------------------------------------------------------------- */
function translate_date_format($format) {
	if (function_exists('icl_translate'))
		$format = icl_translate('Formats', $format, $format);
	return $format;
}
add_filter('option_date_format', 'translate_date_format');


/* ---------------------------------------------------------------------------
 *	WooCommerce - Display 24 products per page
* --------------------------------------------------------------------------- */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 8;' ), 20 );


/* ---------------------------------------------------------------------------
 *	TGM Plugin Activation
 * --------------------------------------------------------------------------- */
add_action( 'tgmpa_register', 'mfn_register_required_plugins' );
if( ! function_exists( 'mfn_register_required_plugins' ) )
{
	function mfn_register_required_plugins() {
	
		$plugins = array(
				
			// required -----------------------------	
			
			array(	
				'name'               	=> 'Slider Revolution', // The plugin name.
				'slug'               	=> 'revslider', // The plugin slug (typically the folder name).
				'source'             	=> THEME_DIR .'/plugins/revslider.zip', // The plugin source.
				'required'           	=> true, // If false, the plugin is only 'recommended' instead of required.
				'version'            	=> '5.2.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			),
	
		);
	
		$config = array(

			'id'           	=> 'mfn-be',        		// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' 	=> '',                      // Default absolute path to bundled plugins.
			'menu'         	=> 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  	=> 'themes.php',            // Parent menu slug.
			'capability'   	=> 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  	=> true,                    // Show admin notices or not.
			'dismissable'  	=> true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  	=> '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic'	=> false,                   // Automatically activate plugins after installation or not.
			'message' 		=> '',						// Message to output right before the plugins table
			'strings'      	=> array(
				'page_title'                      	=> __( 'Install Required Plugins', 'tgmpa' ),
				'menu_title'                     	=> __( 'Install Plugins', 'tgmpa' ),
				'installing'                      	=> __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
				'oops'                            	=> __( 'Something went wrong with the plugin API.', 'tgmpa' ),
				'notice_can_install_required'     	=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ),
				'notice_can_install_recommended'  	=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ),
				'notice_cannot_install'           	=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ),
				'notice_can_activate_required'    	=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ),
				'notice_can_activate_recommended' 	=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ),
				'notice_cannot_activate'          	=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ),
				'notice_ask_to_update'            	=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ),
				'notice_cannot_update'            	=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ),
				'install_link'                    	=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
				'activate_link'                   	=> _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
				'return'                          	=> __( 'Return to Required Plugins Installer', 'tgmpa' ),
				'plugin_activated'                	=> __( 'Plugin activated successfully.', 'tgmpa' ),
				'complete'                        	=> __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
				'nag_type'                        	=> 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			),
				
		);
	
		tgmpa( $plugins, $config );
	}
}

?>