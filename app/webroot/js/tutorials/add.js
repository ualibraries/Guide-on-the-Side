$(document).ready(function() {

  max_chars = parseInt($('#after-title').text());

  in_index_original_value = $('#TutorialInIndex').is(':checked');

  $('#TutorialInIndex').click(function(){
    if (!$(this).is(':checked') && in_index_original_value) {
      alert('Warning! Users will no longer be able to find this tutorial through the public interface.')
    }
  });

  display_remaining = function(textbox) {
    $('#after-title').text(max_chars - parseInt(textbox.val().length));
  };

  $('#TutorialTitle').keyup(function() {
    display_remaining($(this));

    // be nice to the user -- make a slug for them, unless one exists already.
    if (cakephp.generate_slug) {
      $('#TutorialUserUrl').val(function() {
        return $('#TutorialTitle').val()
          .toLowerCase()
          .replace(/\s+/g, '-')
          .replace(/[^a-z0-9\-]+/g, '');
      });
    }

  });

  $('#TutorialUserUrl').keyup(function() {
    // if the user modifies the slug, break the title-slug link. Don't be evil.
    cakephp.generate_slug = false;
  });

  $('#TutorialTitle').blur(function() {
    display_remaining($(this));
  });

  display_remaining($('#TutorialTitle'));

//  show_email_fields = function(checkbox) {
//    if(checkbox.is(':checked')) {
//      checkbox.parent().parent().children(':gt(1)').show();
//    } else {
//      checkbox.parent().parent().children(':gt(1)').hide();
//    }
//  };
//
//  show_email_fields($('#FinalQuizCertificate'));
//
//  $('#FinalQuizCertificate').click(function() {
//    show_email_fields($(this));
//  });
//
//  show_email_fields($('#TutorialCertificate'));
//
//  $('#TutorialCertificate').click(function() {
//    show_email_fields($(this));
//  });

  // from http://jqueryui.com/demos/autocomplete/#multiple-remote
  function split( val ) {
	  return val.split( /,\s*/ );
  }
 	function extractLast( term ) {
	  return split( term ).pop();
  }
  $('#TutorialTags')
    // don't navigate away from the field on tab when selecting an item
		.bind( "keydown", function( event ) {
			if ( event.keyCode === $.ui.keyCode.TAB &&
				$( this ).data( "autocomplete" ).menu.active ) {
		    	event.preventDefault();
				}
		})
    .autocomplete({
    source: function( request, response ) {
		  $.getJSON(cakephp.webroot + 'tags/search', {
			  term: extractLast( request.term )
		  }, response)
    },
    select: function( event, ui ) {
			var terms = split( this.value );
			// remove the current input
			terms.pop();
			// add the selected item
			terms.push( ui.item.value );
			// add placeholder to get the comma-and-space at the end
			terms.push( "" );
			this.value = terms.join( ", " );
			return false;
	  },
    search: function() {
			// custom minLength
			var term = extractLast( this.value );
			if ( term.length < 2 ) {
				return false;
			}
		},
    focus: function() {
			// prevent value inserted on focus
			return false;
		}
	});

//  check_url = function(url) {
//    $.ajax({
//        type: 'GET',
//        url: url,
//        dataType: 'jsonp',
//        success: function(data, status, xhr) {
//          console.debug(xhr);
//        },
//        error: function(xhr) {
//          console.debug(xhr.status);
//        }
//    });
//  }
//
//  $('#TutorialUrl').blur(function() {
//    check_url($(this).val());
//  });
//
//  $('#TutorialAddForm').submit(function() {
//
//  });
});