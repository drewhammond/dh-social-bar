jQuery(document).ready(function ($) {


	// Get viewport height to determine how tall the expanded box should be
	var windowHeight = $( window ).height();

	// Personal use for now; determine height of navbar. Subtract height of bar and padding of hidden element
	var navHeight = $('nav.navbar').height();
	var expandedHeight = (windowHeight - 50 - navHeight);
	var fixedNavOffset = windowHeight - navHeight;
	// Hack to track toggle status because I cant remember how to do it right with jQuery
	var sibIsOpen = false;

	// CSS classes for positioning the menu
	$('head').append('<style>.sibFixNav { top: ' + fixedNavOffset + 'px !important; }');

	console.log(windowHeight);

	$('.sib-toggle > a').click(function (e) {
		e.preventDefault();
		sibIsOpen.togg

		console.log(sibIsOpen);

		$('.sib-teaser').fadeToggle();
		$('nav.navbar').toggleClass('sib-fixed sibFixNav');

		// Fix navbar to bottom of screen
		//$('nav.navbar').css({ top: windowHeight - navHeight });

		// Expand the hidden div
		$('.sib-hidden').slideToggle('normal', function (e) {

			console.log($(this));
			// Change display;
			$('.sib-wrapper').toggleClass('sib-fixed');
			$('.sib-toggle > a').toggleClass('fa-angle-up').toggleClass('fa-angle-down');

			// Set height of expanded div based on calculations above
			$('.sib-hidden').css('height', expandedHeight);
		})
	});

});

