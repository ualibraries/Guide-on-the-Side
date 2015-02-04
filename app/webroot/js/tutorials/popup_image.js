$(document).ready(function() {
	var viewportHeight = $(window).height();
	var viewportWidth = $(window).width();
	$('.gots_thumbnail_link').click(function(e){
		title = $(this).children('img').attr('title');
		if(!title)
			title = "";
		image_styles = "max-width: 100%; max-height: " + viewportHeight + "px;";
		image = '<img src="' + $(this).attr('href') + '" alt="'+title+'" style="'+image_styles+'">';
		html = '<!DOCTYPE HTML>';
		html += '<html><head><meta charset="UTF-8"><title>'+title+'</title></head>';
		html += '<body style="text-align: center;">'+image+'</body></html>';
		e.preventDefault();
		options = "height=" + viewportHeight + ", width=" + viewportHeight;
		newWindow = window.open('', title, config=options)
		newWindow.document.write(html);
	});
});
