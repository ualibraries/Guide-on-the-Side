$(document).ready(function() {
    $('.definition-body').hide();

    generate_definition_boxes = function () {
        this_id = $(this).attr('id');
        uuid = this_id.replace('definition-link-', '');
        body_div = "<aside id='definition-body-" + uuid + "' class='definition-body'>";
        definition_text = $(this).attr('href').substr(1);
        body_div += definition_text.QH_decodeURIComponent();
        body_div += "</aside>";
        $(this).after($(body_div));
    }

    $('.definition-link').each(generate_definition_boxes);

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
    $('.items :not(.no-feedback) > .answers > :radio').click(function(e) {
        getData = $(this).serialize();
        $.post(cakephp.webroot + 'questions/get_immediate_feedback/' + cakephp.tutorial_id, getData, function(data) {
            $('#response-dialog').html(data.response);
            if (data.correct) {
                $('#response-dialog').dialog({'dialogClass': 'correct', 'title': data.response_heading});
            } else {
                $('#response-dialog').dialog({'dialogClass': 'incorrect', 'title': data.response_heading});
            }
            $('#response-dialog').dialog("open");
            $('#response-dialog').data('radio-return', $(e.target).attr('id').replace(/(\[|\])/g, '\\$1'));
        }, 'json');
    });

});