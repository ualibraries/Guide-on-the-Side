$(document).ready(function() {
	parent.$('body').append('<div class="gots_modal_image_box"></div>');
	$('.gots_thumbnail_link').each(function(){
		modal_image = '<img src="' + $(this).attr('href') + '">';
		parent.$('.gots_modal_image_box').append(modal_image);
	});
	$('.gots_thumbnail_link').click(function(e){
		parent.$('.gots_modal_image').removeClass('gots_modal_image');
		parent.$('img[src="'+ $(this).attr('href')+'"]').addClass('gots_modal_image');
		e.preventDefault();
		parent.$('.gots_modal_image_box').dialog({
				modal: true,
				resizeable: false,
				draggable: false,
				width: 'auto',
				dialogClass: 'gots_modal_image_dialog',
				title: $(this).children('img').attr('title')
		});
	});
});
