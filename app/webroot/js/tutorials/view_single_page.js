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
});