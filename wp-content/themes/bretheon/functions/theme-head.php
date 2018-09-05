<?php
/**
 * Header functions.
 *
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */
 

/* ---------------------------------------------------------------------------
 * Meta and title
 * --------------------------------------------------------------------------- */
function mfn_seo() 
{
	if( mfn_opts_get('mfn-seo') ){
		global $post;
		
		// description
		if( is_object($post) && get_the_ID() && get_post_meta( get_the_ID(), 'mfn-meta-seo-description', true ) ){
			echo '<meta name="description" content="'. stripslashes( get_post_meta( get_the_ID(), 'mfn-meta-seo-description', true ) ) .'" />'."\n";
		} elseif( mfn_opts_get('meta-description') ){
			echo '<meta name="description" content="'. stripslashes( mfn_opts_get('meta-description') ) .'" />'."\n";
		}
		
		// keywords
		if( is_object($post) && get_the_ID() && get_post_meta( get_the_ID(), 'mfn-meta-seo-keywords', true ) ){
			echo '<meta name="keywords" content="'. stripslashes( get_post_meta( get_the_ID(), 'mfn-meta-seo-keywords', true ) ) .'" />'."\n";
		} elseif( mfn_opts_get('meta-keywords') ){
			echo '<meta name="keywords" content="'. stripslashes( mfn_opts_get('meta-keywords') ) .'" />'."\n";
		}
		
	}

	// google analytics
	if( mfn_opts_get('google-analytics') ){
		mfn_opts_show('google-analytics');
	}
}
add_action('wp_seo', 'mfn_seo');


/* ---------------------------------------------------------------------------
 * Styles
 * --------------------------------------------------------------------------- */
function mfn_styles() 
{
	// wp_enqueue_style ------------------------------------------------------
	echo '<link rel="stylesheet" href="'. THEME_URI .'/js/fancybox/jquery.fancybox-1.3.4.css?ver='.THEME_VERSION.'" media="all" />'."\n";
	echo '<link rel="stylesheet" href="'. THEME_URI .'/css/responsiveslides.css?ver='.THEME_VERSION.'" media="all" />'."\n";
	echo '<link rel="stylesheet" href="'. THEME_URI .'/css/jcarousel/skin.css?ver='.THEME_VERSION.'" media="all" />'."\n";
	echo '<link rel="stylesheet" href="'. THEME_URI .'/css/ui/jquery.ui.all.css?ver='.THEME_VERSION.'" media="all" />'."\n";

	// Custom Theme Options styles & responsive ------------------------------
	if( mfn_opts_get('responsive') ) echo '<link rel="stylesheet" href="'. THEME_URI .'/css/responsive.css?ver='.THEME_VERSION.'" media="all" />'."\n";
	
	$skin = mfn_opts_get('skin','custom');
	if( $skin == 'custom' ){
		echo '<link rel="stylesheet" href="'. THEME_URI .'/css/skins/blue/images.css?ver='.THEME_VERSION.'" media="all" />'."\n";
		echo '<link rel="stylesheet" href="'. THEME_URI .'/style-colors.php?ver='.THEME_VERSION.'" media="all" />'."\n";
	} else {
		echo '<link rel="stylesheet" href="'. THEME_URI .'/css/skins/'. $skin .'/images.css?ver='.THEME_VERSION.'" media="all" />'."\n";
		echo '<link rel="stylesheet" href="'. THEME_URI .'/css/skins/'. $skin .'/style.css?ver='.THEME_VERSION.'" media="all" />'."\n";
	}
	
	echo '<link rel="stylesheet" href="'. THEME_URI .'/style.php?ver='.THEME_VERSION.'" media="all" />'."\n";
	
	// Google Fonts ----------------------------------------------------------
	$system_fonts = mfn_fonts('system');
	$subset = mfn_opts_get('font-subset');
	if( $subset ){
		$subset = '&amp;subset='. str_replace(' ', '', $subset);
	}
	
	$fonts['content'] = mfn_opts_get('font-content','Titillium Web');
	$fonts['menu'] = mfn_opts_get('font-menu','Titillium Web');
	$fonts['headings'] = mfn_opts_get('font-headings','Titillium Web');
	
	foreach( $fonts as $font ){
		if( ! in_array($font, $system_fonts) ){
			$font_slug = str_replace(' ', '+', $font);
			echo '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family='. $font_slug .':300,400,400italic,700'. $subset .'" >'."\n";
		}
	}
	
	// Custom CSS ------------------------------------------------------------
	if( $custom_css = mfn_opts_get('custom-css') ){
		echo '<style>'."\n";
		echo $custom_css."\n";
		echo '</style>'."\n";
	}
	
}
add_action('wp_styles', 'mfn_styles');


/* ---------------------------------------------------------------------------
 * WooCommerce Styles
* --------------------------------------------------------------------------- */
function mfn_woo_styles()
{
	echo '<link rel="stylesheet" href="'. THEME_URI .'/css/woocommerce.css?ver='.THEME_VERSION.'" media="all" />'."\n";
}
add_action('wp_head', 'mfn_woo_styles');


/* ---------------------------------------------------------------------------
 * IE fix
 * --------------------------------------------------------------------------- */
function mfn_ie_fix() 
{
	if( ! is_admin() )
	{
		echo "\n".'<!--[if lt IE 9]>'."\n";
		echo '<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>'."\n";
		echo '<![endif]-->'."\n";
		
		echo '<!--[if lte IE 8]>'."\n";
		echo '<link rel="stylesheet" href="'. THEME_URI .'/css/ie8.css" />'."\n";
		echo '<![endif]-->'."\n\n";	
		
	}	
}
add_action('wp_head', 'mfn_ie_fix');


/* ---------------------------------------------------------------------------
 * Scripts
 * --------------------------------------------------------------------------- */
function mfn_scripts() 
{
	if( ! is_admin() ) 
	{
		wp_enqueue_script( 'jquery-ui-core', THEME_URI .'/js/ui/jquery.ui.core.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-ui-widget', THEME_URI .'/js/ui/jquery.ui.widget.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-ui-tabs', THEME_URI .'/js/ui/jquery.ui.tabs.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-ui-accordion', THEME_URI .'/js/ui/jquery.ui.accordion.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-fancybox', THEME_URI. '/js/fancybox/jquery.fancybox-1.3.4.js', false, THEME_VERSION, true );
		
		wp_enqueue_script( 'jquery-responsiveslides', THEME_URI. '/js/sliders/responsiveslides.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-jcarousel-min', THEME_URI. '/js/sliders/jquery.jcarousel.min.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-mfn-offer-slider', THEME_URI. '/js/sliders/mfn-offer-slider.js', false, THEME_VERSION, true );
		
		// offer slider config -----------------------------
		mfn_slider_config(); 
		
		wp_enqueue_script( 'jquery-isotope-min', THEME_URI. '/js/jquery.isotope.min.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-hoverdir', THEME_URI. '/js/jquery.hoverdir.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-mfn-menu', THEME_URI. '/js/mfn-menu.js', false, THEME_VERSION, true );
		
		wp_enqueue_script( 'jquery-form', THEME_URI. '/js/jquery.form.js', false, THEME_VERSION, true );
		wp_enqueue_script( 'jquery-scripts', THEME_URI. '/js/scripts.js', false, THEME_VERSION, true );

		if ( is_singular() && get_option( 'thread_comments' ) ) 
		{ 
			wp_enqueue_script( 'comment-reply' ); 
		}
	}
}
add_action('wp_enqueue_scripts', 'mfn_scripts');


/* ---------------------------------------------------------------------------
 * Retina logo
* --------------------------------------------------------------------------- */
function mfn_retina_logo()
{
	$retina_logo = mfn_opts_get('retina-logo-img');
	$retina_logo_width = intval( mfn_opts_get('retina-logo-width') );
	$retina_logo_height = intval( mfn_opts_get('retina-logo-height') );

	if( $retina_logo && $retina_logo_width && $retina_logo_height ){
		echo '<script>'."\n";
		echo '//<![CDATA['."\n";
		echo 'jQuery(document).ready(function(){'."\n";
		echo 'var retina=window.devicePixelRatio>1?true:false;';
		echo 'if(retina){';
		echo 'jQuery("#logo img")';
		echo '.attr("src","'. $retina_logo .'")';
		echo '.attr("width","'. $retina_logo_width .'")';
		echo '.attr("height","'. $retina_logo_height .'");';
		echo '}';
		echo '});'."\n";
		echo '//]]>'."\n";
		echo '</script>'."\n";
	}
}
add_action('wp_head', 'mfn_retina_logo');


/* ---------------------------------------------------------------------------
 * Slider configuration
* --------------------------------------------------------------------------- */
function mfn_slider_config()
{
	$args = array();
	$args['timeout'] = mfn_opts_get('slider-timeout');
	$args['auto'] = mfn_opts_get('slider-auto') ? true : false;
	$args['pause'] = mfn_opts_get('slider-pause') ? true : false;

	echo '<script>'."\n";
	echo '//<![CDATA['."\n";
	echo 'var mfn_slider_args = { "timeout":'. $args['timeout'] .', "auto":'. (int)$args['auto'] .', "pause":'. (int)$args['pause'] .' };'."\n";
	echo '//]]>'."\n";
	echo '</script>'."\n";
}


/* ---------------------------------------------------------------------------
 * Adds classes to the array of body classes.
 * --------------------------------------------------------------------------- */
function mfn_sidebar_classes( $postID = false )
{
	global $post;
	$classes = false;
	
	if( is_object($post) ){
		
		if( intval( $postID ) ){
			// do nothing, use $postID
		} elseif( is_tax() ){
			// taxonomy-portfolio-types.php
			$postID = mfn_opts_get( 'portfolio-page' );
		} elseif( get_post_type()=='post' && ! is_singular() ){
			// index.php
			$postID = get_option( 'page_for_posts' );
		} else {
			$postID = get_the_ID();
		}
		
		switch ( get_post_meta( $postID, 'mfn-post-layout', true) ) {
		case 'left-sidebar':
			$classes = ' with_aside aside_left';
			break;
		case 'right-sidebar':
			$classes = ' with_aside aside_right';
			break;
		}
	}

	return $classes;
}

function mfn_body_classes( $classes )
{
	// template-slider
	if( ! is_404() && get_post_type()=='page' && get_post_meta( get_the_ID(), 'mfn-post-slider', true ) ){
		$classes[] = 'template-slider'; 
	}
	
	// sidebar classes
	$classes[] = mfn_sidebar_classes();
	
	// layout
	$classes[] = 'layout-'. mfn_opts_get('layout','boxed');
	$classes[] = 'footer-'. mfn_opts_get('footer-layout','separate');
	
	return $classes;
}
add_filter( 'body_class', 'mfn_body_classes' );


/* ---------------------------------------------------------------------------
 * Annoying styles remover
 * --------------------------------------------------------------------------- */
function mfn_remove_recent_comments_style() {  
    global $wp_widget_factory;  
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
}  
add_action( 'widgets_init', 'mfn_remove_recent_comments_style' ); 

?>