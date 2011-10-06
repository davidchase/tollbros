//This function will add a textbox to the theme options page
jQuery(document).ready(function(){
	var num = 4;
	jQuery("a#add").click(function(){
	var totalNum = num++;
	var $box = jQuery('<input/>')
		.attr({ type: 'text', name: 'tollbros_theme_options[slider' + totalNum + ']' , value:'',id:'tollbros_theme_options[slider' + totalNum + ']'})
		.addClass("regular-text");
	jQuery("#holder").append($box,'<br/>');
	jQuery("#options").submit();
	});
});