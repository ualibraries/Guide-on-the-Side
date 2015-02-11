$(document).ready(function() {
	var viewportHeight = $(window).height();
	$('.gots_thumbnail_link').click(function(e){
		aspectRatio = $(this).children('img').attr('width')/$(this).children('img').attr('height');
		height = 1.1*viewportHeight;
		width = height * aspectRatio;
		e.preventDefault();
		options = "height=" + height + ", width=" + width;
		window.open($(this).attr('href'), '', options);
	});
});
