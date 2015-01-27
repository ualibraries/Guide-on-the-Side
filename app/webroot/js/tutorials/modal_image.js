$(document).ready(function() {
	$('.gots_thumbnail_link').click(function(e){
		e.preventDefault();
		modal_image = '<img src="' + $(this).attr('href') + '">';
		modal_image_box = '<div id="gots_modal_image_box">' + modal_image + '</div>';
		parent.$('body').append(modal_image_box);
		parent.$('#gots_modal_image_box').dialog({
				modal: true,
				resizeable: false,
				draggable: false,
				width: 'auto',
				left: 0,
				top: 0,
				title: $(this).children('img').attr('title')
		});
	});
});
