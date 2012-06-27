
// can't use $(document).ready() here for some reason. tinyMCEPopup.onInit.add() works, though.
function start() {

  img_placeholder = tinyMCEPopup.editor.selection.getContent();
  if (img_placeholder != '') {
    regex = /tutorials\/view_heading_image\/([^/]+)\/([^'"]*?)['"]/;
    matches = regex.exec(img_placeholder);
    if (matches != null) {
      $('#insert').attr('value', 'Update');
      type = matches[1].QH_decodeURIComponent();
      title = matches[2].QH_decodeURIComponent();
      $('#HeadingAddForm input:radio[value="' + type + '"]').attr('checked', 'checked');
      $('#HeadingTitle').val(title);
    }
  }
  
  activateTitle = function(element, initial_load) {
    if (element.val() == 'chapter') {
      if (initial_load) {
        $('#HeadingTitle').parent('.input').show();
      } else {
        $('#HeadingTitle').parent('.input').slideDown();
      }
    } else {
      if (initial_load) {
        $('#HeadingTitle').parent('.input').hide();
      } else {
        $('#HeadingTitle').parent('.input').slideUp();
      }
    }
  }
  
  activateTitle($('#HeadingAddForm input:radio:checked'), true);
  
  $('#HeadingAddForm input:radio').change(function(event) {
    activateTitle($(this), false);
  })

  $('#HeadingAddForm').submit(function() {
    type = $('#HeadingAddForm input:radio:checked').val().QH_encodeURIComponent();
    if (type == 'chapter' && $('#HeadingTitle').val() == '') {
      alert('Chapter titles cannot be empty.');
      $('#HeadingTitle').focus();
    } else {
      title = $('#HeadingTitle').val().QH_encodeURIComponent()
      img = "<img class='heading' src='tutorials/view_heading_image/" +
        type  + "/" +
        title + "' />";
      tinyMCEPopup.editor.execCommand('mceInsertContent', false, img);
      tinyMCEPopup.close();
    }
    return false;
  });

  $('#cancel').click(function () {
    tinyMCEPopup.close();
  });
}

tinyMCEPopup.onInit.add(start);