<?php
/**
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */

header( 'Content-type: text/css;' );
	
$url = dirname( __FILE__ );
$strpos = strpos( $url, 'wp-content' );
$base = substr( $url, 0, $strpos );

require_once( $base .'wp-load.php' );
?>

/********************** Backgrounds **********************/

	<?php		
		$aBackground = array();
		$aBackground['color'] = mfn_opts_get( 'background-body', '#f8f8f8' );
		$aBackground['image'] = mfn_opts_get( 'img-page-bg' ) ? 'url("'. mfn_opts_get( 'img-page-bg' ) .'")' : '' ;
		$aBackground['position'] = mfn_opts_get( 'position-page-bg' );
		$background = implode(' ',$aBackground);
	?>
	
	html { 
		background: <?php echo $background; ?>;
	}
	
	<?php if( mfn_opts_get( 'overlay' ) ): ?>
	body { 
		background-position: center top;
		background-repeat: repeat;
		background-image: url('<?php echo THEME_URI; ?>/images/overlays/<?php mfn_opts_show( 'overlay' ); ?>.png');
	}
	<?php endif; ?>
		
	#Wrapper {
		background-color: <?php mfn_opts_show( 'background-wrapper', '#fff' ) ?>;
	}
	

/********************** Fonts **********************/

 	body, button, input[type="submit"], input[type="reset"], input[type="button"],
	input[type="text"], input[type="password"], input[type="email"], textarea, select {
		font-family: <?php mfn_opts_show( 'font-content', 'Titillium Web' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	#menu > ul > li > a, a.button, input[type="submit"], input[type="reset"], input[type="button"], .ui-tabs .ui-tabs-nav li a, .post .desc .meta {
		font-family: <?php mfn_opts_show( 'font-menu', 'Patua One' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	h1 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Patua One' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 100;
	}
	
	h2 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Patua One' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 100;
	}
	
	h3 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Patua One' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 100;
	}
	
	h4 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Patua One' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	h5 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Patua One' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	h6 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Patua One' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}


/********************** Font sizes **********************/

/* Body */

	body {
		font-size: <?php mfn_opts_show( 'font-size-content', '14' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-content', '14' ) + 7; ?>
		line-height: <?php echo $line_height; ?>px;		
	}
	
/* Headings */
	
	h1 { 
		font-size: <?php mfn_opts_show( 'font-size-h1', '50' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h1', '50' ) + 0; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h2 { 
		font-size: <?php mfn_opts_show( 'font-size-h2', '42' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h2', '42' ) + 0; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h3 {
		font-size: <?php mfn_opts_show( 'font-size-h3', '28' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h3', '28' ) + 2; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h4 {
		font-size: <?php mfn_opts_show( 'font-size-h4', '24' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h4', '24' ) + 3; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h5 {
		font-size: <?php mfn_opts_show( 'font-size-h5', '20' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h5', '20' ) + 2; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h6 {
		font-size: <?php mfn_opts_show( 'font-size-h6', '14' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h6', '14' ) + 4; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
/* Footer */
	#Footer {
	    font-size: 90%;
	    line-height: 122%;
	}
	
/* Grey notes */

	.Recent_comments li span.date, .Latest_posts span.date {
		font-size: 92%;
	    line-height: 130%;
	}	
