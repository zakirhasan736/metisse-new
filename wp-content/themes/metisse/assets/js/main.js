/***************************************************
==================== JS INDEX ======================
****************************************************
01. PreLoader Js
02. Mobile Menu Js
03. Common Js
04. Menu Controls JS
05. Offcanvas Js
06. Search Js
07. cartmini Js
08. filter
09. Body overlay Js
10. Sticky Header Js
11. Theme Settings Js
12. Nice Select Js
13. Smooth Scroll Js
14. Slider Activation Area Start
15. Masonary Js
16. Wow Js
17. Counter Js
18. InHover Active Js
19. Line Animation Js
20. Video Play Js
21. Password Toggle Js
****************************************************/

(function ($) {
	"use strict";

	var windowOn = $(window);
	////////////////////////////////////////////////////
	// 01. PreLoader Js
	windowOn.on('load', function () {
		$("#loading").fadeOut(500);
	});


	////////////////////////////////////////////////////
	// 03. Common Js

	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});

	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	});

	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));
	});

	$("[data-text-color]").each(function () {
		$(this).css("color", $(this).attr("data-text-color"));
	});
	
	$("[data-padding-top]").each(function () {
        $(this).css("padding-top", $(this).attr("data-padding-top"));
    });

	$("[data-padding-bottom]").each(function () {
        $(this).css("padding-bottom", $(this).attr("data-padding-bottom"));
    });

	$(".has-img").each(function () {
		var imgSrc = $(this).attr("data-menu-img");
		var img = `<img class="mega-menu-img" src="${imgSrc}" alt="img">`;
		$(this).append(img);

	});


	$('.main-menu nav > ul > li').slice(-4).addClass('menu-last');
	$('.wp-block-navigation__responsive-container-content > ul > li').slice(-4).addClass('menu-last');

	$('.tp-header-side-menu > nav > ul > li > a, .offcanvas__category > nav > ul > li a').each(function(i, v) {
		$(v).contents().eq(1).wrap('<span class="menu-text"/>');
	});



	if ($("#tp-offcanvas-lang-toggle").length > 0) {
		window.addEventListener('click', function(e){
		
			if (document.getElementById('tp-offcanvas-lang-toggle').contains(e.target)){
				$(".tp-lang-list").toggleClass("tp-lang-list-open");
			}
			else{
				$(".tp-lang-list").removeClass("tp-lang-list-open");
			}
		});
	}

	if ($("#tp-offcanvas-currency-toggle").length > 0) {
		window.addEventListener('click', function(e){
		
			if (document.getElementById('tp-offcanvas-currency-toggle').contains(e.target)){
				$(".tp-currency-list").toggleClass("tp-currency-list-open");
			}
			else{
				$(".tp-currency-list").removeClass("tp-currency-list-open");
			}
		});
	}

	// for header language
	if ($("#tp-header-lang-toggle").length > 0) {
		window.addEventListener('click', function(e){
	
			if (document.getElementById('tp-header-lang-toggle').contains(e.target)){
				$(".tp-header-lang ul").toggleClass("tp-lang-list-open");
			}
			else{
				$(".tp-header-lang ul").removeClass("tp-lang-list-open");
			}
		});
	}

	// for header currency
	if ($("#tp-header-currency-toggle").length > 0) {
		window.addEventListener('click', function(e){
	
			if (document.getElementById('tp-header-currency-toggle').contains(e.target)){
				$(".tp-header-currency ul").toggleClass("tp-currency-list-open");
			}
			else{
				$(".tp-header-currency ul").removeClass("tp-currency-list-open");
			}
		});
	}

	// for header setting
	if ($("#tp-header-setting-toggle").length > 0) {
		window.addEventListener('click', function(e){
	
			if (document.getElementById('tp-header-setting-toggle').contains(e.target)){
				$(".tp-header-setting ul").toggleClass("tp-setting-list-open");
			}
			else{
				$(".tp-header-setting ul").removeClass("tp-setting-list-open");
			}
		});
	}

	$('.tp-hamburger-toggle').on('click', function(){
		$('.tp-header-side-menu').slideToggle('tp-header-side-menu');
	});


	////////////////////////////////////////////////////
	// 04. Menu Controls JS
	if($('.tp-category-menu-content').length && $('.tp-category-mobile-menu').length){
		let navContent = document.querySelector(".tp-category-menu-content").outerHTML;
		let mobileNavContainer = document.querySelector(".tp-category-mobile-menu");
		mobileNavContainer.innerHTML = navContent;
	
		$('.tp-offcanvas-category-toggle').on('click', function(){
			$(this).siblings().find('nav').slideToggle();
		});
		
	
		let arrow = $(".tp-category-mobile-menu .has-dropdown > a");
	
		arrow.each(function () {
			let self = $(this);
			let arrowBtn = document.createElement("BUTTON");
			arrowBtn.classList.add("dropdown-toggle-btn");
			arrowBtn.innerHTML = "<i class='fa-regular fa-angle-right'></i>";
	
			self.append(function () {
			  return arrowBtn;
			});
	
			self.find("button").on("click", function (e) {
			  e.preventDefault();
			  let self = $(this);
			  self.toggleClass("dropdown-opened");
			  self.parent().toggleClass("expanded");
			  self.parent().parent().addClass("dropdown-opened").siblings().removeClass("dropdown-opened");
			  self.parent().parent().children(".tp-submenu").slideToggle();
			  
	
			});
	
		  });
	}

	if($('.tp-main-menu-content').length && $('.tp-main-menu-mobile').length){
		let navContent = document.querySelector(".tp-main-menu-content").outerHTML;
		let mobileNavContainer = document.querySelector(".tp-main-menu-mobile");
		mobileNavContainer.innerHTML = navContent;
	
	
		let arrow = $(".tp-main-menu-mobile .has-dropdown > a");
	
		arrow.each(function () {
			let self = $(this);
			let arrowBtn = document.createElement("BUTTON");
			arrowBtn.classList.add("dropdown-toggle-btn");
			arrowBtn.innerHTML = "<i class='fa-regular fa-angle-right'></i>";
	
			self.append(function () {
			  return arrowBtn;
			});
	
			self.find("button").on("click", function (e) {
			  e.preventDefault();
			  let self = $(this);
			  self.toggleClass("dropdown-opened");
			  self.parent().toggleClass("expanded");
			  self.parent().parent().addClass("dropdown-opened").siblings().removeClass("dropdown-opened");
			  self.parent().parent().children(".tp-submenu").slideToggle();
			  
	
			});
	
		  });
	}

	$(".tp-category-menu-toggle").on("click", function () {
		$(".tp-category-menu > nav > ul").slideToggle();
	});



	////////////////////////////////////////////////////
	// 05. Offcanvas Js
	$(".tp-offcanvas-open-btn").on("click", function () {
		$(".offcanvas__area").addClass("offcanvas-opened");
		$(".body-overlay").addClass("opened");
	});
	$(".offcanvas-close-btn").on("click", function () {
		$(".offcanvas__area").removeClass("offcanvas-opened");
		$(".body-overlay").removeClass("opened");
	});

	////////////////////////////////////////////////////
	// 06. Search Js
	$(".tp-search-open-btn").on("click", function () {
		$(".tp-search-area").addClass("opened");
		$(".body-overlay").addClass("opened");
	});
	$(".tp-search-close-btn").on("click", function () {
		$(".tp-search-area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});

	////////////////////////////////////////////////////
	// 07. cartmini Js
	$(".cartmini-open-btn").on("click", function () {
		$(".cartmini__area").addClass("cartmini-opened");
		$(".body-overlay").addClass("opened");
	});


	$(".cartmini-close-btn").on("click", function () {
		$(".cartmini__area").removeClass("cartmini-opened");
		$(".body-overlay").removeClass("opened");
	});

	////////////////////////////////////////////////////
	// 08. filter
	$(".filter-open-btn").on("click", function () {
		$(".tp-filter-offcanvas-area").addClass("offcanvas-opened");
		$(".body-overlay").addClass("opened");
	});


	$(".filter-close-btn").on("click", function () {
		$(".tp-filter-offcanvas-area").removeClass("offcanvas-opened");
		$(".body-overlay").removeClass("opened");
	});

	$(".filter-open-dropdown-btn").on("click", function () {
		$(".tp-filter-dropdown-area").toggleClass('filter-dropdown-opened');
	});


	////////////////////////////////////////////////////
	// 09. Body overlay Js
	$(".body-overlay").on("click", function () {
		$(".offcanvas__area").removeClass("offcanvas-opened");
		$(".tp-search-area").removeClass("opened");
		$(".cartmini__area").removeClass("cartmini-opened");
		$(".tp-filter-offcanvas-area").removeClass("offcanvas-opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
	// 10. Sticky Header Js
	windowOn.on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$("#header-sticky").removeClass("header-stickys");
		} else {
			$("#header-sticky").addClass("header-stickys");
		}
	});

	windowOn.on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$(".tp-side-menu-5").removeClass("sticky-active");
		} else {
			$(".tp-side-menu-5").addClass("sticky-active");
		}
	});


	////////////////////////////////////////////////////
	// 12. Nice Select Js
	$('.tp-header-search-category select, .tp-shop-area select, .tp-checkout-area select, .profile__area select, .tp-sidebar-wrapper select, .tp-postbox-details-article select, .tp-header-currency select, .tp-footer-area select').niceSelect();

	////////////////////////////////////////////////////
	// 13. Smooth Scroll Js
	function smoothSctoll() {
		$('.smooth a').on('click', function (event) {
			var target = $(this.getAttribute('href'));
			if (target.length) {
				event.preventDefault();
				$('html, body').stop().animate({
					scrollTop: target.offset().top - 120
				}, 1500);
			}
		});
	}
	smoothSctoll();

	function back_to_top() {
		var btn = $('#back_to_top');
		var btn_wrapper = $('.back-to-top-wrapper');

		windowOn.scroll(function () {
			if (windowOn.scrollTop() > 300) {
				btn_wrapper.addClass('back-to-top-btn-show');
			} else {
				btn_wrapper.removeClass('back-to-top-btn-show');
			}
		});

		btn.on('click', function (e) {
			e.preventDefault();
			$('html, body').animate({ scrollTop: 0 }, '300');
		});
	}
	back_to_top();

	var tp_rtl = $('html').attr('dir');
	let rtl_setting = tp_rtl == 'rtl' ? true : false;

	function tp_hero_slider() {

		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});


		var mainSlider = new Swiper('.tp-slider-active', {
			slidesPerView: 1,
			spaceBetween: 30,
			loop: true,
			rtl: rtl_setting,
			effect : 'fade',
			// Navigation arrows
			navigation: {
				nextEl: ".tp-slider-button-next",
				prevEl: ".tp-slider-button-prev",
			},
			pagination: {
				el: ".tp-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
		});
	
		mainSlider.on('slideChangeTransitionStart', function (realIndex) {
			if ($('.swiper-slide.swiper-slide-active, .tp-slider-item .is-light').hasClass('is-light')) {
				$('.tp-slider-variation').addClass('is-light');
			} else {
				$('.tp-slider-variation').removeClass('is-light');
			}
		});

			// home 2 fashion
	var slider = new Swiper('.tp-slider-active-2', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 4000,
		  },
		rtl: rtl_setting,
		effect: 'fade',
		// Navigation arrows
		navigation: {
			nextEl: ".tp-slider-2-button-next",
			prevEl: ".tp-slider-2-button-prev",
		},
		pagination: {
			el: ".tp-slider-2-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
	});

	// home 3 beauti
	var slider = new Swiper('.tp-slider-active-3', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		rtl: rtl_setting,
		effect: 'fade',
		// Navigation arrows
		navigation: {
			nextEl: ".tp-slider-3-button-next",
			prevEl: ".tp-slider-3-button-prev",
		},
		pagination: {
			el: ".tp-slider-3-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
	});
	}

	function tp_hero_slider_2(){
		$('.tp-slider-active-4').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			rtl: rtl_setting,
			centerMode: true,
			prevArrow: `<button type="button" class="tp-slider-3-button-prev"><svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
			   <path d="M1.00073 6.99989L15 6.99989" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			   <path d="M6.64648 1.5L1.00011 6.99954L6.64648 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`,
			nextArrow: `<button type="button" class="tp-slider-3-button-next"><svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M14.9993 6.99989L1 6.99989" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			<path d="M9.35352 1.5L14.9999 6.99954L9.35352 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg></button>`,
			asNavFor: '.tp-slider-nav-active',
			appendArrows: $('.tp-slider-arrow-4'),
			
		});
	
		$('.tp-slider-nav-active').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			vertical: true,
			asNavFor: '.tp-slider-active-4',
			dots: false,
			arrows: false,
			prevArrow: '<button type="button" class="tp-slick-prev"><i class="fa-solid fa-arrow-up"></i></button>',
			nextArrow: '<button type="button" class="tp-slick-next"><i class="fa-solid fa-arrow-down"></i></button>',
			centerMode: false,
			focusOnSelect: true,
		});
	}

	function tp_product(){
		
		var slider = new Swiper('.tp-product-offer-slider-active', {
			slidesPerView: 4,
			spaceBetween: 30,
			loop: true,
			rtl: rtl_setting,
			pagination: {
				el: ".tp-deals-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			breakpoints: {
				'1200': {
					slidesPerView: 3,
				},
				'992': {
					slidesPerView: 2,
				},
				'768': {
					slidesPerView: 2,
				},
				'576': {
					slidesPerView: 1,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});



		// product arrival
		var slider = new Swiper('.tp-product-arrival-active', {
			slidesPerView: 4,
			spaceBetween: 30,
			loop: true,
			rtl: rtl_setting,
			pagination: {
				el: ".tp-arrival-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-arrival-slider-button-next",
				prevEl: ".tp-arrival-slider-button-prev",
			},
			breakpoints: {
				'1200': {
					slidesPerView: 4,
				},
				'992': {
					slidesPerView: 3,
				},
				'768': {
					slidesPerView: 2,
				},
				'576': {
					slidesPerView: 2,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});

		var slider = new Swiper('.tp-trending-slider-active', {
			slidesPerView: 2,
			spaceBetween: 24,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-trending-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-trending-slider-button-next",
				prevEl: ".tp-trending-slider-button-prev",
			},
	
			breakpoints: {
				'1200': {
					slidesPerView: 2,
				},
				'992': {
					slidesPerView: 2,
				},
				'768': {
					slidesPerView: 2,
				},
				'576': {
					slidesPerView: 2,
				},
				'0': {
					slidesPerView: 1,
					spaceBetween: 0,
				},
			},
		});
	}
	
	function tp_product_2(){

		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});

		var specialSlider = new Swiper('.tp-special-slider-active', {
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			rtl: rtl_setting,
			effect: 'fade',
			enteredSlides: false,
			pagination: {
				el: ".tp-special-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-special-slider-button-next",
				prevEl: ".tp-special-slider-button-prev",
			},
		});

		var slider = new Swiper('.tp-category-slider-active-4', {
			slidesPerView: 5,
			spaceBetween: 25,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-category-slider-dot-4",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-category-slider-button-next-4",
				prevEl: ".tp-category-slider-button-prev-4",
			},
	
			scrollbar: {
				el: '.tp-category-swiper-scrollbar',
				draggable: true,
				dragClass: 'tp-swiper-scrollbar-drag',
				snapOnRelease: true,
			  },
	
			breakpoints: {
				'1400': {
					slidesPerView: 5,
				},
				'1200': {
					slidesPerView: 4,
				},
				'992': {
					slidesPerView: 3,
				},
				'768': {
					slidesPerView: 2,
				},
				'576': {
					slidesPerView: 2,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});

		var slider = new Swiper('.tp-best-slider-active', {
			slidesPerView: 4,
			spaceBetween: 24,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-best-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-best-slider-button-next",
				prevEl: ".tp-best-slider-button-prev",
			},
	
			scrollbar: {
				el: '.tp-best-swiper-scrollbar',
				draggable: true,
				dragClass: 'tp-swiper-scrollbar-drag',
				snapOnRelease: true,
			  },
	
			breakpoints: {
				'1200': {
					slidesPerView: 4,
				},
				'992': {
					slidesPerView: 4,
				},
				'768': {
					slidesPerView: 2,
				},
				'576': {
					slidesPerView: 2,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});

		var slider = new Swiper('.tp-best-slider-active-5', {
			slidesPerView: 3,
			spaceBetween: 24,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-best-slider-dot-5",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-best-slider-5-button-next",
				prevEl: ".tp-best-slider-5-button-prev",
			},
	
			scrollbar: {
				el: '.tp-best-5-swiper-scrollbar',
				draggable: true,
				dragClass: 'tp-swiper-scrollbar-drag',
				snapOnRelease: true,
			  },
	
			breakpoints: {
				'1200': {
					slidesPerView: 3,
				},
				'992': {
					slidesPerView: 2,
				},
				'768': {
					slidesPerView: 2,
				},
				'576': {
					slidesPerView: 2,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});
	}

	function tp_product_3() {
		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});
		
		var slider = new Swiper('.tp-category-slider-active-2', {
			slidesPerView: 5,
			spaceBetween: 20,
			loop: false,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-category-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-category-slider-button-next",
				prevEl: ".tp-category-slider-button-prev",
			},
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
				dragClass: 'tp-swiper-scrollbar-drag',
				snapOnRelease: true,
			  },
			breakpoints: {
				'1200': {
					slidesPerView: 5,
				},
				'992': {
					slidesPerView: 4,
				},
				'768': {
					slidesPerView: 3,
				},
				'576': {
					slidesPerView: 2,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});

		var slider = new Swiper('.tp-featured-slider-active', {
			slidesPerView: 3,
			spaceBetween: 10,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-featured-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-featured-slider-button-next",
				prevEl: ".tp-featured-slider-button-prev",
			},
	
			breakpoints: {
				'1200': {
					slidesPerView: 3,
				},
				'992': {
					slidesPerView: 3,
				},
				'768': {
					slidesPerView: 2,
				},
				'576': {
					slidesPerView: 1,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});
	}

	function tp_blog_post(){
		var slider = new Swiper('.tp-blog-main-slider-active', {
			slidesPerView: 3,
			spaceBetween: 20,
			loop: true,
			autoplay: {
				delay: 4000,
			  },
			rtl: rtl_setting,
			// Navigation arrows
			navigation: {
				nextEl: ".tp-blog-main-slider-button-next",
				prevEl: ".tp-blog-main-slider-button-prev",
			},
			pagination: {
				el: ".tp-blog-main-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			breakpoints: {
				'1200': {
					slidesPerView: 3,
				},
				'992': {
					slidesPerView: 2,
				},
				'768': {
					slidesPerView: 2,
				},
				'576': {
					slidesPerView: 1,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});
	}

	function tp_product_banner_slider(){
		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});

		var slider = new Swiper('.tp-product-gadget-banner-slider-active', {
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			effect: 'fade',
			pagination: {
				el: ".tp-product-gadget-banner-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
	
		});

		var slider = new Swiper('.tp-product-banner-slider-active', {
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			effect: 'fade',
			pagination: {
				el: ".tp-product-banner-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
	
		});
	}

	function tp_banner(){
		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});
	}

	function tp_banner_box(){
		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});
	}

	function tp_testimonial_slider(){

		var slider = new Swiper('.tp-testimonial-slider-active', {
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			rtl: rtl_setting,
			pagination: {
				el: ".tp-testimonial-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-testimonial-slider-button-next",
				prevEl: ".tp-testimonial-slider-button-prev",
			},
		});

		var slider = new Swiper('.tp-testimoinal-slider-active-3', {
			slidesPerView: 2,
			spaceBetween: 24,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-testimoinal-slider-dot-3",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-testimoinal-slider-button-next-3",
				prevEl: ".tp-testimoinal-slider-button-prev-3",
			},
	
			breakpoints: {
				'1200': {
					slidesPerView: 2,
				},
				'992': {
					slidesPerView: 2,
				},
				'768': {
					slidesPerView: 1,
				},
				'576': {
					slidesPerView: 1,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});

		var slider = new Swiper('.tp-testimonial-slider-active-5', {
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-testimonial-slider-dot-5",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-testimonial-slider-5-button-next",
				prevEl: ".tp-testimonial-slider-5-button-prev",
			},
			
		});

	}

	function tp_brand(){
		var slider = new Swiper('.tp-brand-slider-active', {
			slidesPerView: 5,
			spaceBetween: 0,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-brand-slider-dot",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-brand-slider-button-next",
				prevEl: ".tp-brand-slider-button-prev",
			},
	
			breakpoints: {
				'1200': {
					slidesPerView: 5,
				},
				'992': {
					slidesPerView: 5,
				},
				'768': {
					slidesPerView: 4,
				},
				'576': {
					slidesPerView: 3,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});
	}

	function tp_category(){
		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});

		var slider = new Swiper('.tp-category-slider-active-5', {
			slidesPerView: 6,
			spaceBetween: 12,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			pagination: {
				el: ".tp-category-slider-dot-4",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-category-slider-button-next-5",
				prevEl: ".tp-category-slider-button-prev-5",
			},
	
			scrollbar: {
				el: '.tp-category-5-swiper-scrollbar',
				draggable: true,
				dragClass: 'tp-swiper-scrollbar-drag',
				snapOnRelease: true,
			  },
	
			breakpoints: {
				'1400': {
					slidesPerView: 6,
				},
				'1200': {
					slidesPerView: 5,
				},
				'992': {
					slidesPerView: 4,
				},
				'768': {
					slidesPerView: 3,
				},
				'576': {
					slidesPerView: 2,
				},
				'400': {
					slidesPerView: 2,
				},
				'0': {
					slidesPerView: 1,
				},
			},
		});
	}

	function tp_side_banner(){
		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});
		var slider = new Swiper('.tp-best-banner-slider-active-5', {
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			rtl: rtl_setting,
			enteredSlides: false,
			
			pagination: {
				el: ".tp-best-banner-slider-dot-5",
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
				},
			},
			// Navigation arrows
			navigation: {
				nextEl: ".tp-best-banner-slider-5-button-next",
				prevEl: ".tp-best-banner-slider-5-button-prev",
			},
		});
	}

	function tp_app_download(){
		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});
	}

	function tp_history(){
		var historyNav = new Swiper(".tp-history-nav-active", {
			spaceBetween: 220,
			slidesPerView: 4,
			watchSlidesProgress: true,
			breakpoints: {
				'1200': {
					spaceBetween: 220,
					slidesPerView: 4,
				},
				'992': {
					spaceBetween: 150,
					slidesPerView: 4,
				},
				'768': {
					spaceBetween: 100,
					slidesPerView: 4,
				},
				'576': {
					spaceBetween: 80,
					slidesPerView: 3,
				},
				'0': {
					slidesPerView: 2,
					spaceBetween: 50,
				},
			},
		  });
		  var historyMain = new Swiper(".tp-history-slider-active", {
			spaceBetween: 0,
			effect : 'fade',
			navigation: {
			  nextEl: ".swiper-button-next",
			  prevEl: ".swiper-button-prev",
			},
			thumbs: {
			  swiper: historyNav,
			},
		  });
	}

	// home electronics
	var slider = new Swiper('.shop-mega-menu-slider-active', {
		slidesPerView: 3,
		spaceBetween: 20,
		loop: true,
		rtl: rtl_setting,
		// Navigation arrows
		navigation: {
			nextEl: ".tp-shop-mega-menu-button-next",
			prevEl: ".tp-shop-mega-menu-button-prev",
		},
		pagination: {
			el: ".tp-shop-mega-menu-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
	});


	// home 3 beauti
	var slider = new Swiper('.tp-slider-active-5', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		rtl: rtl_setting,
		effect: 'fade',
		// Navigation arrows
		navigation: {
			nextEl: ".tp-slider-5-button-next",
			prevEl: ".tp-slider-5-button-prev",
		},
		pagination: {
			el: ".tp-slider-5-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
	});

	var mainSliderThumb4 = new Swiper ('.tp-slider-nav-actives', {
		slidesPerView: 3,
		spaceBetween: 20,
		loop: true,
		direction: 'vertical',
	});

	// home 3 beauti
	var mainSlider4 = new Swiper('.tp-slider-active-4s', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		rtl: rtl_setting,
		effect: 'fade',
		// Navigation arrows
		navigation: {
			nextEl: ".tp-slider-3-button-next",
			prevEl: ".tp-slider-3-button-prev",
		},
		pagination: {
			el: ".tp-slider-3-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
	});

	// home 3 beauti
	var slider = new Swiper('.tp-slider-nav-actives', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		rtl: rtl_setting,
		effect: 'fade',
		// Navigation arrows
		navigation: {
			nextEl: ".tp-slider-3-button-next",
			prevEl: ".tp-slider-3-button-prev",
		},
		pagination: {
			el: ".tp-slider-3-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
	});


	var slider = new Swiper('.tp-product-related-slider-active', {
		slidesPerView: 4,
		spaceBetween: 24,
		loop: true,
		rtl: rtl_setting,
		enteredSlides: false,
		pagination: {
			el: ".tp-related-slider-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
		// Navigation arrows
		navigation: {
			nextEl: ".tp-related-slider-button-next",
			prevEl: ".tp-related-slider-button-prev",
		},

		scrollbar: {
			el: '.tp-related-swiper-scrollbar',
			draggable: true,
			dragClass: 'tp-swiper-scrollbar-drag',
			snapOnRelease: true,
		  },

		breakpoints: {
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	var slider = new Swiper('.tp-product-details-thumb-slider-active', {
		slidesPerView: 2,
		spaceBetween: 13,
		loop: true,
		rtl: rtl_setting,
		enteredSlides: false,
		pagination: {
			el: ".tp-product-details-thumb-slider-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
		// Navigation arrows
		navigation: {
			nextEl: ".tp-product-details-thumb-slider-5-button-next",
			prevEl: ".tp-product-details-thumb-slider-5-button-prev",
		},


		breakpoints: {
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	var postboxSlider = new Swiper('.tp-postbox-slider', {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		rtl: rtl_setting,
		autoplay: {
			delay: 3000,
		},
		// Navigation arrows
		navigation: {
			nextEl: ".tp-postbox-slider-button-next",
			prevEl: ".tp-postbox-slider-button-prev",
		},
		breakpoints: {
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	


	////////////////////////////////////////////////////
	// 15. Masonary Js
	$('.grid').imagesLoaded(function () {
		// init Isotope
		var $grid = $('.grid').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			masonry: {
				// use outer width of grid-sizer for columnWidth
				columnWidth: '.grid-item',
			}
		});


		// filter items on button click
		$('.masonary-menu').on('click', 'button', function () {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
		});

		//for menu active class
		$('.masonary-menu button').on('click', function (event) {
			$(this).siblings('.active').removeClass('active');
			$(this).addClass('active');
			event.preventDefault();
		});

	});

	/* magnificPopup img view */
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	/* magnificPopup video view */
	$(".popup-video").magnificPopup({
		type: "iframe",
	});


	if ($('.scene').length > 0) {
		$('.scene').parallax({
			scalarX: 5.0,
			scalarY: 5.0,
		});
	};

	////////////////////////////////////////////////////
	// 16. Wow Js
	new WOW().init();

	function tp_ecommerce() {


		if($('#slider-range').length > 0){
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 500,
				values: [75, 300],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
	
			$("#amount").val("$" + $("#slider-range").slider("values", 0) +
				" - $" + $("#slider-range").slider("values", 1));
		}

		if($('#slider-range-offcanvas').length > 0){
			$("#slider-range-offcanvas").slider({
				range: true,
				min: 0,
				max: 500,
				values: [75, 300],
				slide: function (event, ui) {
					$("#amount-offcanvas").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount-offcanvas").val("$" + $("#slider-range-offcanvas").slider("values", 0) +
				" - $" + $("#slider-range-offcanvas").slider("values", 1));
		}

	
		

		$('.tp-checkout-payment-item label').on('click', function () {
			$(this).siblings('.tp-checkout-payment-desc').slideToggle(400);
			
		});
		

		$('.tp-color-variation-btn').on('click', function () {
			$(this).addClass('active').siblings().removeClass('active');
		});
		

		$('.tp-size-variation-btn').on('click', function () {
			$(this).addClass('active').siblings().removeClass('active');
		});
	
		////////////////////////////////////////////////////
		// 17. Show Login Toggle Js
		$('.tp-checkout-login-form-reveal-btn').on('click', function () {
			$('#tpReturnCustomerLoginForm').slideToggle(400);
		});
	
		////////////////////////////////////////////////////
		// 18. Show Coupon Toggle Js
		$('.tp-checkout-coupon-form-reveal-btn').on('click', function () {
			$('#tpCheckoutCouponForm').slideToggle(400);
		});
	
		////////////////////////////////////////////////////
		// 19. Create An Account Toggle Js
		$('#cbox').on('click', function () {
			$('#cbox_info').slideToggle(900);
		});
	
		////////////////////////////////////////////////////
		// 20. Shipping Box Toggle Js
		$('#ship-box').on('click', function () {
			$('#ship-box-info').slideToggle(1000);
		});
	}
	tp_ecommerce();


	

	////////////////////////////////////////////////////
	// 17. Counter Js
	new PureCounter();
	new PureCounter({
		filesizing: true,
		selector: ".filesizecount",
		pulse: 2,
	});

	////////////////////////////////////////////////////
	// 18. InHover Active Js
	$('.hover__active').on('mouseenter', function () {
		$(this).addClass('active').parent().siblings().find('.hover__active').removeClass('active');
	});

	$('.activebsba').on("click", function () {
		$('#services-item-thumb').removeClass().addClass($(this).attr('rel'));
		$(this).addClass('active').siblings().removeClass('active');
	});


	////////////////////////////////////////////////////
	// 19. Line Animation Js
	if ($('#marker').length > 0) {
		function tp_tab_line(){
			var marker = document.querySelector('#marker');
			var item = document.querySelectorAll('.menu-style-3  > nav > ul > li');
			var itemActive = document.querySelector('.menu-style-3  > nav > ul > li.active');

			function indicator(e){
				marker.style.left = e.offsetLeft+"px";
				marker.style.width = e.offsetWidth+"px";
			}
				
		
			item.forEach(link => {
				link.addEventListener('mouseenter', (e)=>{
					indicator(e.target);
				});
				
			});

			
			var activeNav = $('.menu-style-3 > nav > ul > li.active');
			var activewidth = $(activeNav).width();
			var activePadLeft = parseFloat($(activeNav).css('padding-left'));
			var activePadRight = parseFloat($(activeNav).css('padding-right'));
			var totalWidth = activewidth + activePadLeft + activePadRight;
			
			var precedingAnchorWidth = anchorWidthCounter();
		
		
			$(marker).css('display','block');
			
			$(marker).css('width', totalWidth);
		
			function anchorWidthCounter() {
				var anchorWidths = 0;
				var a;
				var aWidth;
				var aPadLeft;
				var aPadRight;
				var aTotalWidth;
				$('.menu-style-3 > nav > ul > li').each(function(index, elem) {
					var activeTest = $(elem).hasClass('active');
					marker.style.left = elem.offsetLeft+"px";
					
					if(activeTest) {
					// Break out of the each function.
					return false;
					}
			
					a = $(elem).find('li');
					aWidth = a.width();
					aPadLeft = parseFloat(a.css('padding-left'));
					aPadRight = parseFloat(a.css('padding-right'));
					aTotalWidth = aWidth + aPadLeft + aPadRight;
			
					anchorWidths = anchorWidths + aTotalWidth;
	
				});
		
				return anchorWidths;
			}
		}

		tp_tab_line();
	}


	if ($('#productTabMarker').length > 0) {
		function tp_tab_line_2(){
			var marker = document.querySelector('#productTabMarker');
			var item = document.querySelectorAll('.tp-product-tab button');
			var itemActive = document.querySelector('.tp-product-tab .nav-link.active');

			// rtl settings
			var tp_rtl = localStorage.getItem('tp_dir');
			let rtl_setting = tp_rtl == 'rtl' ? 'right' : 'left';

			function indicator(e){
				marker.style.left = e.offsetLeft+"px";
				marker.style.width = e.offsetWidth+"px";
			}
				
		
			item.forEach(link => {
				link.addEventListener('click', (e)=>{
					indicator(e.target);
				});
			});
			
			var activeNav = $('.nav-link.active');
			var activewidth = $(activeNav).width();
			var activePadLeft = parseFloat($(activeNav).css('padding-left'));
			var activePadRight = parseFloat($(activeNav).css('padding-right'));
			var totalWidth = activewidth + activePadLeft + activePadRight;
			
			var precedingAnchorWidth = anchorWidthCounter();
		
		
			$(marker).css('display','block');
			
			$(marker).css('width', totalWidth);
		
			function anchorWidthCounter() {
				var anchorWidths = 0;
				var a;
				var aWidth;
				var aPadLeft;
				var aPadRight;
				var aTotalWidth;
				$('.tp-product-tab button').each(function(index, elem) {
					var activeTest = $(elem).hasClass('active');
					marker.style.left = elem.offsetLeft+"px";
					if(activeTest) {
					// Break out of the each function.
					return false;
					}
			
					a = $(elem).find('button');
					aWidth = a.width();
					aPadLeft = parseFloat(a.css('padding-left'));
					aPadRight = parseFloat(a.css('padding-right'));
					aTotalWidth = aWidth + aPadLeft + aPadRight;
			
					anchorWidths = anchorWidths + aTotalWidth;
	
				});
		
				return anchorWidths;
			}
		}
		tp_tab_line_2();
	}

	////////////////////////////////////////////////////
	// 20. Video Play Js
	var play = false;
	$('.tp-video-toggle-btn').on('click', function(){

		if(play === false){
			$('.tp-slider-video').addClass('full-width');
			$(this).addClass('hide');
			play = true;

			$('.tp-slider-video').find('video').each(function() {
				$(this).get(0).play();
			});
		}else{
			$('.tp-slider-video').removeClass('full-width');
			$(this).removeClass('hide');
			play = false;
			$('.tp-slider-video').find('video').each(function() {
				$(this).get(0).pause();
			});
		}

	});

	////////////////////////////////////////////////////
	// 21. Password Toggle Js
	if($('#password-show-toggle').length > 0){
		var btn = document.getElementById('password-show-toggle');
		
		btn.addEventListener('click', function(e){
			
			var inputType = document.getElementById('tp_password');
			var openEye = document.getElementById('open-eye');
			var closeEye = document.getElementById('close-eye');
	
			if (inputType.type === "password") {
				inputType.type = "text";
				openEye.style.display = 'block';
				closeEye.style.display = 'none';
			 } else {
				inputType.type = "password";
				openEye.style.display = 'none';
				closeEye.style.display = 'block';
			 }
		});
	}

	
	if ($('.tp-header-heights').length > 0) {
		var headerHeight = document.querySelector(".tp-header-height");      
		var setHeaderHeight = headerHeight.offsetHeight;	
		
		$(".tp-header-height").each(function () {
			$(this).css({
				'height' : setHeaderHeight + 'px'
			});
		});
	  }

	$(document).ready(function() {

		let getDir = $('html').attr('dir');

		var enableRtl;
		
		if(getDir == 'rtl'){
			enableRtl = true
		}else{
			enableRtl = false;
		}

		

		setTimeout(() => {
			$(".flex-control-thumbs").addClass("product-thumbnails");
			if ($(".woocommerce-product-gallery").hasClass("is-vertical-tab") && $(window).width() > 992) {
				var verti = true;
			} else {
				var verti = false;
			}

			$('.product-thumbnails').slick({
				dots: false,
				arrows: false,
				prevArrow: '<div class="prev"><i class="far fa-angle-left"></i></div>',
				nextArrow: '<div class="next"><i class="far fa-angle-right"></i></div>',
				autoplay: false,
				Speed: 2000,
				slidesToShow: 5,
				slidesToScroll: 2,
				focusOnSelect: true,
				vertical: verti,
				rtl: enableRtl,
			});
		}, 100);


		$('.tp-woo-single-carousel-active').slick({
			speed: 300,
			slidesToShow: 2,
			slidesToScroll: 2,
			infinite: true,
			dots: true,
			rtl: enableRtl,
		  	arrows: true,
			prevArrow: `<button type="button" class="tp-woo-single-carousel-button-prev">
							<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.00073 6.99989L15 6.99989" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M6.64648 1.5L1.00011 6.99954L6.64648 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg> 
						</button>`,
		   nextArrow: `<button type="button" class="tp-woo-single-carousel-button-next">
							<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M14.9993 6.99989L1 6.99989" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M9.35352 1.5L14.9999 6.99954L9.35352 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg> 
						</button>`,
		   appendArrows: $('.tp-woo-single-arrow'),
		});



		$('.tp-woo-related-product-related-active').slick({
		  dots: false,
		  arrows: false,
		  prevArrow: '<div class="prev"><i class="far fa-angle-left"></i></div>',
		  nextArrow: '<div class="next"><i class="far fa-angle-right"></i></div>',
		  autoplay: false,
		  Speed: 2000,
		  slidesToShow: 5,
		  slidesToScroll: 1,
		  focusOnSelect: true,
		  rtl: enableRtl,
		  vertical: verti,
		});
	});

	var breadcrumb_icon = `
			<span class="tp-woo-breadcrumb-icon">
				<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.42393 16H15.5759C15.6884 16 15.7962 15.9584 15.8758 15.8844C15.9553 15.8104 16 15.71 16 15.6054V6.29143C16 6.22989 15.9846 6.1692 15.9549 6.11422C15.9252 6.05923 15.8821 6.01147 15.829 5.97475L8.75305 1.07803C8.67992 1.02736 8.59118 1 8.5 1C8.40882 1 8.32008 1.02736 8.24695 1.07803L1.17098 5.97587C1.11791 6.01259 1.0748 6.06035 1.04511 6.11534C1.01543 6.17033 0.999976 6.23101 1 6.29255V15.6063C1.00027 15.7108 1.04504 15.8109 1.12451 15.8847C1.20398 15.9585 1.31165 16 1.42393 16ZM10.1464 15.2107H6.85241V10.6202H10.1464V15.2107ZM1.84866 6.48977L8.4999 1.88561L15.1517 6.48977V15.2107H10.9946V10.2256C10.9946 10.1209 10.95 10.0206 10.8704 9.94654C10.7909 9.87254 10.683 9.83096 10.5705 9.83096H6.42848C6.316 9.83096 6.20812 9.87254 6.12858 9.94654C6.04904 10.0206 6.00435 10.1209 6.00435 10.2256V15.2107H1.84806L1.84866 6.48977Z" fill="#55585B" stroke="#55585B" stroke-width="0.5"></path>
				</svg>
			</span>
		`;

	$(breadcrumb_icon).insertBefore('.tp-woo-breadcrumb');

	var checkboxToggle = false;


	$('.tp-woo-form-login .woocommerce-form__label.woocommerce-form__label-for-checkbox.woocommerce-form-login__rememberme span').on('click', function (e) {
		if(checkboxToggle === false){
			$(this).addClass('active');
			checkboxToggle = true;
		}else{
			$(this).removeClass('active');
			checkboxToggle = false;
			
		}
	});

	$('.tp-woo-checkout-customer-details .woocommerce-shipping-fields #ship-to-different-address > label').attr('for', 'ship-to-different-address-checkbox');



	$('.tp-woo-checkout-customer-details .shipping_address').slideUp(200);


	$('.tp-coupon-date button span').on('click', function(){
		var buttonText = $(this).text();
		$(this).text("Copied!")
		navigator.clipboard.writeText(buttonText);
	})


	$(window).on("elementor/frontend/init", function () {
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-product.default",tp_product
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-product-2.default",tp_product_2
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-product-3.default",tp_product_3
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-product-banner-slider.default",tp_product_banner_slider
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/blogpost.default",tp_blog_post
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-slider.default",tp_hero_slider
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-slider-2.default",tp_hero_slider_2
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-banner.default",tp_banner
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-banner-box.default",tp_banner_box
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-testimonial-slider.default",tp_testimonial_slider
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-brand.default",tp_brand
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/product-category-slider.default",tp_category
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-side-banner.default",tp_side_banner
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tp-app-download.default",tp_app_download
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/history.default",tp_history
		);
	});

	$('.woocommerce-product-gallery__image > a').magnificPopup({
		callbacks: {
		  elementParse: function(item) {
			// the class name
			console.log($(item.el).hasClass('has-video'))
			if($(item.el).hasClass('has-video')) {
				item.type = 'iframe';
			} else {
				item.type = 'image';
			}
		  }
		},
		gallery:{enabled:true},
		type: 'image',
	});


})(jQuery);