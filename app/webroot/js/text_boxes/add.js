
// can't use $(document).ready() here for some reason. tinyMCEPopup.onInit.add() works, though.
function start() {

  img_placeholder = tinyMCEPopup.editor.selection.getContent();
  if (img_placeholder != '') {
    regex = /tutorials\/view_text_box_image\/([^/]+)\/([^'"]*?)['"]/;
    matches = regex.exec(img_placeholder);
    if (matches != null) {
      $('#insert').attr('value', 'Update');
      type = matches[1].QH_decodeURIComponent();
      placeholder = matches[2].QH_decodeURIComponent();
      $('#TextBoxAddForm input:radio[value="' + type + '"]').attr('checked', 'checked');
      $('#TextBoxPlaceholder').val(placeholder);
    }
  }
 
  $('#TextBoxAddForm').submit(function() {
    console.log('submit');
    type = $('#TextBoxAddForm input:radio:checked').val().QH_encodeURIComponent();
    placeholder = $('#TextBoxPlaceholder').val().QH_encodeURIComponent();
    img = "<img class='text-box' src='tutorials/view_text_box_image/" +
    type  + "/" +
    placeholder + "' />";
    tinyMCEPopup.editor.execCommand('mceInsertContent', false, img);
    tinyMCEPopup.close();

    return false;
  });

  $('#cancel').click(function () {
    tinyMCEPopup.close();
  });
}

tinyMCEPopup.onInit.add(start);