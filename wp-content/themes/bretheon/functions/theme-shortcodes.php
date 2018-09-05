<?php
/**
 * Shortcodes.
 *
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Shortcode [one] [/one]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one' ) )
{
	function sc_one( $attr, $content = null )
	{
		$output  = '<div class="column one">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_second] [/one_second]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_second' ) )
{
	function sc_one_second( $attr, $content = null )
	{
		$output  = '<div class="column one-second">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_third] [/one_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_third' ) )
{
	function sc_one_third( $attr, $content = null )
	{
		$output  = '<div class="column one-third">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [two_third] [/two_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_third' ) )
{
	function sc_two_third( $attr, $content = null )
	{
		$output  = '<div class="column two-third">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_fourth] [/one_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_fourth' ) )
{
	function sc_one_fourth( $attr, $content = null )
	{
		$output  = '<div class="column one-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [two_fourth] [/two_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_fourth' ) )
{
	function sc_two_fourth( $attr, $content = null )
	{
		$output  = '<div class="column two-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [three_fourth] [/three_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_three_fourth' ) )
{
	function sc_three_fourth( $attr, $content = null )
	{
		$output  = '<div class="column three-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [call_to_action]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_call_to_action' ) )
{
	function sc_call_to_action( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'text' => '',
			'btn_title' => '',
			'btn_link' => '',
			'class' => '',
		), $attr));
		
		$output = '<div class="call_to_action">';
			$output .= '<div class="inside">';
				$output .= '<h4>'. $text .'</h4>';
				if( $btn_link ) $output .= '<a href="'. $btn_link .'" class="button button_large '. $class .'">'. $btn_title .'</a>';			
			$output .= '</div>';
		$output .= '</div>'."\n";
			
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [code] [/code]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_code' ) )
{
	function sc_code( $attr, $content = null )
	{
		$output  = '<div class="inner-padding">';
			$output .= '<pre>';
				$output .= do_shortcode(htmlspecialchars($content));
			$output .= '</pre>'."\n";
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [article_box] [/article_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_article_box' ) )
{
	function sc_article_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' => '',
			'background' => '',
			'title' => '',
			'slogan' => '',
			'link_title' => '',
			'link' => '',
			'target' => '',
		), $attr));
		
		if( $target ){
			$target = 'target="_blank"'; 
		} else { 
			$target = false;
		}
		
		$output = '<div class="article_box">';
			$output .= '<div class="photo">';
				$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
			$output .= '</div>';
			$output .= '<div class="desc '. $background .'">';
				$output .= '<h6>'. $slogan .'</h6>';
				$output .= '<h3>'. $title .'</h3>';
				if( $link ) $output .= '<a class="button" href="'. $link .'" '. $target .'>'. $link_title .' <span>&rarr;</span></a>';
			$output .= '</div>';
		$output .= '</div>'."\n";
			
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [contact_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_contact_box' ) )
{
	function sc_contact_box( $attr, $content = null )
	{
		
		extract(shortcode_atts(array(
			'title' => '',
			'address' => '',
			'telephone' => '',
			'email' => '',
			'twitter' => '',
		), $attr));
		
		$translate['contactbox-phone'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contactbox-phone','phone number:') : __('phone number:','bretheon');
		$translate['contactbox-address'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contactbox-address','our address:') : __('our address:','bretheon');
		$translate['contactbox-email'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contactbox-email','email address:') : __('email address:','bretheon');
		$translate['contactbox-twitter'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contactbox-twitter','twitter:') : __('twitter:','bretheon');
		
		$output = '<div class="get_in_touch inner-padding">';
			$output .= '<h3>'. $title .'</h3>';
			$output .= '<ul>';
				if( $telephone ){
					$output .= '<li class="label">'. $translate['contactbox-phone'] .'</li>';
					$output .= '<li class="phone"><i class="icon-phone"></i><p>'. $telephone .'</p></li>';
				}
				if( $address ){
					$output .= '<li class="label">'. $translate['contactbox-address'] .'</li>';
					$output .= '<li class="address"><i class="icon-map-marker"></i><p>'. $address .'</p></li>';
				}
				if( $email ){
					$output .= '<li class="label">'. $translate['contactbox-email'] .'</li>';
					$output .= '<li class="mail"><i class="icon-envelope-alt"></i><p><a href="mailto:'. $email .'">'. $email .'</a></p></li>';
				}
				if( $twitter ){
					$output .= '<li class="label">'. $translate['contactbox-twitter'] .'</li>';
					$output .= '<li class="twitter last"><i class="icon-twitter"></i><p><a href="http://twitter.com/'. $twitter .'" target="_blank">'. $twitter .'</a></p></li>';
				}
			$output .= '</ul>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [contact_form]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_contact_form' ) )
{
	function sc_contact_form( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'email' => '',
		), $attr));
		
		$translate['contact-name'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contact-name','Your name') : __('Your name','bretheon');
		$translate['contact-email'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contact-email','Your e-mail') : __('Your e-mail','bretheon');
		$translate['contact-subject'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contact-subject','Subject') : __('Subject','bretheon');
		$translate['contact-submit'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contact-submit','Send message') : __('Send message','bretheon');
		$translate['contact-message-success'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contact-message-success','Thanks, your email was sent.') : __('Thanks, your email was sent.','bretheon');
		$translate['contact-message-error'] = mfn_opts_get('translate') ? mfn_opts_get('translate-contact-message-error','Error sending email. Please try again later.') : __('Error sending email. Please try again later.','bretheon');
	
		$output = '<div class="inner-padding">';
			if( $title ) $output .= '<h3>'. $title .'</h3>';
			$output .= '<div class="contact_form">';
				$output .= '<form id="json_contact_form" method="POST" action="'. LIBS_URI .'/theme-mail.php">';
					$output .= '<input type="hidden" name="mfn_contact_nonce" value="'. wp_create_nonce('mfn-contact-nonce') .'" />';
					$output .= '<input type="hidden" name="To" value="'. $email .'" />';
					$output .= '<fieldset>';
						$output .= '<input id="Name" class="nick required" name="Name" placeholder="'. $translate['contact-name'] .'" type="text" />';
						$output .= '<input id="Email" class="email required" name="Email" placeholder="'. $translate['contact-email'] .'" type="text" />';
						$output .= '<input id="Subject" class="subject" name="Subject" placeholder="'. $translate['contact-subject'] .'" type="text" />';
						$output .= '<textarea id="Message" name="Message" class="required"></textarea>';
						$output .= '<input type="submit" value="'. $translate['contact-submit'] .'" />';
					$output .= '</fieldset>';
				$output .= '</form>';
				$output .= '<div class="alert_success" style="display:none;">'. $translate['contact-message-success'] .'</div>';
				$output .= '<div class="alert_error" style="display:none;">'. $translate['contact-message-error'] .'</div>';
			$output .= '</div>';
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [divider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_divider' ) )
{
	function sc_divider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'height' => '0',
			'line' => '',
		), $attr));
		
		$line = ( $line ) ? false : ' border:none; width:0;';		
		$output = '<hr style="margin: 0 0 '. intval($height) .'px;'. $line .'" />'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [portfolio]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_portfolio' ) )
{
	function sc_portfolio( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => 'Our recent works',
			'background' => '',
			'count' => '3',
			'link_title' => 'Check all',
			'link' => '',
			'size' => '1/1',
			'category' => '',
			'orderby' => 'menu_order',
			'order' => 'ASC',
		), $attr));
		
		$args = array( 
			'post_type' => 'portfolio',
			'posts_per_page' => intval($count),
			'paged' => -1,
			'orderby' => $orderby,
			'order' => $order,
			'ignore_sticky_posts' =>1,
		);
		if( $category ) $args['portfolio-types'] = $category;
		
		$query = new WP_Query();
		$query->query( $args );
		$post_count = $query->post_count;
		
		if ($query->have_posts())
		{
			$output  = '<div class="recent_works">';
				$output .= '<ul class="da-thumbs">';
	
					while ($query->have_posts())
					{
						$query->the_post();
						
						$output .= '<li>';
							$output .= '<a href="'. get_permalink() .'">';						
								$output .= get_the_post_thumbnail( null, 'portfolio-item', array('class'=>'scale-with-grid' ) );
								$output .= '<div>';
									$output .= '<span class="ico"><i class="icon-search"></i></span>';
									$output .= '<h6>'. the_title(false, false, false) .'</h6>';
								$output .= '</div>';
							$output .= '</a>';
						$output .= '</li>';
					}
			
					$output .= '<li class="header_li '. $background .'">';
						$output .= '<div class="header">';
							$output .= '<h3>'. $title .'</h3>';
							if( $link ) $output .= '<a class="button" href="'. $link .'">'. $link_title .' <span>&rarr;</span></a>';						
						$output .= '</div>';
					$output .= '</li>';
				
				$output .= '</ul>';
			$output .= '</div>'."\n";
		}
		wp_reset_query();
			
	   return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [pricing_item] [/pricing_item]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pricing_item' ) )
{
	function sc_pricing_item( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'price' => '',
			'currency' => '',
			'period' => '',
			'link_title' => '',
			'link' => '',
			'featured' => '',
		), $attr));
		
		if( $featured ){
			$featured = ' pricing-box-featured';
		} else {
			$featured = '';
		}
	
		$output = '<div class="pricing-box'. $featured .'">';
			$output .= '<div class="plan-header">';
				$output .= '<h3>'. $title .'</h3>';
				$output .= '<div class="price"><sup>'. $currency .'</sup>'. $price .'</div>';
			$output .= '</div>';
			$output .= '<div class="plan-inside">';
				$output .= do_shortcode($content);
			$output .= '</div>';
			if( $link ) $output .= '<div class="period"><center><a class="button button_large" href="'. $link .'">'. $link_title .'</a></center></div>';
		$output .= '</div>'."\n";
			
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [ico]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_ico' ) )
{
	function sc_ico( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'type' => '',
		), $attr));
		
		$output = '<i class="'. $type .'"></i>';
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [image]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_image' ) )
{
	function sc_image( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'src' => '',
			'alt' => '',
			'caption' => '',
			'align' => '',
			'link' => '',
			'link_image' => '',
			'link_type' => '',
			'target' => '',
			'border' => '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// border
		if( $border ){
			$border = ' border';
		} else {
			$border = ' no-border';
		}
		
		// align
		if( $align ) $align = ' align'. $align;
		
		// hoover icon
		if( $link_type == 'zoom' || $link_image )	{
			$class= 'fancybox';
			$link_type = 'icon-eye-open';
			$target = '';
		} else {
			$class = '';
			$link_type = 'icon-link';
		}
		
		// link
		if( $link_image ) $link = $link_image;
		
		if( $link )
		{
			$output  = '<div class="scale-with-grid wp-caption'. $align . $border .'">';
				$output .= '<div class="photo">';
					$output .= '<div class="photo_wrapper">';
						$output .= '<a href="'. $link .'" class="'. $class .'" '. $target .'>';
							$output .= '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" />';
							$output .= '<div class="mask"></div>';
	    					$output .= '<i class="'. $link_type .'"></i>';
						$output .= '</a>';
					$output .= '</div>';
				$output .= '</div>';
				if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';
			$output .= '</div>'."\n";
		}
		else 
		{
			$output  = '<div class="scale-with-grid wp-caption no-hover'. $align . $border .'">';
				$output .= '<div class="photo">';
					$output .= '<div class="photo_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" />';
					$output .= '</div>';
				$output .= '</div>';
				if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';
			$output .= '</div>'."\n";
		}
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [button]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_button' ) )
{
	function sc_button( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'size' => '',
			'color' => '',
			'title' => 'Read more',
			'link' => '',
			'target' => '',
		), $attr));
		
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
	
		$output = '<a class="button button_'. $size .' button_'. $color .'" href="'. $link .'" '. $target .'>'. $title .'</a>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [blockquote] [/blockquote]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blockquote' ) )
{
	function sc_blockquote( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'author' => '',
			'link' => '',
			'link_title' => '',
			'target' => '',
		), $attr));
		
		$output = '<div class="inner-padding">';
			$output .= '<blockquote>';
				$output .= '<div class="text"><p>'. do_shortcode($content) .'</p></div>';
				$output .= '<p class="author">'; 
					$output .= '<span>'. $author. '</span>';
					if( $link ){
						if( $target ){
							$target = 'target="_blank"';
						} else {
							$target = false;
						}
						$output .=', <a href="'. $link .'" '. $target .'><i class="icon-external-link"></i> '. $link_title .'</a>';
					}
				$output .= '</p>'; 
			$output .= '</blockquote>';	
		$output .= '</div>'."\n";	
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [offer_page]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_offer_page' ) )
{
	function sc_offer_page( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'orderby' => 'menu_order',
			'order' => 'ASC',
		), $attr));
	
		$args = array(
				'post_type' => 'offer',
				'posts_per_page' => -1,
				'paged' => -1,
				'orderby' => $orderby,
				'order' => $order,
				'ignore_sticky_posts' =>1,
		);
	
		$offer_query = new WP_Query();
		$offer_query->query( $args );
		$post_count = $offer_query->post_count;
		
		$side = array(
			0 => 'left',
			1 => 'right'
		);
	
		if ($offer_query->have_posts())
		{
			$output  = '<div class="offer-page">';
				$i = 0;
				while ($offer_query->have_posts())
				{
					$offer_query->the_post();
					
					$class = $side[ $i % 2 ];
					$output .= '<div class="offer-item offer-'. $class .'">';
						$output .= '<div class="photo">';
							$output .= get_the_post_thumbnail( null, 'offer-list', array('class'=>'scale-with-grid' ) );
						$output .= '</div>';
						$output .= '<div class="desc">';
							$output .= '<h3>'. the_title(false, false, false) .'</h3>';
							$output .= do_shortcode( get_the_content(false) );
						$output .= '</div>';
					$output .= '</div>';
					$output .= '<hr />';
					
					$i++;
				}
			$output .= '</div>'."\n";
		}
		wp_reset_query();
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [offer]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_offer' ) )
{
	function sc_offer( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'subtitle' => '',
			'page' => '',
			'count' => '-1',
			'orderby' => 'menu_order',
			'order' => 'ASC',
		), $attr));
		
		// page link
		if( $page ){
			$page_link = get_page_link( $page );
		} else {
			$page_link = false;
		}
		
		$args = array(
			'post_type' => 'offer',
			'posts_per_page' => intval($count),
			'paged' => -1,
			'orderby' => $orderby,
			'order' => $order,
			'ignore_sticky_posts' =>1,
		);
		
		$offer_query = new WP_Query();
		$offer_query->query( $args );
		$post_count = $offer_query->post_count;
		
		// post count
		if( $post_count <= 3 ){
			$post_count = 'offer-no-pager';
		} else {
			$post_count = false;
		}
		
		$output = '';
		if ($offer_query->have_posts())
		{
			$output .= '<div class="offer '. $post_count .'">';
		
				$output .= '<div class="column one-fourth">';
					$output .= '<div class="header">';
						$output .= '<h3>'. $title .'</h3>';
						$output .= '<h2>'. $subtitle .'</h2>';
					$output .= '</div>';
				$output .= '</div>';
				
				$output .= '<ul class="jcarousel-skin-tango">';
			
					while ($offer_query->have_posts())
					{
						$offer_query->the_post();
						
						// link to offer page or custom page
						if( get_post_meta( get_the_ID(), 'mfn-post-link', true ) ){
							// custom single offer page
							$link = get_post_meta( get_the_ID(), 'mfn-post-link', true );
						} else {
							// offer page
							$link = $page_link;
						}
						
						$output .= '<li class="column one-fourth">';
							$output .= '<div class="box">';
								$output .= '<div class="ico">';
									if( $link ) $output .= '<a href="'. $link .'">';
										$output .= get_the_post_thumbnail( null, 'offer-item', array('class'=>'scale-with-grid' ) );
									if( $link ) $output .= '</a>';
								$output .= '</div>';
								$output .= '<h5>';
									if( $link ) $output .= '<a href="'. $link .'">';
										$output .= the_title(false, false, false);
									if( $link ) $output .= '</a>';
								$output .= '</h5>';
								$output .= '<p>'. get_the_excerpt() .'</p>';
							$output .= '</div>';
						$output .= '</li>';
					}
					
				$output .= '</ul>';
				$output .= '<a href="#" class="Offer_slider_prev"><i class="icon-chevron-left"></i></a>';
				$output .= '<a href="#" class="Offer_slider_next"><i class="icon-chevron-right"></i></a>';
	
			$output .= '</div>'."\n";
		}
		wp_reset_query();
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [our_team]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_our_team' ) )
{
	function sc_our_team( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' => '',	
			'title' => '',
			'subtitle' => '',
			'email' => '',
			'facebook' => '',
			'twitter' => '',
			'linkedin' => '',
		), $attr));
		
		$skin = mfn_opts_get('skin','blue');
		if( $skin == 'custom' ){
			$skin = 'blue';
		}
		
		$output = '<div class="team">';
			$output .= '<div class="photo">';
				$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
				$output .= '<div class="links">';
					if( $email ) $output .= '<a target="_blank" class="link link_1" href="mailto:'. $email .'"><i class="icon-envelope"></i></a>';
					if( $facebook ) $output .= '&nbsp;<a target="_blank" class="link link_2" href="'. $facebook .'"><i class="icon-facebook"></i></a>';
					if( $twitter ) $output .= '&nbsp;<a target="_blank" class="link link_3" href="'. $twitter .'"><i class="icon-twitter"></i></a>';
					if( $linkedin ) $output .= '&nbsp;<a target="_blank" class="link link_4" href="'. $linkedin .'"><i class="icon-linkedin"></i></a>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<h4>'. $title .'</h4>';
			$output .= '<p>'. $subtitle .'</p>';
		$output .= '</div>'."\n";	
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [map]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_map' ) )
{
	function sc_map( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'lat' => '',
			'lng' => '',
			'height' => 200,
			'zoom' => 13,
			'uid' => uniqid(),
		), $attr));
		
		if( $api_key = trim( mfn_opts_get( 'google-maps-api-key' ) ) ){
			$api_key = '?key='. $api_key;
		}
		
		wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js'. $api_key, false, null, true );
		
		$output = '<script>';
			//<![CDATA[
			$output .= 'function google_maps_'. $uid .'(){';
				$output .= 'var latlng = new google.maps.LatLng('. $lat .','. $lng .');';
				$output .= 'var myOptions = {';
					$output .= 'zoom: '. intval($zoom) .',';
					$output .= 'center: latlng,';
					$output .= 'zoomControl: true,';
					$output .= 'mapTypeControl: false,';
					$output .= 'streetViewControl: false,';
					$output .= 'scrollwheel: false,';       
					$output .= 'mapTypeId: google.maps.MapTypeId.ROADMAP';
				$output .= '};';
		
				$output .= 'var map = new google.maps.Map(document.getElementById("google-map-area-'. $uid .'"), myOptions);';
				$output .= 'var marker = new google.maps.Marker({';
					$output .= 'position: latlng,';
					$output .= 'map: map,';
				$output .= '});';
			$output .= '}';
		
			$output .= 'jQuery(document).ready(function($){';
				$output .= 'google_maps_'. $uid .'();';
			$output .= '});';	
			//]]>
		$output .= '</script>'."\n";
	
		$output .= '<div id="google-map-area-'. $uid .'" style="width:100%; height:'. intval($height) .'px;">&nbsp;</div>'."\n";	
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [tabs] [/tabs]
 * --------------------------------------------------------------------------- */
global $tabs_array, $tabs_count;
if( ! function_exists( 'sc_tabs' ) )
{
	function sc_tabs( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		extract(shortcode_atts(array(
			'uid' => uniqid(),
			'tabs' => '',
		), $attr));	
		do_shortcode( $content );
		
		// content builder
		if( $tabs ){
			$tabs_array = $tabs;
		}
		
		if( is_array( $tabs_array ) )
		{
			$output  = '<div class="jq-tabs">';
			$output .= '<ul>';
			
			$i = 1;
			$output_tabs = '';
			foreach( $tabs_array as $tab )
			{
				$output .= '<li><a href="#tab-'. $uid .'-'. $i .'">'. $tab['title'] .'</a></li>';
				$output_tabs .= '<div id="tab-'. $uid .'-'. $i .'">'. do_shortcode( $tab['content'] ) .'</div>';
				$i++;
			}
			
			$output .= '</ul>';
			$output .= $output_tabs;
			$output .= '</div>';
			
			$tabs_array = '';
			$tabs_count = 0;
	
			return $output;
		}
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [tab] [/tab]
 * --------------------------------------------------------------------------- */
$tabs_count = 0;
if( ! function_exists( 'sc_tab' ) )
{
	function sc_tab( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		extract(shortcode_atts(array(
			'title' => 'Tab title',
		), $attr));
		
		$tabs_array[] = array(
			'title' => $title,
			'content' => do_shortcode( $content )
		);	
		$tabs_count++;
	
		return true;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [accordion] [/accordion]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_accordion' ) )
{
	function sc_accordion( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' => '',
			'tabs' => '',
		), $attr));
		
		$output  = '<div class="mfn-acc accordion">';
		
		if( is_array( $tabs ) ){
			// content builder
			foreach( $tabs as $tab ){
				$output .= '<div class="question">';
					$output .= '<h5>'. $tab['title'] .'</h5>';
					$output .= '<div class="answer">';
						$output .= do_shortcode($tab['content']);	
					$output .= '</div>';
				$output .= '</div>'."\n";
			}
		} else {
			// shortcode
			$output .= do_shortcode($content);	
		}
		
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [faq] [/faq]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_faq' ) )
{
	function sc_faq( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' => '',
			'tabs' => '',
		), $attr));
		
		$output  = '<div class="mfn-acc faq">';
		
		if( is_array( $tabs ) ){
			// content builder
			foreach( $tabs as $tab ){
				$output .= '<div class="question">';
					$output .= '<h5>'. $tab['title'] .'</h5>';
					$output .= '<div class="answer">';
						$output .= do_shortcode($tab['content']);	
					$output .= '</div>';
				$output .= '</div>'."\n";
			}
		} else {
			// shortcode
			$output .= do_shortcode($content);	
		}
		
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [vimeo]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_vimeo' ) )
{
	function sc_vimeo( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'width' => '710',
			'height' => '426',
			'video' => '',
		), $attr));
		
		$output  = '<div class="article_video">';
		$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="http://player.vimeo.com/video/'. $video .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'."\n";
		$output .= '</div>';
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [youtube]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_youtube' ) )
{
	function sc_youtube( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'width' => '710',
			'height' => '426',
			'video' => '',
		), $attr));
		
		$output  = '<div class="article_video">';
		$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="http://www.youtube.com/embed/'. $video .'" frameborder="0" allowfullscreen></iframe>'."\n";
		$output .= '</div>';
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [clients]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_clients' ) )
{
	function sc_clients( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' => -1,
		), $attr));
		
		if( ! intval($count) ) $count = -1;
		$args = array( 
			'post_type' => 'client',
			'posts_per_page' => $count,
			'orderby' => 'menu_order',
			'order' => 'ASC',
		);
		
		$query = new WP_Query();
		$query->query( $args );
		
		$output = '';
		if ($query->have_posts())
		{
			$output .= '<ul class="clients">';
			while ($query->have_posts())
			{
				$query->the_post();			
				$output .= '<li>';			
					$link = get_post_meta(get_the_ID(), 'mfn-post-link', true);
					if( $link ) $output .= '<a href="'. $link .'" title="'. the_title(false, false, false) .'" target="_blank">';
						$output .= get_the_post_thumbnail( null, '190x110' );
					if( $link ) $output .= '</a>';	
				$output .= '</li>';
			}
			$output .= '</ul>'."\n";
		}
		wp_reset_query();
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [latest_posts]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_latest_posts' ) )
{
	function sc_latest_posts( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'category' => '',
			'count' => 3,
		), $attr));
	
		$args = array(
			'posts_per_page' => $count ? intval($count) : 0,
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true
		);
		if( $category ) $args['category_name'] = $category;
	
		$r = new WP_Query( apply_filters( 'widget_posts_args', $args ) );
	
		$output  = '<div class="Latest_posts">';
		$output .= '<h4>'. $title .'</h4>';
	
		if ($r->have_posts()){
			$output .= '<ul>';
				
			while ( $r->have_posts() ){
				$r->the_post();
					
				$output .= '<li>';
					if( has_post_thumbnail( get_the_ID() ) ){
						$output .= '<div class="photo">';
							$output .= get_the_post_thumbnail( get_the_ID(), 'blog-widget' );
							$output .= '<span class="comments">'. get_comments_number() .'</span>';
						$output .= '</div>';
					}
					if( has_post_thumbnail( get_the_ID() ) ) $output .= '<div class="desc">'; else $output .= '<div class="desc no_img">';
						$output .= '<h6><a class="title" href="'. get_permalink() .'">'. get_the_title() .'</a></h6>';
						$output .= '<span class="date"><i class="icon-calendar"></i> '. get_the_time('F j, Y') .'</span>';
					$output .= '</div>';
				$output .= '</li>';
					
			}
			wp_reset_postdata();
			$output .= '</ul>';
		}
	
		$output .= '</div>'."\n";
	
		return $output;
	}
}


// column shortcodes --------------------
add_shortcode( 'one', 'sc_one' );
add_shortcode( 'one_second', 'sc_one_second' );
add_shortcode( 'one_third', 'sc_one_third' );
add_shortcode( 'two_third', 'sc_two_third' );
add_shortcode( 'one_fourth', 'sc_one_fourth' );
add_shortcode( 'two_fourth', 'sc_two_fourth' );
add_shortcode( 'three_fourth', 'sc_three_fourth' );

// builder items --------------------
add_shortcode( 'blockquote', 'sc_blockquote' );
add_shortcode( 'call_to_action', 'sc_call_to_action' );
add_shortcode( 'code', 'sc_code' );
add_shortcode( 'contact_box', 'sc_contact_box' );
add_shortcode( 'divider', 'sc_divider' );
add_shortcode( 'map', 'sc_map' );
add_shortcode( 'our_team', 'sc_our_team' );

// content shortcodes -------------------
add_shortcode( 'button', 'sc_button' );
add_shortcode( 'ico', 'sc_ico' );
add_shortcode( 'image', 'sc_image' );
add_shortcode( 'vimeo', 'sc_vimeo' );
add_shortcode( 'youtube', 'sc_youtube' );

?>