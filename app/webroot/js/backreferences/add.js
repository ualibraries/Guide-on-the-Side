// can't use $(document).ready() here for some reason. tinyMCEPopup.onInit.add() works, though.

function start() {

  // Get any text selected
  var highlighted_text = tinyMCEPopup.editor.selection.getContent({format : 'text'});
  var bookmarker = tinyMCEPopup.editor.selection.getBookmark();
  $('#BackreferenceLinkText').val(highlighted_text);


  // Calculate the page break numbers
  var breaks = $(parent.document).find('#TutorialContent_ifr').contents().find('body img.heading').length;
  for (var i = 1; i <= breaks; i++) 
    $('.backreference-pages').append($('<option>').html('Page ' + i).val(i));
    
  // Not IE compatible
  if (!$.browser.msie) {
  
    // Add picker option
    var e = $('<img>').attr({'src':'../tutorials/view_heading_image/step/','class':'page-img'}).click(function(){
      $(parent.document).find('#mceModalBlocker').hide();
      $(parent.document).find('body>div.clearlooks2').animate({'left':'+=200px'},500);
    });
    $('.backreference-pages').after(e).after('<i> or by selecting a Page Break by click the image below</i> <br />');

    // Listener for picker
    $(parent.document).find('#TutorialContent_ifr').contents().find('img.heading').each(function(i,t){
      $(this).click(function(e){
        $(parent.document).find('body>div.clearlooks2').animate({'left':'-=200px'},500);
        $('#BackreferenceJumpToPage option[value="'+(i+1)+'"]').attr('selected',true);
        $('#BackreferenceJumpToPage').effect('highlight', {color: 'yellow'}, 2500);
        $(parent.document).find('#mceModalBlocker').show();
      });
    });
  }

  // Submits Popup Data
  $('#BackreferenceAddForm').submit(function() {
    text = $('#BackreferenceLinkText').val();
    page = $('#BackreferenceJumpToPage').val();
    html = '<a href="#" class="backreference-jump" data-page="' + page + '">' + text + '</a>';
    tinyMCEPopup.editor.selection.moveToBookmark(bookmarker);
    tinyMCEPopup.editor.execCommand('mceInsertContent', false, html);
    tinyMCEPopup.close();
    return false;
  });


  // Cancels Popup
  $('#cancel').click(function () {
    tinyMCEPopup.close();
  });
  
}

tinyMCEPopup.onInit.add(start);