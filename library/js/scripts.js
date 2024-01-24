jQuery(document).ready(function ($) {
	const $window = $(window);
	const $document = $(document);
	const $body = $("body");
	const $homePage = $("body.home");
	const $productPage = $("body.single-product");
	const $cartPage = $("body.woocommerce-cart");
	const $siteHeader = $(".site-header");
	const $accordionModalMenu = $(".modal-menu .accordion");
	const $searchForm = $(".search-form");
	const $searchFormMobile = $(".search-form-mobile");
	let scrollBottom = false;

	initActions();
	onScrollActions();
	toggleSearchForm();
	toggleDesktopMenu();
	toggleAccordionMobileMenu();
	modalMenuActions();
	toggleImageMapProducts();
	toggleWCFilters();
	addMinusPlusQuantityButtons();
	updateWishListProductsOnAjax();
	createCustomDotsOnProductGallery();
	formFiltersActions();
	disableFirstOptionOnCF7();
	//initLenis();

	function initActions() {
		//force a small scroll
		const scrollTop = $window.scrollTop();
		if (scrollTop > 40) {
			window.scrollTo(0, 100);
		}
	}

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

		$("#desktop-navbar").on("hide", function (e) {
			//if (!$('a[aria-expanded="true"]').length) {
			$siteHeader.removeClass(HEADER_CLASS);
			//}
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
			} else {
				initialHeaderWhite = false;
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

	function toggleWCFilters() {
		if ($(".archive").length) {
			const $btnToggleFilters = $(".btn-toggle-filters");
			const $filtersWrapper = $(".filters-wrapper");
			$btnToggleFilters.on("click", function () {
				$(this).toggleClass("active");
				$filtersWrapper.slideToggle();
			});
		}
	}

	function addMinusPlusQuantityButtons() {
		if ($productPage.length) {
			$("form.cart").on(
				"click",
				"button.plus, button.minus",
				function () {
					// Get current quantity values
					const qty = $(this).closest("form.cart").find(".qty");
					const val = parseFloat(qty.val());
					const max = parseFloat(qty.attr("max"));
					const min = parseFloat(qty.attr("min"));
					const step = parseFloat(qty.attr("step"));

					// Change the value if plus or minus
					if ($(this).is(".plus")) {
						if (max && max <= val) {
							qty.val(max);
						} else {
							qty.val(val + step);
						}
					} else {
						if (min && min >= val) {
							qty.val(min);
						} else if (val > 1) {
							qty.val(val - step);
						}
					}
				}
			);
		}

		if ($cartPage.length) {
			$document.on("click", "button.plus, button.minus", function () {
				const $WCCartFormUpdateCartBtn = $(
					'.woocommerce-cart-form button[name="update_cart"]'
				);
				// Get current quantity values
				const qty = $(this).closest(".product-quantity").find(".qty");
				const val = parseFloat(qty.val());
				const max = parseFloat(qty.attr("max"));
				const min = parseFloat(qty.attr("min"));
				const step = parseFloat(qty.attr("step"));

				// Change the value if plus or minus
				if ($(this).is(".plus")) {
					if (max && max <= val) {
						qty.val(max);
					} else {
						qty.val(val + step);
					}
				} else {
					if (min && min >= val) {
						qty.val(min);
					} else if (val > 1) {
						qty.val(val - step);
					}
				}

				if ($WCCartFormUpdateCartBtn.prop("disabled")) {
					$WCCartFormUpdateCartBtn.prop("disabled", false);
				}
			});
		}
	}

	function updateWishListProductsOnAjax() {
		$document.on(
			"added_to_wishlist removed_from_wishlist adding_to_cart",
			function () {
				$.ajax({
					type: "POST",
					url: yith_wcwl_l10n.ajax_url,
					data: {
						action: "yith_wcwl_update_wishlist_count",
					},
					dataType: "json",
					success: function (data) {
						$(".total-wishlist-count").text(`${data.count}`);
					},
				});
			}
		);
	}

	function createCustomDotsOnProductGallery() {
		if ($productPage.length) {
			const ACTIVE_CLASS = "flex-active";

			$document.on(
				"click touchstart tap",
				".custom-dots a",
				function (e) {
					e.preventDefault();
					const $this = $(this);
					const $parent = $this.parent();
					$(".custom-dots li").removeClass(ACTIVE_CLASS);
					$parent.addClass(ACTIVE_CLASS);
					const index = $parent.index();
					$(".flex-control-thumbs li")
						.eq(index)
						.find("img")
						.trigger("click");
				}
			);

			$document.on(
				"click touchstart tap",
				".flex-control-thumbs img",
				function () {
					const $this = $(this);
					const $parent = $this.parent();
					const index = $parent.index();
					$(".custom-dots li").removeClass(ACTIVE_CLASS);
					$(".custom-dots li").eq(index).addClass(ACTIVE_CLASS);
				}
			);

			$document.on("click", ".flex-control-nav img", function () {
				$("html,body").animate(
					{
						scrollTop: $(
							".woocommerce-product-gallery__wrapper"
						).offset().top,
					},
					500
				);
			});
		}
	}
	function formFiltersActions() {
		const $filtersWrapper = $(".filters-wrapper");
		const $form = $filtersWrapper.find("form");
		const $inputs = $filtersWrapper.find("input");

		$inputs.on("input", function () {
			$form.submit();
		});
	}

	function disableFirstOptionOnCF7() {
		$(".wpcf7 .uk-select option:first-child").prop("disabled", true);
	}

	function initLenis() {
		const lenis = new Lenis();

		function raf(time) {
			lenis.raf(time);
			requestAnimationFrame(raf);
		}

		requestAnimationFrame(raf);
	}
});

// onload
jQuery(window).on("load", function ($) {
	jQuery.ready.then(function ($) {
		const $body = $("body");

		hidePreloader($);
		navigateToCertainPageSectionBasedOnHash($);
		manipulateCustomDotsOnProductGallery($);

		function hidePreloader($) {
			$body.removeClass("uk-overflow-hidden");
			$(".preloader").fadeOut(200);
		}

		function navigateToCertainPageSectionBasedOnHash($) {
			if (location.hash) {
				$("html, body").animate(
					{
						scrollTop:
							$(":target").offset().top -
							$(".site-header").height(),
					},
					{ duration: 300 }
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

		function manipulateCustomDotsOnProductGallery($) {
			if ($(".custom-dots").length) {
				if (isTouchDevice() || $(".flex-control-paging").length) {
					$(".custom-dots").remove();
				}
				if ($(".flex-control-thumbs li").length > 1) {
					$(".flex-viewport").append($(".custom-dots"));
				}
			}
		}
	});
});

// Independent functions
function isTouchDevice() {
	return (
		"ontouchstart" in window ||
		navigator.maxTouchPoints > 0 ||
		navigator.msMaxTouchPoints > 0
	);
}
