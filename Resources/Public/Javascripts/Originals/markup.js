! function(o) {
	var items = 4;

	if (o("#tx-ecom-product-tools-carousel").length) {
		var t = o("#tx-ecom-product-tools-carousel");
		t.owlCarousel({
			items: items,
			dots: false,
			nav: o("#tx-ecom-product-tools-carousel .item").length > items ? true : false,
			responsive: {
				0: {
					items: 2
				},
				481: {
					items: items
				}
			}
		}), o(".item", t).click(function() {
			var t = "#" + o(this).attr("rel");
			o("html, body").animate({
				scrollTop: o(t).offset().top - 100
			}, 500)
		})
	}

	if (o("#tx-ecom-product-tools-carousel .item").length <= items) {
		o("#tx-ecom-product-tools-carousel").addClass('fit');
	}
}(jQuery);