;(function () {

	'use strict';



	// iPad and iPod detection
	var isiPad = function(){
		return (navigator.platform.indexOf("iPad") != -1);
	};

	var isiPhone = function(){
	    return (
			(navigator.platform.indexOf("iPhone") != -1) ||
			(navigator.platform.indexOf("iPod") != -1)
	    );
	};

	var parallax = function() {
		$(window).stellar({
			horizontalScrolling: false,
			hideDistantElements: false,
			responsive: true
		});
	};
	var parallax_iPhone = function() {
		$(window).stellar({
			horizontalScrolling: false,
			hideDistantElements: false,
			responsive: true,
			scrollProperty: 'transform'
		});
	};

	// Document on load.
	$(function () {
	    var ua = navigator.userAgent;
	    if (ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
				parallax_iPhone();
	    } else {
				parallax();
	    }
	});

}());
