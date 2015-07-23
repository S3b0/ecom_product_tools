! function($) {
	var items = 4;
	var prevButton = '.owl-prev';
	var nextButton = '.owl-next';

	if ($("#tx-ecom-product-tools-carousel").length) {
		var owl = $("#tx-ecom-product-tools-carousel");
		owl.owlCarousel({
			items: items,
			dots: false,
			nav: $("#tx-ecom-product-tools-carousel .item").length > items ? true : false,
			responsive: {
				0: {
					items: 2
				},
				481: {
					items: items
				}
			}
		}), $(".item", owl).click(function() {
			var item = "#" + $(this).attr("rel");
			$("html, body").animate({
				scrollTop: $(item).offset().top - 100
			}, 500)
		});
		toggleNavigation();
		owl.on('translated.owl.carousel', function () { toggleNavigation(); });
	}

	if ($("#tx-ecom-product-tools-carousel .item").length <= items) {
		$("#tx-ecom-product-tools-carousel").addClass('fit');
	}

	function toggleNavigation() {
		// Only 1 Page
		if(owl.find(".owl-item").last().hasClass('active') && owl.find(".owl-item").first().hasClass('active')) {
			owl.find(nextButton).addClass("off");
			owl.find(prevButton).addClass("off");
		}
		// Next
		else if(owl.find(".owl-item").last().hasClass('active')){
			owl.find(nextButton).addClass("off");
			owl.find(prevButton).removeClass("off");
		}
		// Prev
		else if(owl.find(".owl-item").first().hasClass('active')) {
			owl.find(nextButton).removeClass("off");
			owl.find(prevButton).addClass("off");
		}
		else {
			owl.find(prevButton).removeClass("off");
			owl.find(nextButton).removeClass("off");
		}
	}
}(jQuery);