<?php
/**
 * Theme Options - fields and args
 *
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */

require_once( dirname( __FILE__ ) . '/fonts.php' );
require_once( dirname( __FILE__ ) . '/options.php' );


/**
 * Options Page fields and args
 */
function mfn_opts_setup(){
	
	// Navigation elements
	$menu = array(	
	
		// General --------------------------------------------
		'general' => array(
			'title' => __('Getting started', 'mfn-opts'),
			'icon' => MFN_OPTIONS_URI. 'img/icons/general.png',
			'sections' => array( 'general', 'sidebars', 'blog', 'portfolio', 'slider', 'advanced' ),
		),
		
		// Layout --------------------------------------------
		'elements' => array(
			'title' => __('Layout', 'mfn-opts'),
			'icon' => MFN_OPTIONS_URI. 'img/icons/elements.png',
			'sections' => array( 'layout-general', 'layout-header', 'social' , 'layout-footer', 'custom-css' ),
		),
		
		// Colors --------------------------------------------
		'colors' => array(
			'title' => __('Colors', 'mfn-opts'),
			'icon' => MFN_OPTIONS_URI. 'img/icons/colors.png',
			'sections' => array( 'colors-general', 'boxes', 'menu', 'colors-header', 'content', 'colors-footer', 'colors-slider', 'colors-blog', 'headings', 'colors-shortcodes', 'colors-widgets'),
		),
		
		// Fonts --------------------------------------------
		'font' => array(
			'title' => __('Fonts', 'mfn-opts'),
			'icon' => MFN_OPTIONS_URI. 'img/icons/font.png',
			'sections' => array( 'font-family', 'font-size' ),
		),
		
		// Translate --------------------------------------------
		'translate' => array(
			'title' => __('Translate', 'mfn-opts'),
			'icon' => MFN_OPTIONS_URI. 'img/icons/translate.png',
			'sections' => array( 'translate-general', 'translate-blog', 'translate-contact', 'translate-404' ),
		),
		
	);

	$sections = array();

	// General ----------------------------------------------------------------------------------------
	
	// General -------------------------------------------
	$sections['general'] = array(
		'title' => __('General', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'responsive',
				'type' => 'switch',
				'title' => __('Responsive', 'mfn-opts'), 
				'desc' => __('<b>Notice:</b> Responsive menu is working only with WordPress custom menu, please add one in Appearance > Menus and select it for Theme Locations section. <a href="http://en.support.wordpress.com/menus/" target="_blank">http://en.support.wordpress.com/menus/</a>', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'mfn-seo',
				'type' => 'switch',
				'title' => __('Use built-in SEO fields - W~P~L~O~C~K~E`R`.~C~O`M', 'mfn-opts'), 
				'desc' => __('Turn it off if you want to use external SEO plugin.', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'meta-description',
				'type' => 'text',
				'title' => __('Meta Description', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts & pages.', 'mfn-opts'),
				'std' => get_bloginfo( 'description' ),
			),
			
			array(
				'id' => 'meta-keywords',
				'type' => 'text',
				'title' => __('Meta Keywords', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts & pages.', 'mfn-opts'),
			),
			
			array(
				'id' => 'google-analytics',
				'type' => 'textarea',
				'title' => __('Google Analytics', 'mfn-opts'), 
				'sub_desc' => __('Paste your Google Analytics code here.', 'mfn-opts'),
			),
			
		),
	);
	
	// Sidebars --------------------------------------------
	$sections['sidebars'] = array(
		'title' => __('Sidebars', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'sidebar-layout',
				'type' => 'radio_img',
				'title' => __('Default Layout', 'mfn-opts'), 
				'sub_desc' => __('Default post or page sidebar', 'mfn-opts'),
				'options' => array(
					'no-sidebar' => array('title' => 'Full width without sidebar', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
					'left-sidebar' => array('title' => 'Left Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cl.png'),
					'right-sidebar' => array('title' => 'Right Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cr.png')
				),
				'std' => '2'																		
			),
	
			array(
				'id' => 'sidebars',
				'type' => 'multi_text',
				'title' => __('Sidebars', 'mfn-opts'),
				'sub_desc' => __('Manage custom sidebars', 'mfn-opts'),
				'desc' => __('Sidebars can be used on pages, blog and portfolio', 'mfn-opts')
			),
				
		),
	);
	
	// Blog --------------------------------------------
	$sections['blog'] = array(
		'title' => __('Blog', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'blog-posts',
				'type' => 'text',
				'title' => __('Posts per page', 'mfn-opts'),
				'sub_desc' => __('Number of posts per page.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => '5',
			),
			
			array(
				'id' => 'blog-categories',
				'type' => 'switch',
				'title' => __('Show Categories', 'mfn-opts'), 
				'sub_desc' => __('Show categories on single post.', 'mfn-opts'), 
				'desc' => __('These setting may be overridden for single posts.', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-comments',
				'type' => 'switch',
				'title' => __('Show Comments', 'mfn-opts'), 
				'sub_desc' => __('Show comments number on posts list and single post.', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts.', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-time',
				'type' => 'switch',
				'title' => __('Show Date', 'mfn-opts'), 
				'sub_desc' => __('Show date on posts list and single post.', 'mfn-opts'), 
				'desc' => __('These setting may be overridden for single posts.', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-tags',
				'type' => 'switch',
				'title' => __('Show Tags', 'mfn-opts'), 
				'sub_desc' => __('Show tags list on posts list and single post.', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts.', 'mfn-opts'),  
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-social',
				'type' => 'switch',
				'title' => __('Social network sharing', 'mfn-opts'), 
				'sub_desc' => __('Show social network sharing on single post.', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts.', 'mfn-opts'),  
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-readmore',
				'type' => 'text',
				'title' => __('Read more', 'mfn-opts'),
				'sub_desc' => __('Read more button text.', 'mfn-opts'),
				'desc' => __('Leave blank if you don`t want the buttons on blog page.', 'mfn-opts'),
				'std' => 'Read more',
			),
			
			array(
				'id' => 'pagination-show-all',
				'type' => 'switch',
				'title' => __('All pages in pagination', 'mfn-opts'),
				'desc' => __('Show all of the pages instead of a short list of the pages near the current page.', 'mfn-opts'),  
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
				
		),
	);
	
	// Portfolio --------------------------------------------
	$sections['portfolio'] = array(
		'title' => __('Portfolio', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'portfolio-posts',
				'type' => 'text',
				'title' => __('Posts per page', 'mfn-opts'),
				'sub_desc' => __('Number of portfolio posts per page.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => '6',
			),
			
			array(
				'id' => 'portfolio-layout',
				'type' => 'radio_img',
				'title' => __('Layout', 'mfn-opts'), 
				'sub_desc' => __('Layout for portfolio items list.', 'mfn-opts'),
				'options' => array(
					'one-second' => array('title' => 'Two columns', 'img' => MFN_OPTIONS_URI.'img/one-second.png'),
					'one-third' => array('title' => 'Three columns', 'img' => MFN_OPTIONS_URI.'img/one-third.png'),
					'one-fourth' => array('title' => 'Four columns', 'img' => MFN_OPTIONS_URI.'img/one-fourth.png'),
				),
				'std' => 'one-fourth'																		
			),
			
			array(
				'id' => 'portfolio-page',
				'type' => 'pages_select',
				'title' => __('Portfolio Page', 'mfn-opts'), 
				'sub_desc' => __('Assign page for portfolio.', 'mfn-opts'),
				'args' => array()
			),
			
			array(
				'id' => 'portfolio-slug',
				'type' => 'text',
				'title' => __('Single item slug', 'mfn-opts'),
				'sub_desc' => __('Link to single item.', 'mfn-opts'),
				'desc' => __('<b>Important:</b> Do not use characters not allowed in links. <br /><br />Must be different from the Portfolio site title chosen above, ex. "portfolio-item". After change please go to "Settings > Permalinks" and click "Save changes" button.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => 'portfolio-item',
			),
			
			array(
				'id' => 'portfolio-orderby',
				'type' => 'select',
				'title' => __('Order by', 'mfn-opts'), 
				'sub_desc' => __('Portfolio items order by column.', 'mfn-opts'),
				'options' => array('date'=>'Date', 'menu_order' => 'Menu order', 'title'=>'Title'),
				'std' => 'menu_order'
			),
			
			array(
				'id' => 'portfolio-order',
				'type' => 'select',
				'title' => __('Order', 'mfn-opts'), 
				'sub_desc' => __('Portfolio items order.', 'mfn-opts'),
				'options' => array('ASC' => 'Ascending', 'DESC' => 'Descending'),
				'std' => 'ASC'
			),
			
			array(
				'id' => 'portfolio-isotope',
				'type' => 'switch',
				'title' => __('jQuery filtering', 'mfn-opts'),
				'desc' => __('When this option is enabled, portfolio looks great with all projects on single site, so please set "Posts per page" option to bigger number', 'mfn-opts'),  
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
				
		),
	);
	
	// Slider --------------------------------------------
	$sections['slider'] = array(
		'title' => __('Slider Offer', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'slider-timeout',
				'type' => 'text',
				'title' => __('Timeout', 'mfn-opts'),
				'sub_desc' => __('Milliseconds between slide transitions.', 'mfn-opts'),
				'desc' => __('This option can be used only with Autoplay.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => '5000',
			),

			array(
				'id' => 'slider-auto',
				'type' => 'switch',
				'title' => __('Autoplay', 'mfn-opts'),
				'sub_desc' => __('Auto transition between slides.', 'mfn-opts'),
				'desc' => __('This option can be used only with Timeout > 0.', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
				
			array(
				'id' => 'slider-pause',
				'type' => 'switch',
				'title' => __('Pause on Hover', 'mfn-opts'),
				'sub_desc' => __('Pause slider on slide or pager hover.', 'mfn-opts'),
				'desc' => __('This option can be used only with Autoplay.', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
								
		),
	);
	
	// Advanced -------------------------------------------
	$sections['advanced'] = array(
		'title' => __('Advanced', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(

			array(
				'id' 		=> 'google-maps-api-key',
				'type' 		=> 'text',
				'title' 	=> __('Google Maps API Key', 'mfn-opts'),
				'sub_desc' 	=> __('optional', 'mfn-opts'),
				'desc' 		=> __('If you are generating a large volume of queries to the Google Maps API please <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">Get an API key</a>', 'mfn-opts'),
			),

		),
	);
	
	// Layout ----------------------------------------------------------------------------------------
	
	// General --------------------------------------------
	$sections['layout-general'] = array(
		'title' => __('General', 'mfn-opts'),
		'fields' => array(
				
			array(
				'id' => 'layout',
				'type' => 'radio_img',
				'title' => __('Layout', 'mfn-opts'),
				'sub_desc' => __('Layout type', 'mfn-opts'),
				'options' => array(
					'boxed' => array('title' => 'Boxed', 'img' => MFN_OPTIONS_URI.'img/boxed.png'),
					'full-width' => array('title' => 'Full width', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
				),
				'std' => 'boxed'
			),
				
			array(
				'id' => 'overlay',
				'type' => 'radio_img',
				'title' => __('Overlay', 'mfn-opts'),
				'sub_desc' => __('Boxed Layout Overlay', 'mfn-opts'),
				'desc' => __('This option can be used <strong>only</strong> with Layout: Boxed.<br />Please note that not every overlay is transparent.', 'mfn-opts'),
				'options' => array(
					0 => array('title' => 'Without Overlay', 'img' => MFN_OPTIONS_URI.'img/overlays/0.png'),
					1 => array('title' => '1', 'img' => MFN_OPTIONS_URI.'img/overlays/1.png'),
					2 => array('title' => '2', 'img' => MFN_OPTIONS_URI.'img/overlays/2.png'),
					3 => array('title' => '3', 'img' => MFN_OPTIONS_URI.'img/overlays/3.png'),
					4 => array('title' => '4', 'img' => MFN_OPTIONS_URI.'img/overlays/4.png'),
					5 => array('title' => '5', 'img' => MFN_OPTIONS_URI.'img/overlays/5.png'),
					6 => array('title' => '6', 'img' => MFN_OPTIONS_URI.'img/overlays/6.png'),
					7 => array('title' => '7', 'img' => MFN_OPTIONS_URI.'img/overlays/7.png'),
					8 => array('title' => '8', 'img' => MFN_OPTIONS_URI.'img/overlays/8.png'),
					9 => array('title' => '9', 'img' => MFN_OPTIONS_URI.'img/overlays/9.png'),
					10 => array('title' => '10', 'img' => MFN_OPTIONS_URI.'img/overlays/10.png'),
					11 => array('title' => '11', 'img' => MFN_OPTIONS_URI.'img/overlays/11.png'),
					12 => array('title' => '12', 'img' => MFN_OPTIONS_URI.'img/overlays/12.png'),
					13 => array('title' => '13', 'img' => MFN_OPTIONS_URI.'img/overlays/13.png'),
					14 => array('title' => '14', 'img' => MFN_OPTIONS_URI.'img/overlays/14.png'),
				),
				'std' => '0'
			),
			
			array(
				'id' => 'img-page-bg',
				'type' => 'upload',
				'title' => __('Background image', 'mfn-opts'),
				'desc' => __('This option can be used <strong>only</strong> with Layout: Boxed.', 'mfn-opts'),
			),
			
			array(
				'id' => 'position-page-bg',
				'type' => 'select',
				'title' => __('Background image position', 'mfn-opts'),
				'desc' => __('This option can be used only with your custom image selected above.', 'mfn-opts'),
				'options' => array(		
					'center top no-repeat' => 'Center Top No-Repeat',
					'center top repeat' => 'Center Top Repeat',
					'center center no-repeat' => 'Center No-Repeat',
					'center center repeat' => 'Center Repeat',
					'left top no-repeat' => 'Left Top No-Repeat',
					'left top repeat' => 'Left Top Repeat',
					'center top no-repeat fixed' => 'Center No-Repeat Fixed',
					'no-repeat fixed center center / cover' => 'Center No-Repeat Fixed Cover',
				),
				'std' => 'center top no-repeat',
			),
			
		),
	);
	
	// Header --------------------------------------------
	$sections['layout-header'] = array(
		'title' => __('Header', 'mfn-opts'),
		'fields' => array(
	
			array(
				'id' => 'logo-img',
				'type' => 'upload',
				'title' => __('Custom Logo', 'mfn-opts'),
				'sub_desc' => __('Custom logo image', 'mfn-opts'),
			),
	
			array(
				'id' => 'retina-logo-img',
				'type' => 'upload',
				'title' => __('Retina Logo', 'mfn-opts'),
				'sub_desc' => __('2x larger logo image', 'mfn-opts'),
				'desc' => __('Retina Logo should be 2x larger than Custom Logo (field is optional).', 'mfn-opts'),
			),

			array(
				'id' => 'retina-logo-width',
				'type' => 'text',
				'title' => __('Custom Logo Width', 'mfn-opts'),
				'sub_desc' => __('for Retina Logo', 'mfn-opts'),
				'desc' => __('px. Please type width for Custom Logo image (<strong>not</strong> for Retina Logo).', 'mfn-opts'),
				'class' => 'small-text',
			),

			array(
				'id' => 'retina-logo-height',
				'type' => 'text',
				'title' => __('Custom Logo Height', 'mfn-opts'),
				'sub_desc' => __('for Retina Logo', 'mfn-opts'),
				'desc' => __('px. Please type height for Custom Logo image (<strong>not</strong> for Retina Logo).', 'mfn-opts'),
				'class' => 'small-text',
			),
	
			array(
				'id' => 'favicon-img',
				'type' => 'upload',
				'title' => __('Custom Favicon', 'mfn-opts'),
				'sub_desc' => __('Site favicon', 'mfn-opts'),
				'desc' => __('Please use ICO format only.', 'mfn-opts')
			),
	
			array(
				'id' => 'telephone-number',
				'type' => 'text',
				'title' => __('Telephone number', 'mfn-opts'),
				'desc' => __('Wrap text into "span" tag to highlight it.', 'mfn-opts'),
			),
	
			array(
				'id' => 'header-email',
				'type' => 'text',
				'title' => __('Email address', 'mfn-opts'),
			),
				
		),
	);
	
	// Social Icons --------------------------------------------
	$sections['social'] = array(
		'title' => __('Social Icons', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'social-facebook',
				'type' => 'text',
				'title' => __('Facebook', 'mfn-opts'),
				'sub_desc' => __('Type your Facebook link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-googleplus',
				'type' => 'text',
				'title' => __('Google +', 'mfn-opts'),
				'sub_desc' => __('Type your Google + link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-twitter',
				'type' => 'text',
				'title' => __('Twitter', 'mfn-opts'),
				'sub_desc' => __('Type your Twitter link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-vimeo',
				'type' => 'text',
				'title' => __('Vimeo', 'mfn-opts'),
				'sub_desc' => __('Type your Vimeo link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-youtube',
				'type' => 'text',
				'title' => __('YouTube', 'mfn-opts'),
				'sub_desc' => __('Type your YouTube link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-flickr',
				'type' => 'text',
				'title' => __('Flickr', 'mfn-opts'),
				'sub_desc' => __('Type your Flickr link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-linkedin',
				'type' => 'text',
				'title' => __('LinkedIn', 'mfn-opts'),
				'sub_desc' => __('Type your LinkedIn link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-pinterest',
				'type' => 'text',
				'title' => __('Pinterest', 'mfn-opts'),
				'sub_desc' => __('Type your Pinterest link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-dribbble',
				'type' => 'text',
				'title' => __('Dribbble', 'mfn-opts'),
				'sub_desc' => __('Type your Dribbble link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
				
		),
	);
	
	// Footer --------------------------------------------
	$sections['layout-footer'] = array(
		'title' => __('Footer', 'mfn-opts'),
		'fields' => array(
				
			array(
				'id' => 'footer-layout',
				'type' => 'radio_img',
				'title' => __('Footer Layout', 'mfn-opts'),
				'sub_desc' => __('Footer Layout type', 'mfn-opts'),
				'options' => array(
					'included' => array('title' => 'Included', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
					'separate' => array('title' => 'Separated', 'img' => MFN_OPTIONS_URI.'img/footer-separate.png'),
				),
				'std' => 'separate'
			),
				
			array(
				'id' => 'footer-logo-img',
				'type' => 'upload',
				'title' => __('Footer Logo', 'mfn-opts'),
				'sub_desc' => __('Custom footer logo image', 'mfn-opts'),
				'desc' => __('The best size for logo is 150px x 30px.', 'mfn-opts')
			),
	
			array(
				'id' => 'copyright',
				'type' => 'text',
				'title' => __('Copyright Text', 'mfn-opts'),
				'desc' => __('Leave this field blank to show a default copyright.', 'mfn-opts'),
			),
				
		),
	);
	
	// Custom CSS --------------------------------------------
	$sections['custom-css'] = array(
		'title' => __('Custom CSS', 'mfn-opts'),
		'fields' => array(

			array(
				'id' => 'custom-css',
				'type' => 'textarea',
				'title' => __('Custom CSS', 'mfn-opts'), 
				'sub_desc' => __('Paste your custom CSS code here.', 'mfn-opts'),
			),
				
		),
	);

	// Colors ----------------------------------------------------------------------------------------
	
	// General --------------------------------------------
	$sections['colors-general'] = array(
		'title' => __('General', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
							
			array(
				'id' => 'skin',
				'type' => 'select',
				'title' => __('Theme Skin', 'mfn-opts'), 
				'sub_desc' => __('Choose one of the predefined styles or set your own colors.', 'mfn-opts'), 
				'desc' => __('<b>Important:</b> Color options can be used only with the Custom Skin.', 'mfn-opts'), 
				'options' => array(
			
					'custom' => 'Custom',
					'blue' => 'Blue',
					'green' => 'Green',
					'orange' => 'Orange',
					'red' => 'Red',
			
				),
				'std' => 'custom',
			),
			
			array(
				'id' => 'background-body',
				'type' => 'color',
				'title' => __('Body background', 'mfn-opts'), 
				'desc' => __('This option works <strong>only</strong> with Layout: Boxed.', 'mfn-opts'),
				'std' => '#f8f8f8',
			),
			
			array(
				'id' => 'background-wrapper',
				'type' => 'color',
				'title' => __('Wrapper background', 'mfn-opts'), 
				'std' => '#ffffff',
			),
			
		),
	);
	
	// Boxes --------------------------------------------
	$sections['boxes'] = array(
		'title' => __('Boxes', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
					
			array(
				'id' => 'background-box-1',
				'type' => 'color',
				'title' => __('Background color 1', 'mfn-opts'),
				'std' => '#2a2f35'
			),
				
			array(
				'id' => 'background-box-2',
				'type' => 'color',
				'title' => __('Background color 2', 'mfn-opts'),
				'std' => '#3e444b'
			),
				
			array(
				'id' => 'background-box-3',
				'type' => 'color',
				'title' => __('Background color 3', 'mfn-opts'),
				'std' => '#326e9b'
			),
				
			array(
				'id' => 'background-box-4',
				'type' => 'color',
				'title' => __('Background color 4', 'mfn-opts'),
				'std' => '#53a3e0'
			),
				
			array(
				'id' => 'background-box-5',
				'type' => 'color',
				'title' => __('Background color 5', 'mfn-opts'),
				'std' => '#73a7cf'
			),
				
		),
	);
	
	// Main menu --------------------------------------------
	$sections['menu'] = array(
		'title' => __('Main menu', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
			
			array(
				'id' => 'color-menu-a',
				'type' => 'color',
				'title' => __('Menu Link color', 'mfn-opts'), 
				'std' => '#213442'
			),
			
			array(
				'id' => 'color-menu-arrow',
				'type' => 'color',
				'title' => __('Menu Arrow color', 'mfn-opts'), 
				'std' => '#c5c4c4'
			),
			
			array(
				'id' => 'color-menu-a-active',
				'type' => 'color',
				'title' => __('Active Menu Link color', 'mfn-opts'),
				'std' => '#629ac2'
			),
				
			array(
				'id' => 'border-menu-a-hover',
				'type' => 'color',
				'title' => __('Hover Menu border', 'mfn-opts'),
				'std' => '#e5e5e5'
			),
				
			array(
				'id' => 'color-menu-arrow-hover',
				'type' => 'color',
				'title' => __('Hover Menu Arrow color', 'mfn-opts'),
				'std' => '#053f57'
			),
				
			array(
				'id' => 'color-submenu-a',
				'type' => 'color',
				'title' => __('Submenu Link color', 'mfn-opts'),
				'std' => '#ffffff'
			),
	
			array(
				'id' => 'background-submenu-a',
				'type' => 'color',
				'title' => __('Submenu background', 'mfn-opts'), 
				'std' => '#53a3e0'
			),

			array(
				'id' => 'border-submenu-a',
				'type' => 'color',
				'title' => __('Submenu Link border', 'mfn-opts'), 
				'std' => '#87bfe9'
			),
			
			array(
				'id' => 'color-submenu-a-hover',
				'type' => 'color',
				'title' => __('Hover Submenu Link color', 'mfn-opts'),
				'std' => '#bbedfc'
			),
				
		),
	);
	
	// Header --------------------------------------------
	$sections['colors-header'] = array(
		'title' => __('Header', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(

			array(
				'id' => 'color-phone-ico',
				'type' => 'color',
				'title' => __('Phone & Email Icons color', 'mfn-opts'),
				'std' => '#40464d',
			),
								
			array(
				'id' => 'color-phone',
				'type' => 'color',
				'title' => __('Phone Number color', 'mfn-opts'), 
				'std' => '#5890ba',
			),	
			
			array(
				'id' => 'color-phone-highlight',
				'type' => 'color',
				'title' => __('Phone Number Highlight color', 'mfn-opts'), 
				'std' => '#326e9b',
			),	
				
			array(
				'id' => 'background-subheader',
				'type' => 'color',
				'title' => __('Title Area background', 'mfn-opts'), 
				'std' => '#2A2F35',
			),
				
			array(
				'id' => 'border-subheader',
				'type' => 'color',
				'title' => __('Title Area border color', 'mfn-opts'), 
				'std' => '#66A6D8',
			),
				
			array(
				'id' => 'color-subheader-title',
				'type' => 'color',
				'title' => __('Title Area Title color', 'mfn-opts'), 
				'std' => '#ffffff',
			),
			
			array(
				'id' => 'color-subheader-text',
				'type' => 'color',
				'title' => __('Title Area Text & Link color', 'mfn-opts'), 
				'std' => '#d0e6eb',
			),
			
			array(
				'id' => 'color-subheader-arrow',
				'type' => 'color',
				'title' => __('Title Area Arrow color', 'mfn-opts'), 
				'std' => '#4c90eb',
			),
				
		),
	);
	
	// Content --------------------------------------------
	$sections['content'] = array(
		'title' => __('Content', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
		
			array(
				'id' => 'color-text',
				'type' => 'color',
				'title' => __('Text color', 'mfn-opts'), 
				'sub_desc' => __('Content text color.', 'mfn-opts'),
				'std' => '#676f76'
			),
			
			array(
				'id' => 'color-a',
				'type' => 'color',
				'title' => __('Link color', 'mfn-opts'), 
				'std' => '#3FA8D2'
			),
			
			array(
				'id' => 'color-a-hover',
				'type' => 'color',
				'title' => __('Hoover Link color', 'mfn-opts'), 
				'std' => '#1B87B1'
			),
			
			array(
				'id' => 'color-bold-note',
				'type' => 'color',
				'title' => __('Bold Note text color', 'mfn-opts'), 
				'desc' => __('Bold Note, ex. latest post title, comment author, etc.', 'mfn-opts'), 
				'std' => '#31373c'
			),
			
			array(
				'id' => 'color-blue-note',
				'type' => 'color',
				'title' => __('Dark Blue Note text color', 'mfn-opts'), 
				'desc' => __('Dark Blue Note, ex. blockquote text, phone number, etc.', 'mfn-opts'), 
				'std' => '#005274'
			),
			
			array(
				'id' => 'color-note',
				'type' => 'color',
				'title' => __('Grey Note text color', 'mfn-opts'), 
				'desc' => __('Grey Note, ex. post date, etc.', 'mfn-opts'), 
				'std' => '#A3A3A3'
			),
			
			array(
				'id' => 'border-borders',
				'type' => 'color',
				'title' => __('Border color', 'mfn-opts'), 
				'std' => '#ebebeb'
			),

			array(
				'id' => 'color-button',
				'type' => 'color',
				'title' => __('Button text color', 'mfn-opts'), 
				'std' => '#326e9b',
			),
			
			array(
				'id' => 'color-button-arrow',
				'type' => 'color',
				'title' => __('Button arrow color', 'mfn-opts'), 
				'std' => '#9DD3E8',
			),
	
		),
	);
	
	// Footer --------------------------------------------
	$sections['colors-footer'] = array(
		'title' => __('Footer', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'background-footer',
				'type' => 'color',
				'title' => __('Footer background', 'mfn-opts'),
				'desc' => __('This option works <strong>only</strong> with Footer Layout: Included.', 'mfn-opts'),
				'std' => '#FBFBFB',
			),
				
			array(
				'id' => 'color-gototop',
				'type' => 'color',
				'title' => __('Go to top icon color', 'mfn-opts'),  
				'std' => '#000000',
			),
			
			array(
				'id' => 'color-gototop-hover',
				'type' => 'color',
				'title' => __('Hover Go to top icon color', 'mfn-opts'),  
				'std' => '#005274',
			),
	
			array(
				'id' => 'color-footer-heading',
				'type' => 'color',
				'title' => __('Footer heading color', 'mfn-opts'), 
				'std' => '#2a2f35',
			),
	
			array(
				'id' => 'color-footer-text',
				'type' => 'color',
				'title' => __('Footer text color', 'mfn-opts'), 
				'desc' => __('This is also Footer Menu Link color.', 'mfn-opts'), 
				'std' => '#717171',
			),
			
			array(
				'id' => 'color-footer-a',
				'type' => 'color',
				'title' => __('Footer Link color', 'mfn-opts'), 
				'desc' => __('This is also Hover Footer Menu Link color.', 'mfn-opts'),
				'std' => '#53a3e0',
			),
			
			array(
				'id' => 'color-footer-bold-note',
				'type' => 'color',
				'title' => __('Bold Note text color', 'mfn-opts'), 
				'std' => '#2a2f35',
			),
			
			array(
				'id' => 'color-footer-note',
				'type' => 'color',
				'title' => __('Grey Note text color', 'mfn-opts'), 
				'std' => '#A6A6A6',
			),
			
			array(
				'id' => 'border-footer-frame',
				'type' => 'color',
				'title' => __('Borders & frames', 'mfn-opts'), 
				'std' => '#e4dddd',
			),
	
			array(
				'id' => 'color-footer-button',
				'type' => 'color',
				'title' => __('Footer Button text color', 'mfn-opts'), 
				'std' => '#326e9b',
			),
			
			array(
				'id' => 'color-footer-button-arrow',
				'type' => 'color',
				'title' => __('Footer Button arrow color', 'mfn-opts'), 
				'std' => '#9DD3E8',
			),
	
		),
	);
	
	// Colors Slider --------------------------------------------
	$sections['colors-slider'] = array(
		'title' => __('Slider Offer', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'color-slider-title',
				'type' => 'color',
				'title' => __('Slider Title color', 'mfn-opts'),
				'std' => '#ffffff'
			),
				
			array(
				'id' => 'color-slider-text',
				'type' => 'color',
				'title' => __('Slider Text color', 'mfn-opts'),
				'std' => '#dddddd'
			),
				
			array(
				'id' => 'color-slider-button',
				'type' => 'color',
				'title' => __('Slider Button text color', 'mfn-opts'),
				'std' => '#ffffff'
			),

		),
	);
	
	// Colors Blog --------------------------------------------
	$sections['colors-blog'] = array(
		'title' => __('Blog & Portfolio', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(	
			
			array(
				'id' => 'background-blog-date',
				'type' => 'color',
				'title' => __('Blog Date background', 'mfn-opts'),
				'std' => '#73a7cf'
			),
				
			array(
				'id' => 'color-blog-day',
				'type' => 'color',
				'title' => __('Blog Day text color', 'mfn-opts'),
				'std' => '#ffffff'
			),
				
			array(
				'id' => 'color-blog-month',
				'type' => 'color',
				'title' => __('Blog Month text color', 'mfn-opts'),
				'desc' => __('This is also calendar icon color.', 'mfn-opts'),
				'std' => '#cce9ff'
			),
				
			array(
				'id' => 'color-blog-year',
				'type' => 'color',
				'title' => __('Blog Year text color', 'mfn-opts'),
				'std' => '#385a75'
			),
				
			array(
				'id' => 'background-blog-comments',
				'type' => 'color',
				'title' => __('Blog Comments background', 'mfn-opts'),
				'std' => '#326e9b'
			),
			
			array(
				'id' => 'color-blog-comments',
				'type' => 'color',
				'title' => __('Blog Comments text color', 'mfn-opts'),
				'std' => '#ddeffc'
			),
			
			array(
				'id' => 'color-portfolio-icon',
				'type' => 'color',
				'title' => __('Portfolio Item Icon color', 'mfn-opts'),
				'std' => '#3FA8D2'
			),
			
			array(
				'id' => 'color-portfolio-text',
				'type' => 'color',
				'title' => __('Portfolio Item Title color', 'mfn-opts'),
				'std' => '#09526F'
			),

		),
	);
	
	// Headings --------------------------------------------
	$sections['headings'] = array(
		'title' => __('Headings', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'color-h1',
				'type' => 'color',
				'title' => __('Heading H1 color', 'mfn-opts'), 
				'std' => '#313131'
			),
			
			array(
				'id' => 'color-h2',
				'type' => 'color',
				'title' => __('Heading H2 color', 'mfn-opts'), 
				'std' => '#313131'
			),
			
			array(
				'id' => 'color-h3',
				'type' => 'color',
				'title' => __('Heading H3 color', 'mfn-opts'), 
				'std' => '#313131'
			),
			
			array(
				'id' => 'color-h4',
				'type' => 'color',
				'title' => __('Heading H4 color', 'mfn-opts'), 
				'std' => '#313131'
			),
			
			array(
				'id' => 'color-h5',
				'type' => 'color',
				'title' => __('Heading H5 color', 'mfn-opts'), 
				'std' => '#09526f'
			),
			
			array(
				'id' => 'color-h6',
				'type' => 'color',
				'title' => __('Heading H6 color', 'mfn-opts'), 
				'std' => '#31373c'
			),
				
		),
	);
	
	// Shortcodes --------------------------------------------
	$sections['colors-shortcodes'] = array(
		'title' => __('Shortcodes', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'background-accordion-tabs',
				'type' => 'color',
				'title' => __('Accordion & Tabs background', 'mfn-opts'),
				'std' => '#fbfbfb',
			),
			
			array(
				'id' => 'background-accordion-tabs-inner',
				'type' => 'color',
				'title' => __('Accordion & Tabs inner background', 'mfn-opts'),
				'std' => '#ffffff',
			),
			
			array(
				'id' => 'color-accordion-tabs',
				'type' => 'color',
				'title' => __('Accordion & Tabs Title color', 'mfn-opts'),
				'std' => '#515e6d',
			),
			
			array(
				'id' => 'color-accordion-tabs-active',
				'type' => 'color',
				'title' => __('Active Accordion & Tabs Title color', 'mfn-opts'),
				'std' => '#313131',
			),
			
			array(
				'id' => 'border-tab-active',
				'type' => 'color',
				'title' => __('Active Tab border', 'mfn-opts'),
				'std' => '#66A6D8',
			),
			
			array(
				'id' => 'background-call-to-action',
				'type' => 'color',
				'title' => __('Call To Action background', 'mfn-opts'), 
				'std' => '#326E9B',
			),
				
			array(
				'id' => 'color-call-to-action-text',
				'type' => 'color',
				'title' => __('Call To Action Text color', 'mfn-opts'), 
				'std' => '#ffffff',
			),
			
			array(
				'id' => 'color-call-to-action-highlight',
				'type' => 'color',
				'title' => __('Call To Action Highlight color', 'mfn-opts'), 
				'std' => '#B7E8FF',
			),
			
			array(
				'id' => 'color-call-to-action-button',
				'type' => 'color',
				'title' => __('Call To Action Button text color', 'mfn-opts'), 
				'std' => '#ffffff',
			),
					
			array(
				'id' => 'color-offer-title',
				'type' => 'color',
				'title' => __('Our Offer Title color', 'mfn-opts'), 
				'std' => '#53a3e0',
			),
			
			array(
				'id' => 'color-offer-subtitle',
				'type' => 'color',
				'title' => __('Our Offer Subtitle color', 'mfn-opts'), 
				'std' => '#2a2f35',
			),
			
			array(
				'id' => 'color-offer-link',
				'type' => 'color',
				'title' => __('Our Offer Link color', 'mfn-opts'), 
				'std' => '#2a2f35',
			),
	
		),
	);

	// Widgets --------------------------------------------
	$sections['colors-widgets'] = array(
		'title' => __('Widgets', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(

			array(
				'id' => 'background-sidebar',
				'type' => 'color',
				'title' => __('Sidebar background', 'mfn-opts'),
				'std' => '#fcfcfc',
			),
				
			array(
				'id' => 'background-mfn-menu',
				'type' => 'color',
				'title' => __('Muffin Menu background', 'mfn-opts'),
				'std' => '#FFFFFF',
			),
				
			array(
				'id' => 'color-mfn-menu-link',
				'type' => 'color',
				'title' => __('Muffin Menu link color', 'mfn-opts'),
				'std' => '#475363',
			),
				
			array(
				'id' => 'color-mfn-menu-link-active',
				'type' => 'color',
				'title' => __('Active Muffin Menu link color', 'mfn-opts'),
				'std' => '#ffffff',
			),
				
			array(
				'id' => 'background-mfn-menu-link-active',
				'type' => 'color',
				'title' => __('Active Muffin Menu link background', 'mfn-opts'),
				'std' => '#3C95B8',
			),
				
		),
	);

	// Font Family --------------------------------------------
	$sections['font-family'] = array(
		'title' => __('Font Family', 'mfn-opts'),
		'fields' => array(
			
			array(
				'id' => 'font-content',
				'type' => 'font_select',
				'title' => __('Content Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for all theme texts except headings and menu.', 'mfn-opts'), 
				'std' => 'Titillium Web'
			),
			
			array(
				'id' => 'font-menu',
				'type' => 'font_select',
				'title' => __('Main Menu Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for header menu.', 'mfn-opts'), 
				'std' => 'Patua One'
			),
			
			array(
				'id' => 'font-headings',
				'type' => 'font_select',
				'title' => __('Headings Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for all headings.', 'mfn-opts'), 
				'std' => 'Patua One'
			),
			
			array(
				'id' => 'font-subset',
				'type' => 'text',
				'title' => __('Google Font Subset', 'mfn-opts'),				
				'sub_desc' => __('Specify which subsets should be downloaded. Multiple subsets should be separated with coma (,)', 'mfn-opts'),
				'desc' => __('Some of the fonts in the Google Font Directory support multiple scripts (like Latin and Cyrillic for example). In order to specify which subsets should be downloaded the subset parameter should be appended to the URL. For a complete list of available fonts and font subsets please see <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a>.', 'mfn-opts'),
				'class' => 'small-text'
			),
				
		),
	);
	
	// Content Font Size --------------------------------------------
	$sections['font-size'] = array(
		'title' => __('Font Size', 'mfn-opts'),
		'fields' => array(

			array(
				'id' => 'font-size-content',
				'type' => 'sliderbar',
				'title' => __('Content', 'mfn-opts'),
				'sub_desc' => __('This font size will be used for all theme texts.', 'mfn-opts'),
				'std' => '14',
			),
			
			array(
				'id' => 'font-size-h1',
				'type' => 'sliderbar',
				'title' => __('Heading H1', 'mfn-opts'),
				'sub_desc' => __('Subpages header title.', 'mfn-opts'),
				'std' => '50',
			),
			
			array(
				'id' => 'font-size-h2',
				'type' => 'sliderbar',
				'title' => __('Heading H2', 'mfn-opts'),
				'std' => '42',
			),
			
			array(
				'id' => 'font-size-h3',
				'type' => 'sliderbar',
				'title' => __('Heading H3', 'mfn-opts'),
				'std' => '28',
			),
			
			array(
				'id' => 'font-size-h4',
				'type' => 'sliderbar',
				'title' => __('Heading H4', 'mfn-opts'),
				'std' => '24',
			),
			
			array(
				'id' => 'font-size-h5',
				'type' => 'sliderbar',
				'title' => __('Heading H5', 'mfn-opts'),
				'std' => '20',
			),
			
			array(
				'id' => 'font-size-h6',
				'type' => 'sliderbar',
				'title' => __('Heading H6', 'mfn-opts'),
				'std' => '14',
			),
	
		),
	);
	
	// Translate / General --------------------------------------------
	$sections['translate-general'] = array(
		'title' => __('General', 'mfn-opts'),
		'fields' => array(
	
			array(
				'id' => 'translate',
				'type' => 'switch',
				'title' => __('Enable Translate', 'mfn-opts'), 
				'desc' => __('Turn it off if you want to use .mo .po files for more complex translation.', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'translate-search-placeholder',
				'type' => 'text',
				'title' => __('Search Placeholder', 'mfn-opts'),
				'desc' => __('Widget Search', 'mfn-opts'),
				'std' => 'Enter your search',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-you-are-here',
				'type' => 'text',
				'title' => __('You are here', 'mfn-opts'),
				'desc' => __('Breadcrumbs', 'mfn-opts'),
				'std' => 'You are here',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-home',
				'type' => 'text',
				'title' => __('Home', 'mfn-opts'),
				'desc' => __('Breadcrumbs', 'mfn-opts'),
				'std' => 'Home',
				'class' => 'small-text',
			),

		),
	);
	
	// Translate / Blog & Portfolio --------------------------------------------
	$sections['translate-blog'] = array(
		'title' => __('Blog & Portfolio', 'mfn-opts'),
		'fields' => array(
	
			array(
				'id' => 'translate-next',
				'type' => 'text',
				'title' => __('Next page', 'mfn-opts'),
				'desc' => __('Blog, Portfolio', 'mfn-opts'),
				'std' => 'Next page',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-prev',
				'type' => 'text',
				'title' => __('Previous page', 'mfn-opts'),
				'desc' => __('Blog, Portfolio', 'mfn-opts'),
				'std' => 'Prev page',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-select-category',
				'type' => 'text',
				'title' => __('Select category', 'mfn-opts'),
				'desc' => __('Portfolio', 'mfn-opts'),
				'std' => 'Select category',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-all',
				'type' => 'text',
				'title' => __('All', 'mfn-opts'),
				'desc' => __('Portfolio', 'mfn-opts'),
				'std' => 'All',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-category',
				'type' => 'text',
				'title' => __('Category', 'mfn-opts'),
				'desc' => __('Single Blog, Single Portfolio', 'mfn-opts'),
				'std' => 'Category',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-comments',
				'type' => 'text',
				'title' => __('Comments', 'mfn-opts'),
				'desc' => __('Blog', 'mfn-opts'),
				'std' => 'Comments',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-project-description',
				'type' => 'text',
				'title' => __('Project Description', 'mfn-opts'),
				'desc' => __('Single Portfolio', 'mfn-opts'),
				'std' => 'Project Description',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-client',
				'type' => 'text',
				'title' => __('Client', 'mfn-opts'),
				'desc' => __('Single Portfolio', 'mfn-opts'),
				'std' => 'Client',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-date',
				'type' => 'text',
				'title' => __('Date', 'mfn-opts'),
				'desc' => __('Single Portfolio', 'mfn-opts'),
				'std' => 'Date',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-project-url',
				'type' => 'text',
				'title' => __('Project URL', 'mfn-opts'),
				'desc' => __('Single Portfolio', 'mfn-opts'),
				'std' => 'Project URL',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-visit-online',
				'type' => 'text',
				'title' => __('Visit online', 'mfn-opts'),
				'desc' => __('Single Portfolio', 'mfn-opts'),
				'std' => 'Visit online',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-back',
				'type' => 'text',
				'title' => __('Back to list', 'mfn-opts'),
				'desc' => __('Single Portfolio', 'mfn-opts'),
				'std' => 'Back to list',
				'class' => 'small-text',
			),
			
		),
	);
	
	// Translate Contact --------------------------------------------
	$sections['translate-contact'] = array(
		'title' => __('Contact', 'mfn-opts'),
		'fields' => array(
				
			array(
				'id' => 'translate-contactbox-phone',
				'type' => 'text',
				'title' => __('phone number', 'mfn-opts'),
				'desc' => __('Contact Box', 'mfn-opts'),
				'std' => 'phone number',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-contactbox-address',
				'type' => 'text',
				'title' => __('our address', 'mfn-opts'),
				'desc' => __('Contact Box', 'mfn-opts'),
				'std' => 'our address',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-contactbox-email',
				'type' => 'text',
				'title' => __('email address', 'mfn-opts'),
				'desc' => __('Contact Box', 'mfn-opts'),
				'std' => 'email address',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-contactbox-twitter',
				'type' => 'text',
				'title' => __('twitter', 'mfn-opts'),
				'desc' => __('Contact Box', 'mfn-opts'),
				'std' => 'twitter',
				'class' => 'small-text',
			),
	
			array(
				'id' => 'translate-contact-name',
				'type' => 'text',
				'title' => __('Your name', 'mfn-opts'),
				'desc' => __('Contact Form', 'mfn-opts'),
				'std' => 'Your name',
				'class' => 'small-text',
			),
	
			array(
				'id' => 'translate-contact-email',
				'type' => 'text',
				'title' => __('Your e-mail', 'mfn-opts'),
				'desc' => __('Contact Form', 'mfn-opts'),
				'std' => 'Your e-mail',
				'class' => 'small-text',
			),
	
			array(
				'id' => 'translate-contact-subject',
				'type' => 'text',
				'title' => __('Subject', 'mfn-opts'),
				'desc' => __('Contact Form', 'mfn-opts'),
				'std' => 'Subject',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-contact-submit',
				'type' => 'text',
				'title' => __('Send message', 'mfn-opts'),
				'desc' => __('Contact Form', 'mfn-opts'),
				'std' => 'Send message',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-contact-message-success',
				'type' => 'text',
				'title' => __('Success message', 'mfn-opts'),
				'desc' => __('Contact Form', 'mfn-opts'),
				'std' => 'Thanks, your email was sent.',
			),
				
			array(
				'id' => 'translate-contact-message-error',
				'type' => 'text',
				'title' => __('Error message', 'mfn-opts'),
				'desc' => __('Contact Form', 'mfn-opts'),
				'std' => 'Error sending email. Please try again later.',
			),
	
		),
	);
	
	// Translate Error 404 --------------------------------------------
	$sections['translate-404'] = array(
		'title' => __('Error 404', 'mfn-opts'),
		'fields' => array(
	
			array(
				'id' => 'translate-404-title',
				'type' => 'text',
				'title' => __('Title', 'mfn-opts'),
				'desc' => __('Ooops... Error 404', 'mfn-opts'),
				'std' => 'Ooops... Error 404',
			),
			
			array(
				'id' => 'translate-404-subtitle',
				'type' => 'text',
				'title' => __('Subtitle', 'mfn-opts'),
				'desc' => __('We are sorry, but the page you are looking for does not exist.', 'mfn-opts'),
				'std' => 'We are sorry, but the page you are looking for does not exist.',
			),
			
			array(
				'id' => 'translate-404-text',
				'type' => 'text',
				'title' => __('Text', 'mfn-opts'),
				'desc' => __('Please check entered address and try again or', 'mfn-opts'),
				'std' => 'Please check entered address and try again or',
			),
			
			array(
				'id' => 'translate-404-btn',
				'type' => 'text',
				'title' => __('Button', 'mfn-opts'),
				'sub_desc' => __('Go To Homepage button', 'mfn-opts'),
				'std' => 'go to homepage',
				'class' => 'small-text',
			),
	
		),
	);
								
	global $MFN_Options;
	$MFN_Options = new MFN_Options( $menu, $sections );
}
//add_action('init', 'mfn_opts_setup', 0);
mfn_opts_setup();


/**
 * This is used to return and option value from the options array
 */
function mfn_opts_get($opt_name, $default = null){
	global $MFN_Options;
	return $MFN_Options->get( $opt_name, $default );
}


/**
 * This is used to echo and option value from the options array
 */
function mfn_opts_show($opt_name, $default = null){
	global $MFN_Options;
	$option = $MFN_Options->get( $opt_name, $default );
	if( ! is_array( $option ) ){
		echo $option;
	}	
}

?>