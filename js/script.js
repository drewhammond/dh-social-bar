jQuery(document).ready(function ($) {


	// Get viewport height to determine how tall the expanded box should be
	var windowHeight = $( window ).height();

	// Personal use for now; determine height of navbar. Subtract height of bar and padding of hidden element
	var navHeight = $('nav.navbar').height();
	var expandedHeight = (windowHeight - 50 - navHeight);
	var fixedNavOffset = windowHeight - navHeight;
	var sibIsOpen = false;

	$('.sib-toggle > a').click(function (e) {
		e.preventDefault();

		// Hack to track toggle status because I cant remember how to do it right with jQuery
		if (sibIsOpen) {
			$('nav.navbar').removeClass('sib-fixed');
			$('nav.navbar').animate({top: 0});
			sibIsOpen = false;
		} else {
			$('nav.navbar').addClass('sib-fixed');
			$('nav.navbar').animate({top: fixedNavOffset});
			sibIsOpen = true;
		}

		$('.sib-teaser').fadeToggle();
		//$('nav.navbar').toggleClass('sib-fixed sibFixNav');

		// Expand the hidden div
		$('.sib-hidden').slideToggle('normal', function (e) {
			// Change display;
			$('.sib-wrapper').toggleClass('sib-fixed');
			$('.sib-toggle > a').toggleClass('fa-angle-up').toggleClass('fa-angle-down');

			// Set height of expanded div based on calculations above
			$('.sib-hidden').css('height', expandedHeight);
		})
	});

});

