
  jQuery(document).ready(function($) {
	var $loading = $('<div class="loading"><img src="images/spinner.gif" alt="" /></div>');
	$(".default").each(function(){
		var defaultVal = $(this).attr('title');
		$(this).focus(function(){
			if ($(this).val() == defaultVal){
				$(this).removeClass('active').val('');
			}
		});
		$(this).blur(function() {
			if ($(this).val() == ''){
				$(this).addClass('active').val(defaultVal);
			}
		})
		.blur().addClass('active');
	});
//        $("#form-contact :input").each( function() {
//            var valUes = $(this).val();
//            alert(valUes);
//         });
	$('.btn-submit').click(function(e){
                //$("#result").show();
		var $formId = $(this).parents('form');
		var formAction = $formId.attr('action');
		var email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		$('li',$formId).removeClass('error');
		$('span.error').remove();
		$('.required',$formId).each(function(){
			var inputVal = $(this).val();
			var $parentTag = $(this).parent();
			if(inputVal == ''){
                            
				$parentTag.addClass('error').append('<span class="error">Required field</span>');
			}
			if($(this).hasClass('email') == true){
				if(!email.test(inputVal)){
					$parentTag.addClass('error').append('<span class="error">Enter a valid email address.</span>');
                                        $('.email').val('');
                                }
			}
		});
                
		if ($('span.error').length == "0") {
                       // alert('niyas');
			$.post(formAction, $formId.serialize(),function(data){
                           //alert("submitted");
                //ga('send','pageview','/contact/v_submit.html');
				//ga("send","pageview","/"+window.location.href.split("/").reverse()[0]+"/v_submit");
				$('.loading').remove();
                                $("#result").html("<div class='success-message'><span class='close-msg'>X</span><p>"+data+"</p></div>");
				//$formId.append(data).fadeIn();
                                $("#result").show();
                                closeMsg();
			});
		}
		e.preventDefault();
	});
});


function clearInput() {
    $("#form-contact :input").each( function() {
       $(this).val('');
    });
}
function closeMsg(){
    $(".close-msg").click( function() {
        //alert('niyas');
        $("#result").hide();
        clearInput();
    });
}