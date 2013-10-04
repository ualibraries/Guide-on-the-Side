var api = null;

$(document).ready(function() {

// This function is from http://awardwinningfjords.com/2010/09/22/handling-touch-events-in-jquery-tools-scrollable.html
  $.fn.handleSwipes = function() {
    return this.each(function() {
      var api = $(this).data("scrollable");
      api.getRoot().addSwipeEvents()
         .bind('swipeleft', function() {
           api.next();
         })
         .bind('swiperight', function() {
           api.prev();
         });
    });
  };

  $('#progress').progressbar();

  var size_scrollable = function() {
    $('#scrollable').height($('body').height() - $('#progress').outerHeight(true) - $('#tab-1').height());
    $('#scrollable-quiz').height($('body').height() - $('#progress').outerHeight(true) - $('#tab-1').height());
  };

  size_scrollable();

  $('body').resize(size_scrollable);

  // all this depends on jQuery Tools...
  $("#scrollable").scrollable({
    items : '.items',
    touch : false
  }).handleSwipes();

  api = $("#scrollable").data("scrollable");

  $('#scrollable .items').height($('#scrollable .items .step:nth-child(1)').height());

  api.onSeek(function() {
    if ($('#scrollable:visible').length != 0) {
      $('#scrollable').scrollTop(0);
      $('#scrollable .items').height($('#scrollable .items .step:nth-child(' + (this.getIndex() + 1) + ')').height());
      var new_value = 100 * (this.getIndex() / (this.getSize() - 1));
      $('#progress').progressbar("option", "value", new_value);
      if (this.getIndex() == 0) {
        $('#tabs').children(':not(:first)').css('background-color', 'gray').css('color', 'white');
        $('#tabs :first').css('background-color', 'white').css('color', 'black');
      } else {
        $('#tabs').children(':not(:eq(1))').css('background-color', 'gray').css('color', 'white');
        $('#tabs :eq(1)').css('background-color', 'white').css('color', 'black');
      }
    }
    var current_step = this.getIndex();
    $('#table-of-contents li', parent.window.document).each(function() {
      var id = $(this).children('a').attr('id').split('-')[1];

      if (current_step - 1 >= id) { // the -1 is to deal with the introduction in a separate step at the beginning.
                                    //   We may want to get rid of that extra step.
        $(this).siblings().removeClass('current-chapter');
        $(this).addClass('current-chapter');
      }
    });
  });



  $('#email_and_print').submit(function() {
    var postData = $(this).serialize();
    $.post(cakephp.webroot + 'tutorials/view_certificate/', postData, function(returnData) {
      var dialog = '<div id="email-print" style="display: none" title="Results">' + returnData + '</div>'
      parent.$('body').append(dialog);
      parent.$('#email-print').dialog({
        modal : true,
        autoOpen : false,
        draggable : false,
        buttons : {
          Print : function() {
            parent.window.print();
          },
          Close : function() {
            var this_element = parent.$('#email-print');
            this_element.dialog("close");
            this_element.dialog("destroy");
            this_element.remove();
          }
        },
        width: 700,
        height : 'auto',
        beforeClose : function() {
          parent.$('email-print').text();
        }
      });
      parent.$('#email-print').dialog('open');
      parent.$('#email-print').closest('.ui-dialog').height('90%');
      parent.$('#email-print-wrapper').height(parent.$('#email-print').closest('.ui-dialog').height() - 200);
      parent.$('#email-print-wrapper').css('overflow-y', 'scroll');
    });

    return false;
  });

  $('.certificate_name').focus(function() {
    if ($(this).val() == 'Your name') {
      $(this).val('');
    }
  });

  $('.certificate_name').blur(function() {
    if ($(this).val() == '') {
      $(this).val('Your name');
    }
  });

  $('a[target=site-frame]').click(function() {
    $('#site-frame', parent.window.document).attr('src', $(this).attr('href'));
    return false;
  });

  $('.definition-body').hide();

  var generate_definition_boxes = function () {
    var this_id = $(this).attr('id');
    var uuid = this_id.replace('definition-link-', '');
    var body_div = "<aside id='definition-body-" + uuid + "' class='definition-body' style='display: none;'>";
    var definition_text = $(this).data('content');
    body_div += definition_text.QH_decodeURIComponent();
    body_div += "</aside>";
    $(this).after($(body_div));
  };

  $('.definition-link').each(generate_definition_boxes);

  $('.definition-link').click(function() {
    var this_id = $(this).attr('id');
    var uuid = this_id.replace('definition-link-', '');
    $('#definition-body-' + uuid).toggle();
    $('#scrollable .items').height($(this).parents('.step:visible').height());
  });

  parent.$('#feedback-frame').dialog({
      autoOpen : false,
      modal : true,
      height : 450,
      title : 'Provide feedback',
      buttons : {
          'Send feedback' : function() {
            var this_element = parent.$('#feedback-frame');
            var form = this_element.contents().find("#TutorialProvideFeedbackForm");
            var postData = form.serialize();
            var action = form.attr('action');
            $.post(action, postData, function(data) {
              if (data == 'success') {
                alert('Your feedback has been sent.');

                this_element.dialog("close");
              } else {
                this_element.contents().find('form').append(
                '<div class="message">Your feedback was <strong>not</strong> sent. Please try again later.</div>'
                );
              }
            });

          }
        }
    });

  $('#provide-feedback').click(function() {
    parent.$('#feedback-frame').dialog("open");
    return false;
  });

  var response_dialog = "<div id='response-dialog'></div>";
  parent.$('body').append(response_dialog);
  parent.$('#response-dialog').dialog({
    autoOpen : false,
    modal : true,
    draggable : false,
    close: function (event, ui) {
      $('#' + parent.$('#response-dialog').data('radio-return')).focus();
    }
  });

  parent.$('#response-dialog').parents('.ui-widget').click(function () {
    parent.$('#response-dialog').dialog("close");
  });

  // Quiz questions don't have pop-ups. Is this being checked at the backend? That could be problematic if
  //   you copy and paste from a tutorial into a quiz.
  $('#scrollable :not(.no-feedback) > .answers').append("<button type='button'>Check Answer</button>");

  // Since we've inserted HTML, adjust the height
  $('#scrollable .items').height($('#scrollable .items .step:nth-child(1)').height());

  $('#scrollable :not(.no-feedback) > .answers > button').click(function(e) {
    var getData = $(this).parents('.answers').children('input').serialize();
    $.post(cakephp.webroot + 'questions/get_immediate_feedback/' + cakephp.tutorial_id, getData, function(data) {
      parent.$('#response-dialog').html(data.response);
      if (data.correct) {
        parent.$('#response-dialog').dialog({'dialogClass': 'correct', 'title': data.response_heading});
      } else {
        parent.$('#response-dialog').dialog({'dialogClass': 'incorrect', 'title': data.response_heading});
      }
      parent.$('#response-dialog').dialog("open");
      parent.$('#response-dialog').data('radio-return', $(e.target).attr('id').replace(/(\[|\])/g, '\\$1'));
    }, 'json');
  });

  $('a.prev').tooltip( { position: { my: 'center bottom', at: 'center top-15' } } );

  $('a.next').tooltip( { position: { my: 'center bottom', at: 'center top-15' } } );

  // Use jquery_ui buttons even when buttons aren't part of a dialog
  $( "input:submit" ).button();

});
