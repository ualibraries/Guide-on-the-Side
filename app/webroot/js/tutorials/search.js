$(document).ready(function() {
  $('#TutorialSearchForm fieldset .input').children().hide();

  $('#TutorialSearchForm fieldset legend').click(function() {
    $('#TutorialSearchForm fieldset .input').children().toggle();
  });

  $('.more-info-link').text('i');

  $('.more-info-link').addClass('gray-circle');
});