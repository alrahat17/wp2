/*
@Name:		Horizontal multilevel menu
@Author:    Muffin Group
@WWW:       www.muffingroup.com
@Version:   1.2.5 - fixed ipad hover
*/

(function($){
	$.fn.extend({
		muffingroup_menu: function(options) {
			
			var defaults = {
				delay       : 50,
				hoverClass  : 'hover',
				arrows      : true,
				animation   : 'fade',
				addLast		: true
			};
			
			options = $.extend(defaults, options);
			
			var menu = $(this);
			menu.find("li:has(ul)").addClass("submenu");		

			if(options.arrows) {
				menu.find("li ul li:has(ul) > a").append("<span style='display: block; position: absolute; right: 10px; top: 7px; font-size: 11px;'><i class='icon-caret-right'></i></span>");
			}

			menu.find("li").hover(function() {
				
				$(this).has('ul').addClass(options.hoverClass);
				
				if (options.animation === "fade") {
					$(this).children("ul").stop(true,true).fadeIn(options.delay);
				} else if (options.animation === "toggle") {
					$(this).children("ul").stop(true,true).slideDown(options.delay);
				}
				
			}, function(){
				
				$(this).has('ul').removeClass(options.hoverClass);
				
				if (options.animation === "fade") {
					$(this).children("ul").stop(true,true).fadeOut(options.delay);
				} else if (options.animation === "toggle") {
					$(this).children("ul").stop(true,true).slideUp(options.delay);
				}
				
			});
			
			if(options.addLast) {
				$("> li:last-child", menu)
					.addClass("last")
					.prev()
						.addClass("last")
						.prev()
							.addClass("last");
				$(".submenu ul li:last-child", menu).addClass("last-item");
			}
			
			menu.find("> li.submenu > a").append("<span style='display: block; position: absolute; right: 5px; top: 8px; font-size: 11px;'><i class='icon-caret-down'></i></span>");
	
		}
	});
})(jQuery);