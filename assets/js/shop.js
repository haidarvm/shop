$(function($) {
	'use strict', $.fn.digits = function() {
		return this.each(function() {
			$(this).text(
					$(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
		})
	};
	jQuery('.number').keyup(function() {
		 this.value = this.value.replace(/[^0-9\.]/g,'');
		// console.log(this.value.replace(/[^0-9\.]/g,''));
	});
	// $(".number").digits();
	$('.numbers').priceFormat({
		prefix : '',
		thousandsSeparator : ',',
		centsLimit : 0
	});

});