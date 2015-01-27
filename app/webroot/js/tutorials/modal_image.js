$(document).ready(function() {
	parent.$('body').append('<div id="gots_modal_image_box"></div>');
	$('.gots_thumbnail_link').click(function(e){
		e.preventDefault();
		parent.$('#gots_modal_image_box').empty();
		modal_image = '<img src="' + $(this).attr('href') + '">';
		parent.$('#gots_modal_image_box').append(modal_image);
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
