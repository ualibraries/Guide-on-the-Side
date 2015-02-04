$(document).ready(function() {
	var viewportHeight = $(window).height();
	$('.gots_thumbnail_link').click(function(e){
		e.preventDefault();
		options = "height=" + viewportHeight + ", width=" + viewportHeight;
		window.open($(this).attr('href'), '', options);
	});
});
