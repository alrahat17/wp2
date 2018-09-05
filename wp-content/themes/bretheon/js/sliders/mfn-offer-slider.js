if ( typeof( mfn_slider_args )==='undefined' ) { var mfn_slider_args = [];}
var mfn_slider_timeout = ( mfn_slider_args.timeout ) ? mfn_slider_args.timeout : 5000;
var mfn_slider_auto = ( mfn_slider_args.auto ) ? true : false;
var mfn_slider_pause = ( mfn_slider_args.pause ) ? true : false;

function MfnSlider(){
	
	var slider = jQuery('#mfn-offer-slider ul.slider-wrapper');
	slider.css('visibility','visible');	
	
	slider.responsiveSlides({
		auto: mfn_slider_auto,
		speed: 0,
		timeout: mfn_slider_timeout,
		pager: false,
		nav: true,
		pause: mfn_slider_pause,
		pauseControls: mfn_slider_pause,
		before: before,
		after: after
	});
		
	function before(){
		slider.find('.slide-left-img .slide-img .img').css({'display':'none', 'margin-left':-580});		
		slider.find('.slide-left-img .slide-desc h2').css({'display':'none', 'margin-left':480});
		slider.find('.slide-left-img .slide-desc p').css({'display':'none', 'margin-left':480});
		slider.find('.slide-left-img .slide-desc a.button').css({'display':'none', 'margin-left':940});
		
		slider.find('.slide-right-img .slide-img .img').css({'display':'none', 'margin-left':580});		
		slider.find('.slide-right-img .slide-desc h2').css({'display':'none', 'margin-left':-480});
		slider.find('.slide-right-img .slide-desc p').css({'display':'none', 'margin-left':-480});
		slider.find('.slide-right-img .slide-desc a.button').css({'display':'none', 'margin-left':-940});
	}
	
	function after(){
		slider.find('.slide-img .img').css({'display':'inline'}).stop().animate({'margin-left':0}, 600);
		slider.find('.slide-desc h2').css({'display':'block'}).stop().delay(150).animate({'margin-left':0}, 500);
		slider.find('.slide-desc p').css({'display':'block'}).stop().delay(300).animate({'margin-left':0}, 400);
		slider.find('.slide-desc a.button').css({'display':'inline-block'}).stop().delay(300).animate({'margin-left':0}, 450);
	}

}
	
jQuery(document).ready(function(){	
	new MfnSlider();
});