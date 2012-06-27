
// can't use $(document).ready() here for some reason. tinyMCEPopup.onInit.add() works, though.
function start() {
  img_placeholder = tinyMCEPopup.editor.selection.getContent();
  if (img_placeholder != '') {
    regex = /tutorials\/view_definition_image\/([^/]+)\/([^'"]*?)['"]/;
    matches = regex.exec(img_placeholder);
    if (matches != null) {
      $('#insert').attr('value', 'Update');
      link_text = matches[1];
      link_text = link_text.QH_decodeURIComponent();
      definition = matches[2];
      definition = definition.QH_decodeURIComponent();
      $('#DefinitionLinkText').val(link_text);
      $('#DefinitionDefinition').val(definition);
    }
  }

  $('#DefinitionAddForm').submit(function() {
    tinyMCE.triggerSave(); // put the text back into the textareas
    link_text = $('#DefinitionLinkText').val();
    link_text = link_text.QH_encodeURIComponent();
    definition = $('#DefinitionDefinition').val();
    definition = definition.QH_encodeURIComponent();
    img = "<img class='definition' src='tutorials/view_definition_image/" +
      link_text  + "/" +
      definition + "' />";
    tinyMCEPopup.editor.execCommand('mceInsertContent', false, img);
    tinyMCEPopup.close();
    return false;
  });

  $('#cancel').click(function () {
    tinyMCEPopup.close();
  });
}

tinyMCEPopup.onInit.add(start);