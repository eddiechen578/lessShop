// JavaScript Document

/*menu 增加連結*/
$(document).ready(function(){
	
	//menu外連
	href_blog='<li><a href="https://lesscrew-less.blogspot.tw/" target="_blank">NEWS</a></li>';
	$('#menu .navbar-nav').append(href_blog);
	
	/*cart 購物車
	carttext = $('#cart-total').html().split('件商品');
	$('#cart-total').html(carttext[0]+"/"+carttext[1]);
	*/
	
	
	//menuTop隱藏收藏清單
	$('.list-inline li:nth-child(3)').css('display','none');


	//隱藏 左側菜單商品數量
	locatonSP = location.href.split('route=');
	checkhref = 'checkout/checkout';
	if ( locatonSP[1] == checkhref ){
	}else{
		$(".list-group").find('a:contains("OUR")').css('display','none');
		/*
		menuleft = $(".list-group").find('a:contains("OUR")');
		menuleft0 = menuleft.html().split('(0)');
		menuleft.html(menuleft0[0]);
		*/

	}

});

