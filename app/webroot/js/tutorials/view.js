$(document).ready(function() {
  var popup_width = 384;
  var window_max_width = window.screen.availWidth -  popup_width;
  var resize_percentage = (window_max_width / window.screen.availWidth)*100;
  resize_percentage = Math.round(resize_percentage / 10) * 10;
  var window_small_enough = $(window).width() <= window_max_width;
  var window_left_enough = window.screenX >= popup_width;
  var ready_to_go = true;
  var got_it = false;

  $('.resize_arrow').css('right', 'auto');
  $('.resize_arrow').css('left', 0);

  function init_resize_elements() {
    if(!window_small_enough || !window_left_enough) {
      $('#resize_percentage').text(resize_percentage);
      $('.resize_elements').show();
      $('.overlay').slideDown(function(){
        $('.resize_video').fadeIn(function(){
          setTimeout(function () {
            $('.modal-gif').animate({'opacity': 0.6}, 500, function(){
              $('.gif-overlay').slideDown(function(){
                setTimeout(function () {
                  $('.got-it-link-wrapper').fadeIn(function(){
                    $('.got-it-link-wrapper').css('display', 'block');
                  });
                }, 500);
              });
            });
          },2500);
        });
      });
    } else {
      got_it = true;
    }
  }

  function update_resize_elements() {
    if(!got_it) {
      return;
    }

    window_small_enough = $(window).width() <= window_max_width;
    window_left_enough = window.screenX >= popup_width;
    ready_to_go = window_small_enough && window_left_enough;

    if(ready_to_go && $('.overlay').is(":visible")) {
      $('.resize_arrow').slideUp();
      $('.move_arrow').hide("slide", {direction: "right"});
      $('.done_prompt').slideDown();
    }else if (window_small_enough &&  $('.resize_arrow').is(':visible')) {
      $('.resize_arrow').slideUp();
    }else if (window_left_enough && $('.move_arrow').is(':visible')) {
      $('.move_arrow').hide("slide", {direction: "right"});
    }

    if(!$('.resize_arrow').is(':visible')){
      if(!window_small_enough) {
        $('.resize_elements').show();
        $('.move_arrow').hide("slide", {direction: "right"});
        $('.overlay').slideDown();
        $('.resize_arrow').slideDown();
      } else if (!window_left_enough && !$('.move_arrow').is(':visible')) {
        $('.overlay').slideDown();
        $('.resize_elements').show();
        $('.move_arrow').show("slide", {direction: "right"});
      }
    }

    if(!ready_to_go) {
      $('.done_prompt').slideUp();
    }
  }

  init_resize_elements();
  var resize_interval = setInterval(function(){ update_resize_elements(); }, 50);

  $('.got-it-link').click(function(e) {
    e.preventDefault();
    $('.resize_video').fadeOut();
    got_it = true;
    return false;
  });

  $('.popup-link').click(function(e) {
      e.preventDefault();

      var tutorial_window = window.open(cakephp.tutorial_url, "tutorial_window", "width=" + popup_width + ",height=636,left=0,top=0");
      if (tutorial_window) {
          window.location = cakephp.site_url;
      }
  });

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
    if($('#tutorial-frame').length > 0) {
      $('#tutorial-frame').height($('#draggable').height() - $('#tutorial-frame').position().top);
    }
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

