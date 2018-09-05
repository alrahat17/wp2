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

	.mfn-color-1 { background-color: <?php mfn_opts_show( 'background-box-1', '#2a2f35' ) ?>; }
	.mfn-color-2 { background-color: <?php mfn_opts_show( 'background-box-2', '#3e444b' ) ?>; }
	.mfn-color-3 { background-color: <?php mfn_opts_show( 'background-box-3', '#326e9b' ) ?>; }
	.mfn-color-4 { background-color: <?php mfn_opts_show( 'background-box-4', '#53a3e0' ) ?>; }
	.mfn-color-5 { background-color: <?php mfn_opts_show( 'background-box-5', '#73a7cf' ) ?>; }

	
/********************* Colors *********************/

/* Content font */

	body, .ui-tabs .ui-tabs-nav li a, .ui-accordion h3 a, .widget ul.menu li a,
	.widget_links ul li a, .widget_meta ul li a {
		color: <?php mfn_opts_show( 'color-text', '#676f76' ) ?>;
	}
	
/* Links color */

	a, a:visited, .widget ul.menu li a:hover, .widget ul.menu li.current_page_item a, 
	.widget ul.menu li.current_page_item a i, .widget ul.menu li a:hover i,
	.widget_links ul li a:hover, .widget_meta ul li a:hover, .testimonial .rslides_tabs li.rslides_here a, .testimonial .rslides_tabs li a:hover,
	.pager a.active, .pager a:hover.page, .Our_clients_slider a:hover.Our_clients_slider_prev, .Our_clients_slider a:hover.Our_clients_slider_next {
		color: <?php mfn_opts_show( 'color-a', '#3FA8D2' ) ?>;
	}
	
	a:hover {
		color: <?php mfn_opts_show( 'color-a-hover', '#1B87B1' ) ?>;
	}
	
/* Strong (dark) */
	.Recent_comments ul li strong, #Content .Latest_posts ul li a.title,  
	#Content .Latest_posts ul li p i, .Recent_comments ul li p strong,
	.Recent_comments ul li p i, .ui-tabs .ui-tabs-nav li.ui-tabs-selected a,
	.ui-accordion h3.ui-state-active a, .Twitter ul li span {
		color: <?php mfn_opts_show( 'color-bold-note', '#31373c' ) ?>;
	}
	
/* Dark blue */
	
	blockquote div.text p, .get_in_touch li.phone p, .pricing-box .plan-inside ul li strong,
	.error h4, .team p, blockquote p.author span {
		color: <?php mfn_opts_show( 'color-blue-note', '#005274' ) ?>;
	}
	
/* Grey notes */

	.Twitter ul li > a, .Recent_comments li span.date, .Latest_posts span.date, .get_in_touch li.label,
	.wp-caption .wp-caption-text, .pricing-box .plan-header .period, .post .meta, 
	.widget_categories li, .widget ul.menu li a i, .testimonial .rslides_tabs li a, .pager a,
	.Our_clients_slider a.Our_clients_slider_prev, .Our_clients_slider a.Our_clients_slider_next,
	.post .desc .r_meta, .single-post .tag-cat .category a, .single-post .tag-cat .category { 
		color: <?php mfn_opts_show( 'color-note', '#A3A3A3' ) ?>;
	}
	
/* Headings font */

	h1, h1 a { color: <?php mfn_opts_show( 'color-h1', '#313131' ) ?>; }
	h2, h2 a { color: <?php mfn_opts_show( 'color-h2', '#313131' ) ?>; }
	h3, h3 a { color: <?php mfn_opts_show( 'color-h3', '#313131' ) ?>; }
	h4, h4 a { color: <?php mfn_opts_show( 'color-h4', '#313131' ) ?>; }
	h5, h5 a { color: <?php mfn_opts_show( 'color-h5', '#09526f' ) ?>; }
	h6, h6 a { color: <?php mfn_opts_show( 'color-h6', '#31373c' ) ?>; }
	

/* Menu color */

	#Header #menu > ul > li > a {
		color: <?php mfn_opts_show( 'color-menu-a', '#213442' ) ?>;
	}
	
	#Header #menu > ul > li > a span {
		color: <?php mfn_opts_show( 'color-menu-arrow', '#c5c4c4' ) ?>;
	}
	
	#Header #menu > ul > li.current-menu-item > a,
	#Header #menu > ul > li.current_page_item > a,
	#Header #menu > ul > li.current-menu-ancestor > a,
	#Header #menu > ul > li.current_page_ancestor > a {
		color: <?php mfn_opts_show( 'color-menu-a-active', '#629ac2' ) ?>;
	}
	
	#Header #menu > ul > li.current-menu-item > a span,
	#Header #menu > ul > li.current_page_item > a span,
	#Header #menu > ul > li.current-menu-ancestor > a span,
	#Header #menu > ul > li.current_page_ancestor > a span {
		color: <?php mfn_opts_show( 'color-menu-a-active', '#629ac2' ) ?>;
	}
	
	#Header #menu > ul > li > a:hover,
	#Header #menu > ul > li.hover > a {
		border-color: <?php mfn_opts_show( 'border-menu-a-hover', '#e5e5e5' ) ?>;	
	}
	
	#Header #menu > ul > li > a:hover span,
	#Header #menu > ul > li.hover > a span {
		color: <?php mfn_opts_show( 'color-menu-arrow-hover', '#053f57' ) ?>;
	}
	
	#Header #menu > ul > li.submenu > a:hover,
	#Header #menu > ul > li.submenu.hover > a {
		color: <?php mfn_opts_show( 'color-submenu-a', '#fff' ) ?>;
		background: <?php mfn_opts_show( 'background-submenu-a', '#53a3e0' ) ?>;
		border-color: <?php mfn_opts_show( 'background-submenu-a', '#53a3e0' ) ?>;
	}
	
	#Header #menu > ul > li ul {
		background: <?php mfn_opts_show( 'background-submenu-a', '#53a3e0' ) ?>;
	}
		
	#Header #menu > ul > li ul li a {
		color: <?php mfn_opts_show( 'color-submenu-a', '#fff' ) ?>;
		border-color: <?php mfn_opts_show( 'border-submenu-a', '#87bfe9' ) ?>;
	} 
	
	#Header #menu > ul > li ul li a:hover, 
	#Header #menu > ul > li ul li.hover > a {
		color: <?php mfn_opts_show( 'color-submenu-a-hover', '#bbedfc' ) ?>;
	}
	
/* Header addons */
	
	#Header .addons p.phone i,
	#Header .addons p.mail i {
		color: <?php mfn_opts_show( 'color-phone-ico', '#40464d' ) ?>;
	}
	
	#Header .addons p.phone {
		color: <?php mfn_opts_show( 'color-phone', '#5890ba' ) ?>;
	}
	
	#Header .addons p.phone span {
		color: <?php mfn_opts_show( 'color-phone-highlight', '#326e9b' ) ?>;
	}
	
/* Subheader */
	#Subheader {
		background-color: <?php mfn_opts_show( 'background-subheader', '#2a2f35' ) ?>;
		border-color: <?php mfn_opts_show( 'border-subheader', '#66a6d8' ) ?>;
	}

	#Subheader h1 { 
		color: <?php mfn_opts_show( 'color-subheader-title', '#fff' ) ?>;
	}
	
	#Subheader ul.breadcrumbs li,
	#Subheader ul.breadcrumbs li a { 
		color: <?php mfn_opts_show( 'color-subheader-text', '#d0e6eb' ) ?>;
	}
	
	#Subheader ul.breadcrumbs li span {
		color: <?php mfn_opts_show( 'color-subheader-arrow', '#4c90eb' ) ?>;
	}
	
/* Frames and borders color */

	.Recent_comments li, .Latest_posts li, .get_in_touch li.label, .pricing-box .plan-inside ul li, 
	.pricing-box, .ui-widget-header, #Content .ui-tabs .ui-tabs-nav, .ui-tabs .ui-tabs-panel,
	.ui-tabs .ui-tabs-nav li, .ui-accordion .ui-accordion-header, .ui-accordion .ui-accordion-content, 
	.gallery .gallery-item .gallery-icon, .post .footer,
	#comments .commentlist > li .photo, #comments .commentlist > li, 
	#comments .commentlist li .comment-body, .Twitter ul li, .Flickr .flickr_badge_image a,
	.single-post .post .date, .pager, .single-portfolio .photo,
	.single-portfolio .sp-inside .sp-inside-right, table thead th, table tbody td, .widget ul.menu li a,
	.widget_links ul li a, .widget_meta ul li a, .our-offer .boxes .box.first, .our-offer .boxes .box.last, .testimonial .rslides_tabs li a,
	.pager a.page, .team .links a.link, .offer .header, .offer .box, 
	blockquote div.text, .single-post .tag-cat {
		border-color: <?php mfn_opts_show( 'border-borders', '#ebebeb' ) ?>;
	}
	
/* Buttons */
	a.button, input[type="submit"], input[type="reset"], input[type="button"],
	.widget_mfn_clients a.rslides_nav, .offer a.Offer_slider_prev, .offer a.Offer_slider_next {
		color: <?php mfn_opts_show( 'color-button', '#326e9b' ) ?>;
	}
	
	a.button span, input[type="submit"] span, input[type="reset"] span, input[type="button"] span {
		color: <?php mfn_opts_show( 'color-button-arrow', '#9DD3E8' ) ?>;
	}
	

/* Go to top */
	#Footer a#back_to_top {
		color: <?php mfn_opts_show( 'color-gototop', '#000' ) ?>;
	}
	#Footer a:hover#back_to_top {
		color: <?php mfn_opts_show( 'color-gototop-hover', '#005274' ) ?>;
	}
	
/* Blog */
	.post .date {
		background: <?php mfn_opts_show( 'background-blog-date', '#73a7cf' ) ?>;
		color: <?php mfn_opts_show( 'color-blog-day', '#fff' ) ?>;
	}
	.post .desc .meta .year, .post .desc .meta i {
		color: <?php mfn_opts_show( 'color-blog-month', '#cce9ff' ) ?>;
	}
	.post .desc .meta .month {
		color: <?php mfn_opts_show( 'color-blog-year', '#385a75' ) ?>;
	}
	.post .desc .meta .comments, .post .desc .meta .comments a {
		background: <?php mfn_opts_show( 'background-blog-comments', '#326e9b' ) ?>;
		color: <?php mfn_opts_show( 'color-blog-comments', '#ddeffc' ) ?>;
	}
	
/* Footer headers and text */

	<?php if( mfn_opts_get('footer-layout','separate') == 'included' ): ?>
		#Footer { background: <?php mfn_opts_show( 'background-footer', '#FBFBFB' ) ?>;}
	<?php endif; ?>

	#Footer h1,
	#Footer h2,
	#Footer h3,
	#Footer h4,
	#Footer h5,
	#Footer h6  {
		color: <?php mfn_opts_show( 'color-footer-heading', '#2a2f35' ) ?>;
	}
	
	#Footer, 
	#Footer .bottom_addons .menu_bottom > ul > li > a { 
		color: <?php mfn_opts_show( 'color-footer-text', '#717171' ) ?>;
	}
	
	#Footer a,
	#Footer .bottom_addons .menu_bottom > ul > li.active > a { 
		color: <?php mfn_opts_show( 'color-footer-a', '#53a3e0' ) ?>;
	}
	
	#Footer a:hover,
	#Footer .bottom_addons .menu_bottom > ul > li > a:hover { 
		color: <?php mfn_opts_show( 'color-footer-a', '#53a3e0' ) ?>;
	}
	
/* Footer strong */
	#Footer .Twitter li span, #Footer .copy strong, #Footer .Latest_posts ul li a.title, 
	#Footer .Latest_posts ul li p i, #Footer .Recent_comments ul li p strong,
	#Footer .Recent_comments ul li p i, #Footer .widget_calendar caption, #Footer strong {
		color: <?php mfn_opts_show( 'color-footer-bold-note', '#2a2f35' ) ?>;
	}
	
/* Footer grey notes */
	#Footer .Twitter ul li > a, #Footer .Recent_comments li span.date, #Footer .Latest_posts span.date {
		color: <?php mfn_opts_show( 'color-footer-note', '#A6A6A6' ) ?>;
	}
	
/* Footer frames, background & border color */	
	#Footer .Twitter li, #Footer .Flickr .flickr_badge_image a, #Footer .Recent_comments ul li, 
	#Footer .Latest_posts ul li, #Footer .widget ul.menu li a, #Footer .widget_meta ul li a, 
	#Footer table thead th, #Footer table tbody td,
	.footer-included #Footer .container:first-child, .footer-included #Footer .container .column .widget {
		border-color: <?php mfn_opts_show( 'border-footer-frame', '#e4dddd' ) ?>;
	}
	
/* Footer Buttons */
	#Footer a.button, #Footer input[type="submit"], #Footer input[type="reset"], #Footer input[type="button"], #Footer .widget_mfn_clients a.rslides_nav {
		color: <?php mfn_opts_show( 'color-footer-button', '#326e9b' ) ?>;
	}
	
	#Footer a.button span, #Footer input[type="submit"] span, #Footer input[type="reset"] span, #Footer input[type="button"] span {
		color: <?php mfn_opts_show( 'color-footer-button-arrow', '#9DD3E8' ) ?>;
	}
	
/* Call to action */
	.call_to_action {
		background: <?php mfn_opts_show( 'background-call-to-action', '#326E9B' ) ?>;
	}
	
	.call_to_action h4 {
		color: <?php mfn_opts_show( 'color-call-to-action-text', '#fff' ) ?>;
	}
	
	.call_to_action h4 span {
		color: <?php mfn_opts_show( 'color-call-to-action-highlight', '#B7E8FF' ) ?>;
	}
	
	.call_to_action a.button {
		color: <?php mfn_opts_show( 'color-call-to-action-button', '#fff' ) ?> !important;
	}
	
/* Faq & Accordion & Tabs */
	.accordion, .faq, .ui-tabs {
		background: <?php mfn_opts_show( 'background-accordion-tabs', '#fbfbfb' ) ?> !important;
	}
	.accordion .question h5,.faq .question h5,
	.ui-tabs .ui-tabs-nav li a { 
		color: <?php mfn_opts_show( 'color-accordion-tabs', '#515e6d' ) ?>;
	}
	.faq .active h5, .accordion .active h5 {
		color: <?php mfn_opts_show( 'color-accordion-tabs-active', '#313131' ) ?>;
	}
	.ui-tabs .ui-tabs-nav li.ui-tabs-selected a, .ui-tabs .ui-tabs-nav li.ui-state-active a {
		color: <?php mfn_opts_show( 'color-accordion-tabs-active', '#313131' ) ?>;
		border-top: 4px solid <?php mfn_opts_show( 'border-tab-active', '#66A6D8' ) ?>;
	}
	.accordion .answer, .faq .answer, .faq .active h5, .accordion .active h5 {
		background: <?php mfn_opts_show( 'background-accordion-tabs-inner', '#fff' ) ?>;
	}
	.ui-tabs .ui-tabs-panel, .ui-tabs .ui-tabs-nav li.ui-tabs-selected a, .ui-tabs .ui-tabs-nav li.ui-state-active { 
		background-color: <?php mfn_opts_show( 'background-accordion-tabs-inner', '#fff' ) ?> !important; 
	}
	
/* Portfolio */	
	.portfolio_item a .ico i,
	.wp-caption .photo a i {
		color: <?php mfn_opts_show( 'color-portfolio-icon', '#3FA8D2' ) ?>;
	}
	
	.portfolio_item h6 {
		color: <?php mfn_opts_show( 'color-portfolio-text', '#09526F' ) ?>;
	}
	
/* What we offer */
	.offer h3 {
		color: <?php mfn_opts_show( 'color-offer-title', '#53a3e0' ) ?>;
	}
	
	.offer h2 {
		color: <?php mfn_opts_show( 'color-offer-subtitle', '#2a2f35' ) ?>;
	}
	
	.offer .box h5 a {
		color: <?php mfn_opts_show( 'color-offer-link', '#2a2f35' ) ?>;
	}
	
/* Content */
	.widget-area {
		background: <?php mfn_opts_show( 'background-sidebar', '#fcfcfc' ) ?>;
	}
	
/* Submenu */
	.widget ul.menu {
   		background: <?php mfn_opts_show( 'background-mfn-menu', '#FFFFFF' ) ?>;
   	}
	.widget ul.menu li a { 
		color: <?php mfn_opts_show( 'color-mfn-menu-link', '#475363' ) ?> !important;
	}
	.widget ul.menu li.current_page_item a, 
	.widget ul.menu li a:hover {
		color: <?php mfn_opts_show( 'color-mfn-menu-link-active', '#fff' ) ?> !important; 
		background: <?php mfn_opts_show( 'background-mfn-menu-link-active', '#3C95B8' ) ?> !important;	
	}
	
/* Slider */
	#mfn-offer-slider ul.slider-wrapper > li .slide-desc h2 {
		color: <?php mfn_opts_show( 'color-slider-title', '#fff' ) ?>;
	}
	#mfn-offer-slider ul.slider-wrapper > li .slide-desc p {
		color: <?php mfn_opts_show( 'color-slider-text', '#ddd' ) ?>;
	}
	#mfn-offer-slider ul.slider-wrapper > li .slide-desc .button {
		color: <?php mfn_opts_show( 'color-slider-button', '#fff' ) ?>;
	}
	