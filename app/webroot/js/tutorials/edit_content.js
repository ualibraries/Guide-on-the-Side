$(document).ready(function() {

  toggle_publish_link = function () {
    if (tutorial_published) {
      $('#publish').hide();
      $('#unpublish').show();
    } else {
      $('#unpublish').hide();
      $('#publish').show();
    }
  };

  toggle_publish_link();

  $('#publish-links a').click(function() {
    $.get(this.href,
      function(data) {
        if (data == 'Published') {
          tutorial_published = 1;
          alert(data);
        } else {
          tutorial_published = 0;
        }
        toggle_publish_link();
      }
    );
    return false;
  });

  $('#TutorialEditContentForm').bind('form-pre-serialize', function(data) {
    tinyMCE.triggerSave();
  });

  $('#preview').click(function() {
    // if the user has changed the editor
    if (tinyMCE.activeEditor.isDirty()) {
      save_dialog = "<div>This will preview the tutorial in a new window / tab as it was last saved. "
        + "How would you like to proceed?</div>";
      $(save_dialog).dialog({
        title: 'Preview',
        resizable: false,
        modal: true,
        width: 600,
        buttons: {
          "Save and preview": function() {
            window.open($('#preview').attr('href'));
            $('#TutorialEditContentForm').trigger('submit');
//            tinyMCE.triggerSave(true);
//            postData = $('#TutorialEditContentForm').serialize();
//  //          alert(postData);
//            $.post(cakephp.webroot + 'tutorials/edit_content/' + cakephp.tutorial_id, postData, function(data) {
//              if (data.success) {
//                window.open($('#preview').attr('href'));
//                $(this).dialog('close');
//              } else {
//                $(this).dialog('close');
//  //              alert(data.message);
//              }
//            }, 'json');
          },
          "Preview, don't save": function() {
            window.open($('#preview').attr('href'));
            $(this).dialog('close');
          },
          "Never mind": function() {
            $(this).dialog('close');
          }
        }
      });
      return false;
    } else {
      return true;
    }
  });

  $(window).bind('beforeunload', function() {
//    if (cakephp.content_checksum != md5(tinyMCE.activeEditor.getContent())) { // can't get this to work
    if (tinyMCE.activeEditor.isDirty()) {
      return 'You have unsaved changes!';
    }
  });

});