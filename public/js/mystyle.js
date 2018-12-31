// JavaScript Document


$(document).ready(function(e) {
	
//結帳流程-配送方式 (label input對換)
//route=checkout/checkout
$('.checkout-checkout #collapse-shipping-method .panel-body .radio').each(function(){
SM_label = $(this).find('label');
SM_input = SM_label.find('input');


SM_input01 = SM_input.attr('value');//取得value
SM_input.attr('id',SM_input01);//命名id(value)
SM_label.attr('for',SM_input01);//套上label

SM_label_t = SM_label.text();//取得文字
SM_label.before(SM_input); //加入在label前方
});


});

//-------上下滑動區塊-------
$(document).ready(function(){
  $('body').append('<div class="goTop" style="position: fixed; right:3%; bottom: 10%;display:none;cursor:pointer;"><img src="http://fen.bixone.com/wish/image/catalog/mystyle/ad/icon/goTop.png"></div>')
  // 幫 a.goTop 加上 click 事件
  $('.goTop').click(function(){
	  // 讓捲軸用動畫的方式移動到 0 的位置
	  var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
	  $body.animate({
		  scrollTop: 0
	  }, 600);

	  return false;
  });
});

$(document).scroll(function() {
	$scroll = $('body').scrollTop();
	if ( $scroll > 500 ){$('.goTop').css('display','block');
	}else{$('.goTop').css('display','none');}
});
//-------上下滑動區塊-------end
