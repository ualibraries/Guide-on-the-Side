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

  size_scrollable = function() {
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
      new_value = 100 * (this.getIndex() / (this.getSize() - 1));
      $('#progress').progressbar("option", "value", new_value);
      if (this.getIndex() == 0) {
        $('#tabs').children(':not(:first)').css('background-color', 'gray').css('color', 'white');
        $('#tabs :first').css('background-color', 'white').css('color', 'black');
      } else {
        $('#tabs').children(':not(:eq(1))').css('background-color', 'gray').css('color', 'white');
        $('#tabs :eq(1)').css('background-color', 'white').css('color', 'black');
      }
    }
    current_step = this.getIndex();
    $('#table-of-contents li', parent.window.document).each(function() {
      id = $(this).children('a').attr('id').split('-')[1];
      
      if (current_step - 1 >= id) { // the -1 is to deal with the introduction in a separate step at the beginning.
                                    //   We may want to get rid of that extra step.
        $(this).siblings().removeClass('current-chapter');
        $(this).addClass('current-chapter');
      }
    });

//    $('#table-of-contents li', parent.window.document).removeClass('current-chapter');
//    console.log($('#table-of-contents li:eq(' + current_chapter + ')', parent.window.document).addClass('current-chapter'));
    
  });

  $('#tab-1').click(function() {
    $("#scrollable").show();
    $("#scrollable-quiz").hide();
    api.begin();
  });

  $('#tab-2').click(function() {
    $("#scrollable").show();
    $("#scrollable-quiz").hide();
    api.seekTo(1);
  });

//  $("#scrollable-quiz").scrollable();

//  var api_quiz = $("#scrollable-quiz").data("scrollable");

  $('#tab-3').click(function() {
    $("#scrollable").hide();
    $("#scrollable-quiz").show();
    api_quiz.begin();
  });

//  api_quiz.onSeek(function() {
//    if ($('#scrollable-quiz:visible').length != 0) {
//      $('#scrollable-quiz').scrollTop(0);
//      $('#scrollable-quiz .items').height($('#scrollable-quiz .items .step:nth-child(' + (this.getIndex() + 1) + ')').height());
//      new_value = 100 * (this.getIndex() / (this.getSize() - 1));
//      $('#progress').progressbar("option", "value", new_value);
//      $('#tabs').children(':not(:last)').css('background-color', 'gray').css('color', 'white');
//      $('#tabs :last').css('background-color', 'white').css('color', 'black');
//    }
//  });

  $('#email_and_print').submit(function() {
    var postData = $(this).serialize();
    console.log(postData);
    $.post(cakephp.webroot + 'tutorials/view_certificate/', postData, function(returnData) {
      dialog = '<div id="email-print" style="display: none" title="Results">' + returnData + '</div>'
      parent.$('body').append(dialog);
      parent.$('#email-print').dialog({
        modal : true,
        autoOpen : false,
        buttons : {
          Print : function() {
//            print_style = '<link id="print-certificate" media="print" href="'
//              + cakephp.webroot + 'css/print_certificate.css" type="text/css" rel="stylesheet" />';
//            parent.$('head').append(print_style);
            parent.window.print();
            //parent.$('#print-certificate').remove();
          },
          Close : function() {
            this_element = parent.$('#email-print');
            this_element.dialog("close");
            this_element.dialog("destroy");
            this_element.remove();
            //parent.$('#print-certificate').remove(); // I don't think this is called when the 'x' or Esc is used to close
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
//      parent.$('#email-print').closest('.ui-dialog').css('overflow', 'scroll');
//      parent.$('#email-print').height($('#email-print').closest('.ui-dialog').height() -
//        $('#email-print').siblings('.ui-dialog-titlebar').outerHeight() -
//        $('#email-print').siblings('.ui-dialog-buttonpane').outerHeight());
//      parent.$('#email-print-wrapper').height($('#email-print').height() - 40);
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

  generate_definition_boxes = function () {
    this_id = $(this).attr('id');
    uuid = this_id.replace('definition-link-', '');
//    $('#definition-body-' + uuid).toggle();
//    $('.scrollable:visible .items').height($(this).parents('.step:visible').height());
    body_div = "<div id='definition-body-" + uuid + "' class='definition-body' style='display: none;'>";
    definition_text = $(this).attr('href').substr(1);
    body_div += definition_text.QH_decodeURIComponent();
    body_div += "</div>";
    $(this).after($(body_div));
  }

  $('.definition-link').each(generate_definition_boxes);

  $('.definition-link').click(function() {
    this_id = $(this).attr('id');
    uuid = this_id.replace('definition-link-', '');
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
            this_element = parent.$('#feedback-frame');
            form = this_element.contents().find("#TutorialProvideFeedbackForm");
            postData = form.serialize();
            action = form.attr('action');
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

  response_dialog = "<div id='response-dialog'></div>";
  parent.$('body').append(response_dialog);
  parent.$('#response-dialog').dialog({
    autoOpen : false,
    modal : true,
    draggable : false
  });

  parent.$('#response-dialog').parents('.ui-widget').click(function () {
    parent.$('#response-dialog').dialog("close");
  });

  // Quiz questions don't have pop-ups. Is this being checked at the backend? That could be problematic if
  //   you copy and paste from a tutorial into a quiz.
  $('#scrollable :not(.no-feedback) > .answers > :radio').click(function() {
    getData = $(this).serialize();
    $.post(cakephp.webroot + 'questions/get_immediate_feedback/' + cakephp.tutorial_id, getData, function(data) {
      parent.$('#response-dialog').html(data.response);
      if (data.correct) {
        parent.$('#response-dialog').dialog({'dialogClass': 'correct', 'title': 'Correct'});
      } else {
        parent.$('#response-dialog').dialog({'dialogClass': 'incorrect', 'title': 'Incorrect'});
      }
      parent.$('#response-dialog').dialog("open");
    }, 'json');
  });

  $('a.prev').tooltip();

  $('a.next').tooltip();
  
  // Use jquery_ui buttons even when buttons aren't part of a dialog
  $( "input:submit" ).button();

});
