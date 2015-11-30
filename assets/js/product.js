$(document).ready(function(){
    $('.tab_link').tab();
    $('.slider').slide();
    $('.item').accordion();

    $('.btn-plus').click(function() {
        var objQty = '#qty-' + $(this).data('id');
        var currentVal = parseInt($(objQty).val());

        if (currentVal < 99) {
            $(objQty).val(currentVal + 1);
        }
    });

    $('.btn-min').click(function() {
        var objQty = '#qty-' + $(this).data('id');
        var currentVal = parseInt($(objQty).val());
        if (currentVal > 1) {
            $(objQty).val(currentVal - 1);
        }
    });

    $('.btn-add').click(function() {
        var product_id = $(this).data('id');
        var size = $('#size-' + product_id).val();
        var qty = $('#qty-' + product_id).val();

        if (!size) {
            alert('Please select size..');
        }
        if (!qty) {
            alert('Please input quantity..');
        }

        if (product_id && size && qty) {
            $.ajax({
                type : 'post',
                url : site_url + 'cart/insert',
                data : {'id' : product_id, 'size' : size, 'qty' : qty},
                dataType: 'json',
                cache : false,
                success : function(response) {
                    console.log(response);
                },
                error : function() {
                    alert('Error while request..');
                }
            });
        }
    });
    
//    function fixIds(elem, cntr) {
//        $(elem).find("[id]").add(elem).each(function() {
//            this.id = this.id.replace(/\d+$/, "") + cntr;
//            console.log(this.id);
//        })
//    }
    
   
    
//    $("form#list-cart-form :input").each(function(e){
//	var code = e.keyCode || e.which;
//	  if (code == 13) { 
//	    e.preventDefault();
//	    var input = $(this);
//	    return false;
//	  }
//	  // This is the jquery object of the input, do what you will
//	 
//	});

    var cloneCntr = 1;
    $('.btn-update').click(function() {
    	console.log('update');
        var product_id = $(this).data('id');
//        console.log(product_id);
        var size = $('#size-' + product_id).val();
        var qty = $('#qty-' + product_id).val();
        var table = $("#list-cart").clone(true,true) 
        fixIds(table, cloneCntr);
        table.insertAfter("#table");
        cloneCntr++;
//        if (!size) {
//            alert('Please select size..');
//        }
//        if (!qty) {
//            alert('Please input quantity..');
//        }

        if (product_id && size && qty) {
            $.ajax({
                type : 'post',
                url : site_url + 'cart/update_all',
                data : {'id' : product_id, 'size' : size, 'qty' : qty},
                dataType: 'json',
                cache : false,
                success : function(response) {
                    console.log(response);
                },
                error : function() {
                    alert('Error while request..');
                }
            });
        }
    });
    
    $('.btn-checkout').click(function() {
    	console.log('update');
        var product_id = $(this).data('id');
//        console.log(product_id);
        var size = $('#size-' + product_id).val();
        var qty = $('#qty-' + product_id).val();
        var table = $("#list-cart").clone(true,true) 
        //fixIds(table, cloneCntr);
        //table.insertAfter("#table") 
        //cloneCntr++;
//        if (!size) {
//            alert('Please select size..');
//        }
//        if (!qty) {
//            alert('Please input quantity..');
//        }

        if (product_id && size && qty) {
            $.ajax({
                type : 'post',
                url : site_url + 'cart/checkout',
                data : {'id' : product_id, 'size' : size, 'qty' : qty},
                dataType: 'json',
                cache : false,
                success : function(response) {
                    console.log(response);
                },
                error : function() {
                    alert('Error while request..');
                }
            });
        }
    });
});
