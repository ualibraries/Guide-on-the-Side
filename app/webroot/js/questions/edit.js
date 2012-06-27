function edit_start() {
  $('#insert').attr('value', 'Update');

  $('#QuestionEditForm').submit(add_edit_form_submit);

}

tinyMCEPopup.onInit.add(edit_start);