(function($){
	initializeCollapse();

	/**
	 * Division switch
	 */
	$('#product-select-division').on('change',function() {
		resetDC('#product-select-category, #product-select-product', false);
		if ( this.value != 0 ) {
			ajaxRequest('getProductCategoriesByProductDivision', {
				division: this.value
			}, function ( result ) {
				if ( result.length ) {
					var categorySelect = $('#product-select-category');
					categorySelect.removeAttr('disabled');
					for ( var key in result ) {
						categorySelect.append('<option value="' + result[key].uid + '">' + result[key].title + '</option>');
					}
				} else {
					$('#product-select-info').hide();
					$('#product-data').html('<p class="alert alert-info"><i class="fa fa-info-circle fa-fw fa-lg"></i> ' + noCatMsg + '</p>');
				}
			}, 'json', 1425988258);
		}
	});

	/**
	 * Category switch
	 */
	$('#product-select-category').on('change',function() {
		resetDC('#product-select-product', true);
		if ( this.value != 0 ) {
			ajaxRequest('getProductsByProductCategory', {
				category: this.value,
				discontinued: $('#product-select-discontinued:checked').val() == 1
			}, function ( result ) {
				if ( result.length ) {
					var productSelect = $('#product-select-product');
					productSelect.removeAttr('disabled');
					for ( var key in result ) {
						productSelect.append('<option value="' + result[key].uid + '">' + result[key].title + '</option>');
					}
				} else {
					$('#product-select-info').hide();
					$('#product-data').html('<p class="alert alert-info"><i class="fa fa-info-circle fa-fw fa-lg"></i> ' + noProdMsg + '</p>');
				}
			}, 'json', 1425988258);
		}
	});

	/**
	 * Product switch
	 */
	$('#product-select-product').on('change',function() {
		$('#product-data').html('');
		if ( this.value != 0 ) {
			ajaxRequest('getProductData', {
				product: this.value
			}, function ( result ) {
				$('#product-data').html(result);
				initializeCollapse();
				$('#ecomproducttools-accordion').collapse();
				$('#product-select-info').hide();
			}, 'html', 1425988257);
		}
	});

	/**
	 * Discontinued switch
	 */
	$('#product-select-discontinued').on('change',function() {
		resetDC('#product-select-product', true);
		var categorySelect = $('#product-select-category');
		if ( categorySelect.val() != 0 ) {
			ajaxRequest('getProductsByProductCategory', {
				category: categorySelect.val(),
				discontinued: this.checked
			}, function (result) {
				if ( result.length ) {
					var productSelect = $('#product-select-product');
					productSelect.removeAttr('disabled');
					for ( var key in result ) {
						productSelect.append('<option value="' + result[key].uid + '">' + result[key].title + '</option>');
					}
				}
			}, 'json', 1425988258);
		}
	});

	resetDC('#product-select-category, #product-select-product', false);
	$('#product-select-division').val(0);
})(jQuery);

function ajaxRequest(action, arguments, onSuccess, dataType, pageType) {
	$('#ecom-product-tools-ajax-indicator').css('display', 'inline-block');
	$.ajax({
		async: 'true',
		url: 'index.php',
		type: 'POST',
		//contentType: 'application/json; charset=utf-8',
		dataType: dataType.length ? dataType : 'json',
		data: {
			eID: 'EcomProductTools',
			id: 120,
			L: 0,
			type: parseInt(pageType),
			request: {
				controllerName: dataType == 'json' ? 'JsonRequest' : 'AjaxRequest',
				actionName: action,
				arguments: arguments
			}
		},
		success: onSuccess,
		complete: function() {
			$('#ecom-product-tools-ajax-indicator').hide()
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log('Request failed with ' + textStatus + ': ' + errorThrown +  '!');
		}
	});
}

function resetDC(ids, enableCheckbox) {
	$(ids).attr('disabled', 'disabled');
	$(ids).find('option:not(:eq(0))').remove();
	$('#product-select-info').show();
	if( enableCheckbox ) {
		$('#product-select-discontinued').removeAttr('disabled');
		$('#checkbox-discontinued').removeClass('disabled');
	} else {
		$('#product-select-discontinued').attr('disabled', 'disabled').attr('checked', false);
		$('#checkbox-discontinued').addClass('disabled');
	}
	$('#product-data').html('');
}

function initializeCollapse() {
	$('.panel-title').each(function(index) {
		if ( index > 0 ) {
			$(this).addClass('collapsed');
		}
	});
	$('.collapse.in').each(function(index) {
		if ( index > 0 ) {
			$(this).removeClass('in');
		}
	});
}