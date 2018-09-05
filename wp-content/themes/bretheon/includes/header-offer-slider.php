<?php 
$slide_args = array( 
	'post_type' => 'slide',
	'posts_per_page' => -1,
   'orderby' => 'menu_order',
	'order' => 'ASC',
);
$slide_query = new WP_Query();
$slide_query->query( $slide_args );

$slide_post_count = $slide_query->post_count;
// print_r($slide_query);
?>

<!-- #mfn-offer-slider -->
<div id="mfn-offer-slider">
	<div class="container">	
		<div class="sixteen columns">
			<ul class="slider-wrapper">
				
				<?php 
					if ($slide_query->have_posts()) :
					while ($slide_query->have_posts()) :
					$slide_query->the_post();
					
					$slide_classes 	= get_post_meta($post->ID, 'mfn-slide-position', true);
					$slide_classes .= ' '. get_post_meta($post->ID, 'mfn-slide-background', true);
				?>
			
					<li class="<?php echo $slide_classes; ?>">
					
						<div class="slide-wrap slide-img">
							<?php 
								if( $video_id = get_post_meta($post->ID, 'mfn-slide-video_vimeo', true) ) {
									echo '<iframe style="float: none; vertical-align: middle;" class="img scale-with-grid" src="http://player.vimeo.com/video/'. trim($video_id) .'?title=0&byline=0&portrait=0" frameborder="0"></iframe>';
								} elseif( $video_id = get_post_meta($post->ID, 'mfn-slide-video_youtube', true) ) {
									echo '<iframe style="float: none; vertical-align: middle;" class="img scale-with-grid" src="http://www.youtube.com/embed/'. trim($video_id) .'?wmode=opaque&rel=0" frameborder="0"></iframe>';
								} else {
									the_post_thumbnail( 'offer-slider', array('class'=>'img scale-with-grid' ));
								}
							?>
						</div>
						
						<div class="slide-wrap slide-desc">
							<?php if( get_the_title() ) echo '<h2>'. get_the_title() .'</h2>'; ?>
							<?php if( $slide_text = get_post_meta($post->ID, 'mfn-slide-text', true) ) echo '<p>'. $slide_text .'</p>'; ?>
							<?php 
								if( $slide_link = get_post_meta($post->ID, 'mfn-slide-link', true) ):
									echo '<a class="button" href="'. $slide_link .'">'. str_replace( " ", "&nbsp;", get_post_meta( $post->ID, 'mfn-slide-link_title', true ) ) .'&nbsp;<span>&rarr;</span></a>';
								endif;
							?>
						</div>
					
					</li>
					
				<?php 
					endwhile;
					endif;
					wp_reset_query();
				?>	
			
			</ul>
		</div>
	</div>
</div>
