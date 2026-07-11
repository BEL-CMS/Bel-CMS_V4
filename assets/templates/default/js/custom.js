jQuery(document).ready(function($) {
	
	/* Menu */
	
	jQuery(".navigation  ul li ul").parent("li").addClass("parent-list");
	jQuery(".parent-list").find("a:first").append(" <span class='menu-nav-arrow'><i class='icon-angle-down'></i></span>");
	
	jQuery(".navigation ul a").removeAttr("title");
	jQuery(".navigation ul ul").css({display: "none"});
	jQuery(".navigation ul li").each(function() {	
		var sub_menu = jQuery(this).find("ul:first");
		jQuery(this).hover(function() {	
			sub_menu.stop().css({overflow:"hidden", height:"auto", display:"none", paddingTop:0}).slideDown(250, function() {
				jQuery(this).css({overflow:"visible", height:"auto"});
			});	
		},function() {	
			sub_menu.stop().slideUp(250, function() {	
				jQuery(this).css({overflow:"hidden", display:"none"});
			});
		});	
	});
	
	/* Header fixed */
	
	var aboveHeight   = jQuery("#header").outerHeight();
	var fixed_enabled = jQuery("#wrap").hasClass("fixed-enabled");
	if(fixed_enabled){
		jQuery(window).scroll(function(){
			if(jQuery(window).scrollTop() > aboveHeight ){
				jQuery("#header").css({"top":"0"}).addClass("fixed-nav");
			}else{
				jQuery("#header").css({"top":"auto"}).removeClass("fixed-nav");
			}
		});
	}else {
		jQuery("#header").removeClass("fixed-nav");
	}
	
	/* Header and footer fix mobile */
	
	jQuery(window).bind("resize", function () {
		if (jQuery(this).width() > 990) {
			jQuery(".navigation_mobile_main").addClass("navigation");
			jQuery(".navigation").removeClass("navigation_mobile");
			jQuery(".navigation").find(".navigation_mobile_click").remove();
		}else {
			jQuery(".navigation").addClass("navigation_mobile");
			jQuery(".navigation").addClass("navigation_mobile_main");
			jQuery(".navigation_mobile").removeClass("navigation");
			jQuery(".navigation_mobile").each(function () {
				if (!jQuery(this).find(".navigation_mobile_click").length) {
					jQuery(this).prepend("<div class='navigation_mobile_click'>Go to...</div>");
				}
			});
		}
		if (jQuery(this).width() < 465) {
			jQuery(".social_icons").each(function () {
				if (jQuery(this).find("li").length > 10) {
					jQuery(this).find("li i").addClass("font11");
					jQuery(this).find("li i").removeClass("font17");
				}
			});
		}else {
			jQuery(".social_icons").each(function () {
				if (jQuery(this).find("li").length > 10) {
					jQuery(this).find("li i").addClass("font17");
					jQuery(this).find("li i").removeClass("font11");
				}
			});
		}
		
		if (jQuery(this).width() < 767) {
			jQuery(".panel-pop").each(function () {
				var panel_pop = jQuery(this);
				var panel_width = panel_pop.outerWidth();
				panel_pop.css("margin-left","-"+panel_width/2+"px");
			});
		}
	});
	
	if (jQuery(this).width() < 767) {
		jQuery(".panel-pop").each(function () {
			var panel_pop = jQuery(this);
			var panel_width = panel_pop.outerWidth();
			panel_pop.css("margin-left","-"+panel_width/2+"px");
		});
	}
	
	if (jQuery(window).width() < 465) {
		jQuery(".social_icons").each(function () {
			if (jQuery(this).find("li").length > 10) {
				jQuery(this).find("li i").addClass("font11");
				jQuery(this).find("li i").removeClass("font17");
			}
		});
	}else {
		jQuery(".social_icons").each(function () {
			if (jQuery(this).find("li").length > 10) {
				jQuery(this).find("li i").addClass("font17");
				jQuery(this).find("li i").removeClass("font11");
			}
		});
	}
	
	if (jQuery(window).width() > 990) {
		jQuery(".navigation_mobile_main").addClass("navigation");
		jQuery(".navigation").removeClass("navigation_mobile");
		jQuery(".navigation").find(".navigation_mobile_click").remove();
	}else {
		jQuery(".navigation").addClass("navigation_mobile");
		jQuery(".navigation").addClass("navigation_mobile_main");
		jQuery(".navigation_mobile").removeClass("navigation");
		jQuery(".navigation_mobile").each(function () {
			if (!jQuery(this).find(".navigation_mobile_click").length) {
				jQuery(this).prepend("<div class='navigation_mobile_click'>Go to...</div>");
			}
		});
	}
	
	if (jQuery(".navigation_mobile_click").length) {
		jQuery(".navigation_mobile_click").click(function() {
			if (jQuery(this).hasClass("navigation_mobile_click_close")) {
				jQuery(this).next().slideUp(500);
				jQuery(this).removeClass("navigation_mobile_click_close");
			}else {
				jQuery(this).next().slideDown(500);
				jQuery(this).addClass("navigation_mobile_click_close");
			}
		});
	}
	
	/* Go up */
	
	jQuery(window).scroll(function () {
		if(jQuery(this).scrollTop() > 100 ) {
			jQuery(".go-up").css("right","20px");
		}else {
			jQuery(".go-up").css("right","-60px");
		}
	});
	jQuery(".go-up").click(function(){
		jQuery("html,body").animate({scrollTop:0},500);
		return false;
	});
	
	/* Icon boxes */
		
	/* Divider */
	
	jQuery(".divider").each(function () {
		var divider = jQuery(this);
		var divider_color = divider.attr("divider_color");
		
		divider.css({"border-bottom-color":divider_color});
	});
	
	jQuery(window).load(function() {
		jQuery(".loader").fadeOut(500);
	});
	
	/* Widget Menu jQuery */
	
	jQuery(".widget_menu.widget_menu_jquery").each(function () {
		var widget_menu_jquery = jQuery(this);
		var sidebar_w = widget_menu_jquery.parent().width();
		widget_menu_jquery.css({"width":sidebar_w});
	});
	
	jQuery(window).bind("resize", function () {
		if (jQuery(this).width() > 800) {
			jQuery(".widget_menu.widget_menu_jquery").each(function () {
				var widget_menu_jquery = jQuery(this);
				var sidebar_w = widget_menu_jquery.parent().width();
				widget_menu_jquery.css({"width":sidebar_w});
			});
		}
	});
	
	jQuery.fn.scrollBottom = function() {
	    return jQuery(document).height() - this.scrollTop() - this.height();
	};
	
	var $widget_menu = jQuery(".widget_menu_jquery");
	var $window = jQuery(window);
	//var top = $widget_menu.parent().position().top;
	
	var header = parseFloat(jQuery("#header-top").outerHeight()+jQuery("#header").outerHeight()+jQuery(".breadcrumbs").outerHeight()+70);
	var footer = parseFloat(jQuery("#footer").outerHeight()+jQuery("#footer-bottom").outerHeight()+80);
	
	$window.bind("scroll resize", function() {
	    var gap = $window.height() - $widget_menu.height()+40;
	    var visibleHead = header - $window.scrollTop();
	    var visibleFoot = footer - $window.scrollBottom();
	    var scrollTop = $window.scrollTop();
	    
	    if (scrollTop < header) {
	        $widget_menu.css({
	            top: visibleHead + "px",
	            bottom: "auto"
	        });
	    }else if (visibleFoot > $window.height() - $widget_menu.height()) {
	        $widget_menu.css({
	            top: "auto",
	            bottom: visibleFoot + "px"
	        });
	    }else {
	    	if (jQuery("#wrap").hasClass("fixed-enabled")) {
	            $widget_menu.css({
	                top: parseFloat(jQuery(".fixed-nav").outerHeight()+40),
	                bottom: "auto"
	            });
	        }else {
	        	$widget_menu.css({
	        	    top: "40px",
	        	    bottom: "auto"
	        	});
	        }
	    }
	}).scroll();
	

	
});