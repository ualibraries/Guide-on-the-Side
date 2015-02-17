$(document).ready(function() {
	toggleFeedbackLinkTextDisabledProperty();
	$('#TutorialShowFeedbackLink').click(function(){
		toggleFeedbackLinkTextDisabledProperty();
	});

	function toggleFeedbackLinkTextDisabledProperty(){
		if ($("#TutorialShowFeedbackLink").attr('checked')) {
			$('#TutorialCustomFeedbackLinkText').prop('disabled', false);
		} else {
			$('#TutorialCustomFeedbackLinkText').prop('disabled', true);
		}
	}
});
