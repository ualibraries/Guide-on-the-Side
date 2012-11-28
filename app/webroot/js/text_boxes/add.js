
// can't use $(document).ready() here for some reason. tinyMCEPopup.onInit.add() works, though.
function start() {

  img_placeholder = tinyMCEPopup.editor.selection.getContent();
  if (img_placeholder != '') {
    regex = /tutorials\/view_text_box_image\/([^/]+)\/([^/]+)\/([^'"]*?)['"]/;
    matches = regex.exec(img_placeholder);
    if (matches != null) {
      $('#insert').attr('value', 'Update');
      type = matches[1].QH_decodeURIComponent();
      prompt = matches[2].QH_decodeURIComponent();
      placeholder = matches[3].QH_decodeURIComponent();
      $('#TextBoxAddForm input:radio[value="' + type + '"]').attr('checked', 'checked');
      $('#TextBoxPrompt').val(prompt);
      $('#TextBoxPlaceholder').val(placeholder);
    }
  }
 
  $('#TextBoxAddForm').submit(function() {
    type = $('#TextBoxAddForm input:radio:checked').val().QH_encodeURIComponent();
    prompt = $('#TextBoxPrompt').val().QH_encodeURIComponent();
    if (prompt) {
        placeholder = $('#TextBoxPlaceholder').val().QH_encodeURIComponent();
        img = "<img class='text-box' src='tutorials/view_text_box_image/" +
        type  + "/" +
        prompt  + "/" +
        placeholder + "' />";
        tinyMCEPopup.editor.execCommand('mceInsertContent', false, img);
        tinyMCEPopup.close();
    } else {
        alert('Please fill out the "prompt" field. We need a way to identify the user\'s answer in the certificate.');
    }

    return false;
  });

  $('#cancel').click(function () {
    tinyMCEPopup.close();
  });
}

tinyMCEPopup.onInit.add(start);