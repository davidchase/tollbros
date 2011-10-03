//This function will add a textbox to the theme options page
jQuery(document).ready(function($) {
	$("a#add").click(function(){
	var $box = $('<input/>').attr({ type: 'text', name:'tollbros_theme_options[slider]', value:''}).addClass("regular-text");
	$("#holder").append($box);
	});
})(jQuery);