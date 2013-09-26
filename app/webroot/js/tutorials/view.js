$(document).ready(function() {

  var revision_info_height = $('#revision-info').outerHeight();

  $('#site-frame').css('top', revision_info_height);
  $('#draggable').css('top', revision_info_height);

  $('#close_revision_info').click(function() {
    $('#revision-info').remove();
    $('#site-frame').css('top', 0);
    $('#draggable').css('top', 0);
  });

  var tutorial_width = parseInt($('#draggable').outerWidth(true));

  // IE needs the following
  $('#tutorial-frame').attr('allowTransparency', 'true');
  // End IE silliness

  $('#site-frame').width($(window).width() - tutorial_width);
  $('#site-frame').css('margin-left', tutorial_width);

  var size_tutorial_frame = function() {
    $('#tutorial-frame').height($('#draggable').height() - $('#tutorial-frame').position().top);
  };

  size_tutorial_frame();

  $('#draggable').resize(size_tutorial_frame);

  $(window).resize(function (event) {
    if (parseInt($('#site-frame').css('margin-left')) == parseInt(tutorial_width)) {
      $('#site-frame').width(parseInt($(window).width()) - tutorial_width);
      $('#site-frame').css('margin-left', tutorial_width);
    } else {
      $('#site-frame').width('100%');
    }
  });

  var draggable_dock_last_x = 30;
  var draggable_dock_last_y = 30;

  var draggable_close_last_x = 30;
  var draggable_close_last_y = 30;

  $('#draggable').draggable({
    iframeFix : true,
    cursor : 'crosshair',
    containment : 'window',
    disabled : true,
    cancel : '#dock-link, #close-link, .mode-switch a, #table-of-contents h2, #table-of-contents ul, #title a'
  });

  var expand_site_frame = function() {
    $('#site-frame').animate({
      width : '100%',
      'margin-left' : 0
    });
  };

  var shrink_site_frame = function() {
    $('#site-frame').animate({
      width : $(window).width() - tutorial_width,
      'margin-left' : tutorial_width
    });
  };

  $('#dock-link').toggle(
    function() { // undock
      $('#draggable').draggable('enable');
      $('#draggable').animate({
        top : draggable_dock_last_y,
        left : draggable_dock_last_x,
        height : '80%'
      }, null, null, function() {
        $('#draggable').removeClass('docked').addClass('undocked');
      });
      $('#dock-image').show();
      $('#undock-image').hide();
      expand_site_frame();
    },
    function() { // dock
      $('#draggable').draggable('disable');
      $('#draggable').css('opacity', 1); // for everyone's favorItE browser
      $('#undock-image').show();
      $('#dock-image').hide();
      $('#draggable').removeClass('undocked').addClass('docked');
      draggable_dock_last_x = $('#draggable').css('left');
      draggable_dock_last_y = $('#draggable').css('top');
      $('#draggable').animate({
        border: '0',
        top : $('#revision-info').outerHeight() || 0,
        left : '0',
        height : '100%'
      });
      shrink_site_frame();
    }
  );

  $('#close-link').click(function() {
    draggable_close_last_x = ($('#draggable').css('left') == 'auto' ? 0 : $('#draggable').css('left'));
    draggable_close_last_y = $('#draggable').css('top');
    $('#draggable').animate({
      left: tutorial_width * -1 - 20 // get it off the screen
    });
    $('#closed').show('slide', 1000);
    expand_site_frame();
    return false;
  });

  $('#closed').click(function() {
    $(this).hide('slide', 1000);
    $('#draggable').animate({
      left: draggable_close_last_x
    });
    var docked = ($('#dock-image:visible').length == 1) ? false : true;
    if (docked) {
      shrink_site_frame();
    }
  });

  $('#start-link').click(function() {
    frames['tutorial-frame'].api.seekTo(0);
    return false;
  });
  
  $('#start-link').tooltip({ position: { my: 'left', at: 'right+8' } });
  
  $('.toc-entry').click(function() {
    var id_parts = $(this).attr('id').split('-');
    $('#tutorial-frame')[0].contentWindow.api.seekTo(parseInt(id_parts[2]));
  });

  $('#table-of-contents > ul').hide();
  
  $('#table-of-contents').hover(function() {
    $('#table-of-contents > ul').toggle();
  });

  var current_chapter = 0;
  
  $('#table-of-contents ul li:eq(' + current_chapter + ')').addClass('current-chapter');
  
});
