/*
 * Author: Haidar Mansur Mar'ie
 * Date: August 15 2015
 * Description:
 *      This is a dashboard js for insert quick product and some basic report
 **/

var product_id = $('#product_id').val();
var image_id = $('#image_id').val();

function changeUrl(product_id, image_id) {
	if (history.pushState) {
		var newurl = window.location.protocol + "//" + window.location.host
				+ window.location.pathname + '?product_id=' + product_id
				+ '&image_id=' + image_id;
		window.history.pushState({
			path : newurl
		}, '', newurl);
	}
}
//changeUrl(product_id, image_id);

var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = decodeURIComponent(window.location.search.substring(1)), sURLVariables = sPageURL
			.split('&'), sParameterName, i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : sParameterName[1];
		}
	}
};

//var prod_id_url = getUrlParameter('product_id');
//var img_id_url = getUrlParameter('image_id');

var url_upload = site_url + "upload/do_upload/" + product_id + "/" + image_id;
console.log('top log =' + url_upload);

$(function() {
	$('#insert-product').click(
			function() {
				$('#quick-product-box').block({
					message : '<h1>Processing</h1>',
					css : {
						border : 'none',
						padding : '15px',
						backgroundColor : '#000',
						'-webkit-border-radius' : '10px',
						'-moz-border-radius' : '10px',
						opacity : .5,
						color : '#fff'
					}
				});
				var product_data = $('#quick-product').serializeArray();
				$.ajax({
					method : "POST",
					url : site_url + "admin/product/insert_quick_product",
					data : product_data
				// On Done Insert New Product
				}).done(
						function(msg) {
							$(':input', '#quick-product-box').not(
									':button, :submit, :reset').val('')
									.removeAttr('checked').removeAttr(
											'selected');
							console.log("Product Created: " + msg);
							console.log("Product Draft Created: " + msg);
							var data = JSON.parse(msg);
							console.log('product_id' + data.product_id);
							$('#product_id').val(data.product_id);
							$('#image_id').val(data.image_id);
							product_id = data.product_id;
							image_id = data.image_id;
							url_upload = site_url + "upload/do_upload/" + data.product_id + "/" + data.image_id;
							console.log('after insert=' + url_upload);
							changeUrl(data.product_id, data.image_id);
							$('#quick-product-box').block({
								message : '<h2>Successfully Created </h2>' +
								// '<p>' + msg + '</p>' +
								'You can Create New one',
								css : {
									border : 'none',
									padding : '15px',
									backgroundColor : '#000',
									'-webkit-border-radius' : '10px',
									'-moz-border-radius' : '10px',
									opacity : .5,
									color : '#fff'
								}
							});
							setInterval(function() {
								$('#quick-product-box').unblock();
							}, 1500);
							$('#files').empty();
							$(".progress-bar").css("width", "0%");
							window.location = window.location.pathname + '?product_id=' + product_id + '&image_id=' + image_id
						}).always(function() {
					// $('#files').remove();
					// $('#description').editor.clear();
					// $("input[name='_wysihtml5_mode']").val('');
					// $('#description').data("wysihtml5").editor.clear();
				});

			});
		
		$('#btn-login').click( function() {
			console.log('login');
			window.location = site_url + 'user/register';
		});
		
		$('.btn-admin-add').click( function() {
			var action = $('.btn-admin-add').data('action');
			console.log(action);
			window.location = site_url + 'admin/' + action + '/insert';
		});
		
		$('.btn-checkout').click( function() {
			console.log('checkout');
			$('#update-all').submit();
			//window.location = site_url + 'cart/checkout';
		});
		
//		$('.btn-admin').click( function() {
//			var actions = $('.btn-admin').data('action');
//			console.log(actions);
//			window.location = site_url + 'admin/' + action + '/insert';
//		});
		
		$('#update-product').click(
			function() {
				$('#quick-product-box').block({
					message : '<h1>Processing</h1>',
					css : {
						border : 'none',
						padding : '15px',
						backgroundColor : '#000',
						'-webkit-border-radius' : '10px',
						'-moz-border-radius' : '10px',
						opacity : .5,
						color : '#fff'
					}
				});
				var product_data = $('#quick-product').serializeArray();
				$.ajax({
					method : "POST",
					url : site_url + "admin/product/update",
					data : product_data
				// On Done Insert New Product
				}).done(
						function(msg) {
							$(':input', '#quick-product-box').not(
									':button, :submit, :reset').val('')
									.removeAttr('checked').removeAttr(
											'selected');
							console.log("Product Created: " + msg);
							console.log("Product Draft Created: " + msg);
							var data = JSON.parse(msg);
							console.log('product_id' + data.product_id);
							$('#product_id').val(data.product_id);
							$('#image_id').val(data.image_id);
							product_id = data.product_id;
							image_id = data.image_id;
							url_upload = site_url + "upload/do_upload/" + data.product_id + "/" + data.image_id;
							console.log('after insert=' + url_upload);
							changeUrl(data.product_id, data.image_id);
							$('#quick-product-box').block({
								message : '<h2>Successfully Created </h2>' +
								// '<p>' + msg + '</p>' +
								'You can Create New one',
								css : {
									border : 'none',
									padding : '15px',
									backgroundColor : '#000',
									'-webkit-border-radius' : '10px',
									'-moz-border-radius' : '10px',
									opacity : .5,
									color : '#fff'
								}
							});
							setInterval(function() {
								$('#quick-product-box').unblock();
							}, 1500);
							$('#files').empty();
							$(".progress-bar").css("width", "0%");
							window.location.href = site_url + "admin/product/";
							//window.location = window.location.pathname + '?product_id=' + product_id + '&image_id=' + image_id
						}).always(function() {
					// $('#files').remove();
					// $('#description').editor.clear();
					// $("input[name='_wysihtml5_mode']").val('');
					// $('#description').data("wysihtml5").editor.clear();
				});

			});
		$.fn.digits = function() {
			return this.each(function() {
				$(this).text(
						$(this).text().replace(
								/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
			})
		};
		$('.number').keyup(function() {
			this.value = this.value.replace(/[^0-9\.]/g, '');
			// console.log(this.value.replace(/[^0-9\.]/g,''));
		});
		// $(".number").digits();
		$('.numbers').priceFormat({
			prefix : '',
			thousandsSeparator : ',',
			centsLimit : 0
		});
		
		$('#select-cat').change( function() {
		      location.href = $(this).val();
		   });

});
