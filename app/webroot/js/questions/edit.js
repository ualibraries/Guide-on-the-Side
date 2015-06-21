function edit_start(ed) {
  $('#insert').attr('value', ed.getLang('update'));

  $('#QuestionEditForm').submit(add_edit_form_submit);

}

tinyMCEPopup.requireLangPack();
tinyMCEPopup.onInit.add(edit_start);