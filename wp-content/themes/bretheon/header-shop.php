<?php
/**
 * The Header for our theme.
 *
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<!-- head -->
<head>

<!-- meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<?php if( mfn_opts_get('responsive') ) echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'; ?>

<title><?php
global $post;
if( mfn_opts_get('mfn-seo') && is_object($post) && get_post_meta( get_the_ID(), 'mfn-meta-seo-title', true ) ){
	echo stripslashes( get_post_meta( get_the_ID(), 'mfn-meta-seo-title', true ) );
} else {
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'bretheon' ), max( $paged, $page ) );
}
?></title>

<!-- stylesheet -->
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="all" />
<?php do_action('wp_styles'); ?>

<!-- wp_head() -->
<link rel="shortcut icon" href="<?php mfn_opts_show('favicon-img',THEME_URI .'/images/favicon.ico'); ?>" type="image/x-icon" />	

<?php do_action('wp_seo'); ?>

<?php wp_head();?>
</head>

<!-- body -->
<body <?php body_class( 'with_aside aside_right' ); ?>>	
	<div id="Wrapper">
	
		<?php get_template_part( 'includes/header', 'top-area' ); ?>
	
		<div id="Subheader">
			<div class="container">
				<div class="sixteen columns">
					<h1><?php woocommerce_page_title(); ?></h1>
					<?php 
						function mfn_woocommerce_breadcrumb( $args = array() ) {
							$defaults = apply_filters( 'woocommerce_breadcrumb_defaults', array(
								'delimiter'   => '<li><span style="padding-left:0;"><i class="icon-angle-right"></i></span></li>',
								'wrap_before' => '<ul class="breadcrumbs woocommerce-breadcrumb">',
								'wrap_after'  => '</ul>',
								'before'      => '<li>',
								'after'       => '</li>',
								'home'        => mfn_opts_get('translate') ? mfn_opts_get('translate-home','Home') : __('Home','bretheon'),
							) );
							$args = wp_parse_args( $args, $defaults );
							woocommerce_get_template( 'shop/breadcrumb.php', $args );
						}
						mfn_woocommerce_breadcrumb(); 
						remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
					?>
				</div>
			</div>
		</div>