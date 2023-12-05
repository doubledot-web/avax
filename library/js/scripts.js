jQuery(document).ready(function ($) {
	const $window = $(window);
	const $document = $(document);
	const $body = $("body");
	const $homePage = $("body.home");
	const $siteHeader = $(".site-header");
	const $accordionModalMenu = $(".modal-menu .accordion");
	const $searchForm = $(".search-form");
	const $searchFormMobile = $(".search-form-mobile");
	let scrollBottom = false;

	onScrollActions();
	toggleSearchForm();
	toggleDesktopMenu();
	toggleAccordionMobileMenu();
	modalMenuActions();
	toggleImageMapProducts();

	function onScrollActions() {
		const $homeSocials = $(".section-hero .socials");
		const INVISIBLE_CLASS = "invisible";
		const HEADER_CLASS = "header-on-scroll";
		const HEADER_WHITE = "header-white";
		let initialHeaderWhite = false;
		if ($siteHeader.hasClass("header-white")) {
			initialHeaderWhite = true;
		}

		$window.on("scroll", function () {
			const scrollTop = $window.scrollTop();
			const wH = $window.height();

			if (scrollTop > 40) {
				$siteHeader.addClass(HEADER_CLASS);
				if (initialHeaderWhite) {
					$siteHeader.removeClass(HEADER_WHITE);
				}
			} else {
				$siteHeader.removeClass(HEADER_CLASS);
				if (initialHeaderWhite) {
					$siteHeader.addClass(HEADER_WHITE);
				} else {
					$siteHeader.removeClass(HEADER_WHITE);
				}
			}

			if (scrollTop > 200) {
				$homeSocials.addClass(INVISIBLE_CLASS);
			} else {
				$homeSocials.removeClass(INVISIBLE_CLASS);
			}
		});
	}

	function toggleSearchForm() {
		const $mainMenu = $(".main-menu");
		const $searchField = $(".search-field");
		const HEADER_CLASS = "header-search-form-open";

		$(".open-search-form").on("click", function () {
			$mainMenu.fadeOut(200, function () {
				$searchForm.fadeIn(200);
				$siteHeader.addClass(HEADER_CLASS);
				$searchField.focus();
			});
		});

		$(".close-search-form").on("click", function () {
			$searchForm.fadeOut(200, function () {
				$mainMenu.fadeIn(200);
				$siteHeader.removeClass(HEADER_CLASS);
			});
		});

		$(".open-mobile-search-form").on("click", function () {
			$accordionModalMenu.fadeOut(200, function () {
				$searchFormMobile.fadeIn(200);
				$searchField.focus();
			});
		});
	}

	function toggleDesktopMenu() {
		const HEADER_CLASS = "header-open";

		$("#desktop-navbar").on("show", function () {
			$siteHeader.addClass(HEADER_CLASS);
		});

		$("#desktop-navbar").on("hide", function () {
			$siteHeader.removeClass(HEADER_CLASS);
		});
	}

	function toggleAccordionMobileMenu() {
		const $accordionLink = $accordionModalMenu.find(">li >a");
		const OPEN_CLASS = "open";

		$accordionLink.on("click", function (e) {
			const $this = $(this);

			if ($this.next().hasClass("sub-menu")) {
				e.preventDefault();
				const $thisSubMenu = $this.next(".sub-menu");
				const $thisItem = $this.closest("li");

				$this.closest($accordionModalMenu).toggleClass(OPEN_CLASS);
				$accordionModalMenu
					.find("li")
					.not($thisItem)
					.removeClass(OPEN_CLASS);
				$thisItem.toggleClass(OPEN_CLASS);
				$accordionModalMenu
					.find(".sub-menu")
					.not($thisSubMenu)
					.slideUp();
				$thisSubMenu.slideToggle();
			}
		});
	}

	function modalMenuActions() {
		const HEADER_CLASS = "header-on-scroll";
		const OVERFLOW_HIDDEN = "uk-overflow-hidden";
		let initialHeaderWhite = false;

		$(".modal-menu").on("show", function () {
			$body.addClass(OVERFLOW_HIDDEN);
			if ($siteHeader.hasClass(HEADER_CLASS)) {
				initialHeaderWhite = true;
				$siteHeader.removeClass(HEADER_CLASS);
			}
		});

		$(".modal-menu").on("hide", function () {
			$body.removeClass(OVERFLOW_HIDDEN);
			if (initialHeaderWhite) {
				$siteHeader.addClass(HEADER_CLASS);
			}

			/*MOBILE MENU*/
			$searchFormMobile.hide();
			$accordionModalMenu.show();
		});
	}

	function toggleImageMapProducts() {
		if ($homePage.length) {
			const markers = $(".marker");
			const ACTIVE_CLASS = "marker-active";
			$(".marker-btn").on("click", function () {
				const $this = $(this);
				const $parent = $this.parent();
				markers.not($parent).removeClass(ACTIVE_CLASS);
				$parent.toggleClass(ACTIVE_CLASS);
			});
		}
	}
});

// onload
jQuery(window).on("load", function ($) {
	jQuery.ready.then(function ($) {
		navigateToCertainPageSectionBasedOnHash($);

		function navigateToCertainPageSectionBasedOnHash($) {
			if (location.hash) {
				$("html, body").animate(
					{
						scrollTop:
							$(":target").offset().top -
							$(".site-header").height(),
					},
					{ duration: 400 }
				);

				$(".contains-hash-link a").on("click", function (e) {
					e.preventDefault();
					const target = "#" + $(this).attr("href").split("#")[1];
					if (target.length) {
						$("html, body").animate(
							{
								scrollTop:
									$(target).offset().top -
									$(".site-header").outerHeight(),
							},
							800
						);
					}
				});
			}
		}
	});
});
