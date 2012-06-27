// can't use $(document).ready() here for some reason. tinyMCEPopup.onInit.add() works, though.
function add_start() {

  update_order = function() {
    $('#answers > tbody > tr').each(function(index) {
      $(this).find('[id$=Order]').val(index);
    });
  };

  $('#answers > tbody').sortable({
    axis : 'y',
    update: update_order
  });

  add_edit_form_submit = function() {
    tinyMCE.triggerSave(); // put the text back into the textareas
    var postData = $(this).serialize();
    $.post(cakephp.webroot + 'questions/add', postData, function(data) {
      result = tinyMCE.util.JSON.parse(data);
      if (parseInt(result) > 0) {
        img = "<img class='question' src='questions/view_image/" + result + "' />";
        tinyMCEPopup.editor.execCommand('mceInsertContent', false, img);
        tinyMCEPopup.close();
      } else {
        var errors_display = '';
        for (error in result) {
          errors_display += error + ': ' + result[error] + '\n';
        }
        alert(errors_display);
      }
    });
    return false;
  };

  $('#QuestionAddForm').submit(add_edit_form_submit);

  $('#add-answers').click(function() {
    // figure out the number of rows, clone the first row, modify it, and append it
    number_of_rows = $('#answers > tbody > tr').size();
//    $('#answers > tbody > tr:first textarea').each(function(index, element) {
//      tinyMCE.execCommand('mceRemoveControl', false, $(this).attr('id'));
//    });
    new_row = $('#answers > tbody > tr:first').clone();
//    $('#answers > tbody > tr:first textarea').each(function(index, element) {
//      tinyMCE.execCommand('mceAddControl', false, $(this).attr('id'));
//    });
    new_row.find('input').attr('id', function(index, attr) {
      return attr.replace('0', number_of_rows);
    })
    new_row.find('input').attr('name', function (index, attr) {
      return attr.replace('0', number_of_rows);
    });
    new_row.find('input[type=radio]').attr('checked', false);
    new_row.find('input').val(number_of_rows); // text box and radio button
    new_row.find('textarea').attr('id', function(index, attr) {
      return attr.replace('0', number_of_rows);
    })
    new_row.find('textarea').attr('name', function (index, attr) {
      return attr.replace('0', number_of_rows);
    });
    new_row.find('textarea').val('');
    new_row.find('label').attr('id', function(index, attr) {
      return attr.replace('0', number_of_rows);
    });
    // bind the click handler to the new remove link
    new_row.find('.remove-answer').click(remove_answer);

    // if answer 0 was hidden, make the cloned row visible before appending
    new_row.show();

    new_row.appendTo('#answers > tbody');
//    new_row.appendTo('#answers > tbody').find('textarea').each(function(index, element) {
//      tinyMCE.execCommand('mceAddControl', true, $(this).attr('id'));
//    });

    return false;
  });

  remove_answer = function() {
    // we must leave two answers.
    if ($(this).parent().parent().parent().children('tr:visible').length > 2) {
      $(this).parent().parent().remove();
      update_order();
    } else {
      alert('You must have at least two answers.');
    }
    return false;
  };

  $('.remove-answer').click(remove_answer);

  $('#cancel').click(function () {
    tinyMCEPopup.close();
  });

}

tinyMCEPopup.onInit.add(add_start);

