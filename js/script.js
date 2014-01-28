jQuery(document).ready(function ($) {
	$('.sib-toggle > a').click(function (e) {
		e.preventDefault();
		$('.sib-teaser').fadeToggle();
		$('.sib-hidden').slideToggle('normal', function () {
			// Animation complete.
		})
	})

});

