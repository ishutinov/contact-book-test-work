$(document).ready(function(){

$(function(){

    $(document).on( 'scroll', function(){

    	if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
	$(document).on("click", "a.test", function(){ delContact(this.id); });
	$('.scroll-top-wrapper').on('click', scrollToTop);
});

function delContact(value) {
  $('#indicator').fadeIn();
  $.ajax({
    type: "POST",
    url: "/contacts/delete/"+value,
    dataType: "html",
    success:function(response) {
		$('#indicator').fadeOut();
		if(response === '') {
			$("div#result").html('Возникла ошибка. Код ошибки: #1');
		} else if(response != '') {
			$("div#result").html(response);
			$('#contactlist').find('tr#'+value).remove();
		}
    },
    error:function(xhr, str) {//ошибки запроса
      alert('Возникла ошибка. Код ошибки: #2');
    }
  });
}

function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});
