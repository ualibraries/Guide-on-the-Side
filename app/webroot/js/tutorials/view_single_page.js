$(document).ready(function() {
    $('.definition-body').hide();

    var generate_definition_boxes = function () {
        var this_id = $(this).attr('id');
        var uuid = this_id.replace('definition-link-', '');
        var body_div = "<aside id='definition-body-" + uuid + "' class='definition-body'>";
        var definition_text = $(this).data('content');
        body_div += definition_text.QH_decodeURIComponent();
        body_div += "</aside>";
        $(this).after($(body_div));
    }

    $('.definition-link').each(generate_definition_boxes);

    $('#feedback-frame').dialog({
        autoOpen : false,
        modal : true,
        height : 450,
        title : 'Provide feedback',
        buttons : {
            'Send feedback' : function() {
                var this_element = $('#feedback-frame');
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
        $('#feedback-frame').dialog("open");
        $('#TutorialFromName', $('#feedback-frame').contents()).focus();
        return false;
    });

    $('#email_and_print').submit(function() {
        var postData = $(this).serialize();
        console.log(postData);
        $.post(cakephp.webroot + 'tutorials/view_certificate/', postData, function(returnData) {
            dialog = '<div id="email-print" style="display: none" title="Results">' + returnData + '</div>'
            $('body').append(dialog);
            $('#email-print').dialog({
                modal : true,
                autoOpen : false,
                draggable : false,
                buttons : {
                    Print : function() {
                        window.print();
                    },
                    Close : function() {
                        var this_element = $('#email-print');
                        this_element.dialog("close");
                        this_element.dialog("destroy");
                        this_element.remove();
                    }
                },
                width: 700,
                height : 'auto',
                beforeClose : function() {
                    $('email-print').text();
                }
            });
            $('#email-print').dialog('open');
            $('#email-print').closest('.ui-dialog').height('90%');
            $('#email-print-wrapper').height($('#email-print').closest('.ui-dialog').height() - 200);
            $('#email-print-wrapper').css('overflow-y', 'scroll');
        });

        return false;
    });

    // @todo Merge the response dialog stuff with view_tutorial_only.js sometime. They're slightly different.
    var response_dialog = "<div id='response-dialog'></div>";
    $('body').append(response_dialog);
    $('#response-dialog').dialog({
        autoOpen : false,
        modal : true,
        draggable : false,
        close: function (event, ui) {
            $('#' + $(this).data('radio-return')).focus();
        }
    });

    $('#response-dialog').parents('.ui-widget').click(function () {
        $('#response-dialog').dialog("close");
    });

    // Quiz questions don't have pop-ups. Is this being checked at the backend? That could be problematic if
    //   you copy and paste from a tutorial into a quiz.

    $('.items :not(.no-feedback) > .answers').append("<button type='button'>Check Answer</button>");

    $('.items :not(.no-feedback) > .answers > button').click(function(e) {
        var getData = $(this).parents('.answers').children('input').serialize();
        $.post(cakephp.webroot + 'questions/get_immediate_feedback/' + cakephp.tutorial_id, getData, function(data) {
            $('#response-dialog').html(data.response);
            if (data.correct) {
                $('#response-dialog').dialog({'dialogClass': 'correct', 'title': data.response_heading});
            } else {
                $('#response-dialog').dialog({'dialogClass': 'incorrect', 'title': data.response_heading});
            }
            $('#response-dialog').dialog("open");
//            $('#response-dialog').data('radio-return', $(e.target).attr('id').replace(/(\[|\])/g, '\\$1'));
        }, 'json');
    });

});