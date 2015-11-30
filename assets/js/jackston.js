/*
-----------------------------------------
Hak cipta:
Kode ini ditulis oleh : Maulana D. Syah,
dilarang menghapus hak cipta ini.
-----------------------------------------
*/
/* Hover product 
=========================================*/
$(document).ready(function(){
  $(".produk").hover(function(){
    $(this).children('.hoverproduk').css("display","block");
    },function(){
    $(this).children('.hoverproduk').css("display","none");
  });
});
$(document).ready(function(){
  $(".frmsub").hover(function(){
    $('.hov p').css("display","block");
    },function(){
    $('.hov p').css("display","none");
  });
});/**/

/* Focus 
=========================================*/
$(document).ready(function(){
  $("#emailSub").focus(function(){
    $('.hov p').css("display","block");
  }).blur(function() {  
    	$('.hov p').css("display","none");  
	});
});

/* Search 
=========================================*/
$(document).ready(function(){
  $(".cari").click(function(){
    $('.cSearch').slideToggle();
  })
});

/* Menu 
=========================================*/
$(function() {
	var pull 		= $('#pull');
	var	menu 		= $('nav ul');
	var	menuHeight	= menu.height();

	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	$('#m1c').on('click', function(e) {
		e.preventDefault();
		$('#sub2').css('display','none');
		//$('#sub2').slideUp();
		$('#sub1').slideToggle();
	});
	
	$('#m2c').on('click', function(e) {
		e.preventDefault();
		$('#sub1').css('display','none');
		//$('#sub1').slideUp();
		$('#sub2').slideToggle();
	});

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 320 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
});
$(function(){
	var menu = $('#menu'),
		pos = menu.offset();
		$(window).scroll(function(){
			if($(this).scrollTop() > pos.top && menu.hasClass('normal')){
		//alert("Masuk");
				menu.fadeOut('fast', function(){
					$(this).removeClass('normal').addClass('fixed').fadeIn('fast');
				});
			} else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('fixed').addClass('normal').fadeIn('fast');
				});
			}
		});
});

/* Accordion 
=========================================*/
(function($){
	$.fn.accordion = function(){
		$(this).click(function (){
			if($(this).next('.item-data').css('display') != 'block'){
				$('.item').css('background-image','url("assets/arr/right.png")');
				$('.active').slideUp('fast').removeClass('active');
				$(this).next('.item-data').addClass('active').slideDown('slow');
				$(this).css('background-image','url("assets/arr/bottom.png")');
			}
			else {
				$('.active').slideUp('fast').removeClass('active');
				$(this).css('background-image','url("assets/arr/right.png")');
			}
		});
	};
}(jQuery));

/* Slide 
=========================================*/
(function($){
	$.fn.slide = function(){
		return $(this).each(function(){
			var idSlide = '#'+$(this).attr('id');
			var slideCount = $(idSlide+' ul li').length;
			var slideWidth = $('.twelve').width();
			var slideHeight = $('.twelve').height();
			var sliderUlWidth = slideCount * slideWidth;
			$(idSlide).css({ width: slideWidth });
			$(idSlide+' ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
			$(idSlide+' ul li').css({ width: slideWidth});
			$(idSlide+' ul li:last-child').prependTo(idSlide+' ul');
			function moveLeft() {
				$(idSlide+' ul').animate({
					left: + slideWidth
				}, 200, function () {
					$(idSlide+' ul li:last-child').prependTo(idSlide+' ul');
					$(idSlide+' ul').css('left', '');
				});
			}
			function moveRight() {
				$(idSlide+' ul').animate({
					left: - slideWidth
				}, 200, function () {
					$(idSlide+' ul li:first-child').appendTo(idSlide+' ul');
					$(idSlide+' ul').css('left', '');
				});
			}
			$(idSlide+' a.control_prev').click(function () {
				moveRight();
			});
			$(idSlide+' a.control_next').click(function () {
				moveLeft();
			});
		});
	};
}(jQuery));

/* Tab
=========================================*/
(function($){
	$.fn.tab = function(){
		var container_id;
		var bolat = false;
		function closed(){
			$('.tab_link_selected').removeClass('tab_link_selected');
			$('.active_tab').slideUp();
			$(container_id).removeClass('active_tab');
			bolat = false;
		}
		$("."+$(this).attr('class')).on('click', function(event){
			event.preventDefault(); 
			$('.tab_link_selected').removeClass('tab_link_selected');
			$(this).addClass('tab_link_selected');
			container_id = $(this).attr('title');
			if(bolat===false) {
				bolat = true;
				$(container_id).addClass('active_tab'); 
				$('.active_tab').slideDown();
			}
			else{
				$('.active_tab').animate({  
					height : 'toggle' , opacity : 'toggle'
				},function(){ 
					if(container_id == ('#'+$(this).attr('id'))){
						closed();
					}
					else{
						$(this).removeClass('active_tab');
						$(container_id).addClass('active_tab'); 
						$('.active_tab').animate({
							height : 'toggle' , opacity : 'toggle'
						});
					}
				});
			}
		});
		$('.closetab').click(function(){
			closed();
		});
	};
}(jQuery));
