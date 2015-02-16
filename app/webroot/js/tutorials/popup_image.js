$(document).ready(function() {
	var viewportHeight = $(window).height();
	$('body').append('<div class="gots_modal_image_box"></div>');
	$('.gots_thumbnail_link').each(function(){
		popup_image = '<img src="' + $(this).attr('href') + '">';
		$('.gots_modal_image_box').append(popup_image);
	});
	$('.gots_thumbnail_link').click(function(e){
		href = $(this).attr('href');
		width = $('img[src$="'+ href +'"]').width();
		height = $('img[src$="'+ href +'"]').height();
		aspectRatio = width/height;

		if(height > 600 || width > (600*aspectRatio)){
			height = 600;
			width = height * aspectRatio;
		}
		e.preventDefault();
		options = "height=" + height + ", width=" + width;
		window.open($(this).attr('href'), '', options);
	});
});
