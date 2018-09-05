<?php
/**
 * The template used for displaying page content in page.php and Page Templates
 *
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */
?>

<?php
	// Content Builder & WordPress Editor Content
	mfn_builder_print( get_the_ID() );
?>