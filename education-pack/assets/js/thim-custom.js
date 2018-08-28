/**
 * Script custom for theme
 *
 * TABLE OF CONTENT
 *
 * Header: main menu
 * Header: main menu mobile
 * Sidebar: sticky sidebar
 * Feature: Preloading
 * Feature: Back to top
 * Custom select use Dropkickjs.
 */
(function ($) {
	"use strict";
	/**
	 * Check this site in iframe.
	 * @type {boolean}
	 */
	var isInIFrame = (window.location != window.parent.location);

	$(document).ready(function () {
		education_pack_frontend.ready();

		/* Search form menu right */
		$('.menu-right .button_search').on("click", function(){
			$('.menu-right .search-form').toggle(300);
			$('.menu-right input.search-field').focus();
		});

		/* Filter Gallery */
		$('.fancybox').fancybox();
	});

	$(window).load(function () {
		education_pack_frontend.load();
	});

	var education_pack_frontend = {

		/**
		 * Call functions when document ready
		 */
		ready: function () {
			this.header_menu();
			this.back_to_top();
			this.feature_preloading();
			this.sticky_sidebar();
			if (isInIFrame != true) {
				this.custom_select();
			}
			this.contactform7();
			this.thim_blog_auto_height();

			this.lp_switcher();
			this.learnpress_media_courses();
		},

		/**
		 * Call functions when window load.
		 */
		load: function () {
			this.header_menu_mobile();
			this.parallax();
			this.thim_post_gallery();
			this.thim_slider();
		},

		// CUSTOM FUNCTION IN BELOW
		thim_post_gallery: function () {
			$('article.format-gallery .flexslider').imagesLoaded(function () {
				$('.flexslider').flexslider({
					slideshow     : true,
					animation     : 'fade',
					pauseOnHover  : true,
					animationSpeed: 400,
					smoothHeight  : true,
					directionNav  : true,
					controlNav    : false
				});
			});
		},

		// CUSTOM SLIDER
		thim_slider: function () {
			$('.thim-slider').flexslider({
				animation     : 'slide',
				slideshow     : true,
				pauseOnHover  : true,
				animationSpeed: 400,
				smoothHeight  : true,
				directionNav  : true,
				controlNav    : false
			});
		},

		/**
		 * Mobile menu
		 */
		header_menu_mobile: function () {
			$(document).on('click', '.menu-mobile-effect', function (e) {
				e.stopPropagation();
				$('.responsive #wrapper-container').toggleClass('mobile-menu-open');
			});

			$(document).on('click', '.mobile-menu-open #main-content', function () {
				$('.responsive #wrapper-container.mobile-menu-open').removeClass('mobile-menu-open');
			});

			$('.navbar>li.menu-item-has-children >a,.navbar-nav>li.menu-item-has-children >span').after('<span class="icon-toggle"><i class="fa fa-caret-down"></i></span>');
			$('.responsive .mobile-menu-container .navbar-nav>li.menu-item-has-children >a').after('<span class="icon-toggle"><i class="fa fa-caret-down"></i></span>');

			$('.responsive .mobile-menu-container .navbar-nav>li.menu-item-has-children .icon-toggle').on('click', function () {
				if ($(this).next('ul.sub-menu').is(':hidden')) {
					$(this).next('ul.sub-menu').slideDown(200, 'linear');
					$(this).html('<i class="fa fa-caret-up"></i>');
				} else {
					$(this).next('ul.sub-menu').slideUp(200, 'linear');
					$(this).html('<i class="fa fa-caret-down"></i>');
				}
			});
		},

		/**
		 * Header menu sticky, scroll, v.v.
		 */
		header_menu: function () {
			var $header = $('#masthead.sticky-header'),
				$navigation = $('#masthead.sticky-header .navigation'),
				$header_v1 = $('#masthead.sticky-header .header-v1'),
				off_Top = ( $('#wrapper-container').length > 0 ) ? $('#wrapper-container').offset().top : 0,
				menuH = $header.outerHeight(),
				navH = $navigation.outerHeight(),
				latestScroll = 0,
				startFixed = 2;

			if ($header.length) {
				$header.css({
					'padding-bottom': navH
				});
				$navigation.css({
					'top': $header_v1.outerHeight()
				});
			}

			$(window).scroll(function () {
				var current = $(this).scrollTop();
				if (current > menuH) {
					$header.removeClass('affix-top').addClass('affix').removeClass('menu-show');
					$header.css({
						'padding-bottom': 0
					});
					$navigation.css({
						top: off_Top
					});
				} else {
					$header.removeClass('affix').addClass('affix-top').addClass('no-transition');
					$header.css({
						'padding-bottom': navH
					});
					$navigation.css({
						top: $header_v1.outerHeight()
					});
				}

				if (current > latestScroll && current > menuH * 2) {
					if (!$header.hasClass('menu-hidden')) {
						$header.addClass('menu-hidden').removeClass('menu-show').removeClass('no-transition');
						$navigation.css({
							top: off_Top
						});
					}
				} else {
					if ($header.hasClass('menu-hidden')) {
						$header.removeClass('menu-hidden').addClass('menu-show');
						$navigation.css({
							top: off_Top
						});
					}
				}

				latestScroll = current;
			});

			$('#masthead .navbar > .menu-item-has-children, .navbar > li ul li').hover(
				function () {
					$(this).children('.sub-menu').stop(true, false).slideDown(250);
				},
				function () {
					$(this).children('.sub-menu').stop(true, false).slideUp(250);
				}
			);
		},

		/**
		 * Back to top
		 */
		back_to_top: function () {
			var $element = $('#back-to-top');
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$element.addClass('scrolldown').removeClass('scrollup');
				} else {
					$element.addClass('scrollup').removeClass('scrolldown');
				}
			});

			$element.on('click', function () {
				$('html,body').animate({scrollTop: '0px'}, 800);
				return false;
			});
		},

		/**
		 * Sticky sidebar
		 */
		sticky_sidebar: function () {
			var offsetTop = 20;

			if ($("#wpadminbar").length) {
				offsetTop += $("#wpadminbar").outerHeight();
			}
			if ($("#masthead.affix").length) {
				offsetTop += $("#masthead.affix").outerHeight();
			}

			if ($('.sticky-sidebar').length > 0) {
				$("aside.sticky-sidebar").theiaStickySidebar({
					"containerSelector"     : "",
					"additionalMarginTop"   : offsetTop,
					"additionalMarginBottom": "0",
					"updateSidebarHeight"   : false,
					"minWidth"              : "768",
					"sidebarBehavior"       : "modern"
				});
			}

		},

		/**
		 * Parallax init
		 */
		parallax: function () {
			$(window).stellar({
				horizontalOffset: 0,
				verticalOffset  : 0
			});
		},

		/**
		 * feature: Preloading
		 */
		feature_preloading: function () {
			var $preload = $('#thim-preloading');
			if ($preload.length > 0) {
				$preload.fadeOut(1000, function () {
					$preload.remove();
				});
			}
		},


		/**
		 * Custom select use Dropkickjs
		 */
		custom_select: function () {
			$('select').dropkick({
				mobile: true,
				change: function () {
					var selectedIndex = this.selectedIndex;
					$(this.data.select).find('option').each(function (index, ele) {
						if (index === selectedIndex) {
							$(ele).attr('selected', 'selected');
						} else {
							$(ele).removeAttr('selected');
						}
					});
				}
			});
		},


		/**
		 * Custom effect and UX for contact form.
		 */
		contactform7: function () {
			$(".wpcf7-submit").on('click', function () {
				$(this).css("opacity", 0.2);
				$(this).parents('.wpcf7-form').addClass('processing');
				$('input:not([type=submit]), textarea').attr('style', '');
			});

			$(document).on('spam.wpcf7', function () {
				$(".wpcf7-submit").css("opacity", 1);
				$('.wpcf7-form').removeClass('processing');
			});

			$(document).on('invalid.wpcf7', function () {
				$(".wpcf7-submit").css("opacity", 1);
				$('.wpcf7-form').removeClass('processing');
			});

			$(document).on('mailsent.wpcf7', function () {
				$(".wpcf7-submit").css("opacity", 1);
				$('.wpcf7-form').removeClass('processing');
			});

			$(document).on('mailfailed.wpcf7', function () {
				$(".wpcf7-submit").css("opacity", 1);
				$('.wpcf7-form').removeClass('processing');
			});

			$('body').on('click', 'input:not([type=submit]).wpcf7-not-valid, textarea.wpcf7-not-valid', function () {
				$(this).removeClass('wpcf7-not-valid');
			});
		},


		/**
		 * Blog auto height
		 */
		thim_blog_auto_height: function () {
			var $blog = $('.blog-content article, .archive .blog-content article'),
				maxHeight = 0,
				setH = true;

			// Get max height of all items.
			$blog.each(function () {
				setH = $(this).hasClass('column-1') ? false : true;
				if (maxHeight < $(this).find('.content-inner').height()) {
					maxHeight = $(this).find('.content-inner').height();
				}
			});

			// Set height for all items.
			if (maxHeight > 0 && setH) {
				$blog.each(function () {
					$(this).find('.content-inner').css('height', maxHeight);
				});
			}
		},

		/**
		 * LearnPress switcher
		 */
		lp_switcher: function () {
			var cookie_name = $('.grid-list-switch').data('cookie');
			var courses_layout = $('.grid-list-switch').data('layout');
			var $list_grid = $('.grid-list-switch');

			if (cookie_name == 'lpr_course-switch') {
				var gridClass = 'course-grid';
				var listClass = 'course-list';
			} else {
				var gridClass = 'course-grid';
				var listClass = 'course-list';
			}

			var check_view_mod = function () {
				var activeClass = 'switcher-active';
				if ($list_grid.hasClass('has-layout')) {
					if (courses_layout == 'grid') {
						$('.archive_switch').removeClass(listClass).addClass(gridClass);
						$('.switchToGrid').addClass(activeClass);
						$('.switchToList').removeClass(activeClass);
					} else {
						$('.archive_switch').removeClass(gridClass).addClass(listClass);
						$('.switchToList').addClass(activeClass);
						$('.switchToGrid').removeClass(activeClass);
					}
				} else {
					if ($.cookie(cookie_name) == 'grid') {
						$('.archive_switch').removeClass(listClass).addClass(gridClass);
						$('.switchToGrid').addClass(activeClass);
						$('.switchToList').removeClass(activeClass);
					} else if ($.cookie(cookie_name) == 'list') {
						$('.archive_switch').removeClass(gridClass).addClass(listClass);
						$('.switchToList').addClass(activeClass);
						$('.switchToGrid').removeClass(activeClass);
					}
					else {
						$('.switchToList').addClass(activeClass);
						$('.switchToGrid').removeClass(activeClass);
						$('.archive_switch').removeClass(gridClass).addClass(listClass);
					}
				}
			}
			check_view_mod();

			var listSwitcher = function () {
				var activeClass = 'switcher-active';
				if ($list_grid.hasClass('has-layout')) {
					$('.switchToList').click(function () {
						$('.switchToList').addClass(activeClass);
						$('.switchToGrid').removeClass(activeClass);
						$('.archive_switch').fadeOut(300, function () {
							$(this).removeClass(gridClass).addClass(listClass).fadeIn(300);
						});
					});
					$('.switchToGrid').click(function () {
						$('.switchToGrid').addClass(activeClass);
						$('.switchToList').removeClass(activeClass);
						$('.archive_switch').fadeOut(300, function () {
							$(this).removeClass(listClass).addClass(gridClass).fadeIn(300);
						});
					});
				} else {
					$('.switchToList').click(function () {
						if (!$.cookie(cookie_name) || $.cookie(cookie_name) == 'grid') {
							switchToList();
						}
					});
					$('.switchToGrid').click(function () {
						if (!$.cookie(cookie_name) || $.cookie(cookie_name) == 'list') {
							switchToGrid();
						}
					});
				}

				function switchToList() {
					$('.switchToList').addClass(activeClass);
					$('.switchToGrid').removeClass(activeClass);
					$('.archive_switch').fadeOut(300, function () {
						$(this).removeClass(gridClass).addClass(listClass).fadeIn(300);
						$.cookie(cookie_name, 'list', {expires: 3, path: '/'});
					});
				}

				function switchToGrid() {
					$('.switchToGrid').addClass(activeClass);
					$('.switchToList').removeClass(activeClass);
					$('.archive_switch').fadeOut(300, function () {
						$(this).removeClass(listClass).addClass(gridClass).fadeIn(300);
						$.cookie(cookie_name, 'grid', {expires: 3, path: '/'});
					});
				}
			}
			listSwitcher();

		},

		learnpress_media_courses: function () {
			$('.media-link').magnificPopup({
				type: 'iframe',
			});
			$('.media-iframe').magnificPopup({
				type    : 'inline',
				midClick: true
			});
		},
	};

})(jQuery);