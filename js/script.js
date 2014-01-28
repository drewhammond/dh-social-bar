jQuery(document).ready(function ($) {


	// Get viewport height to determine how tall the expanded box should be
	var windowHeight = $( window ).height();

	// Personal use for now; determine height of navbar. Subtract height of bar and padding of hidden element
	var navHeight = $('nav.navbar').height();
	var expandedHeight = (windowHeight - 50 - 32 - navHeight);

	console.log(windowHeight);

	$('.sib-toggle > a').click(function (e) {
		e.preventDefault();
		$('.sib-teaser').fadeToggle();
		$('.sib-hidden').slideToggle('normal', function () {

			// Change display;
			$('.sib-wrapper').toggleClass('sib-fixed');
			$('.sib-toggle > a').toggleClass('fa-angle-up').toggleClass('fa-angle-down');

			// Set height of expanded div based on calculations above
			$('.sib-hidden').css('height', expandedHeight);
		})
	})

});

