var APP = (function () {
	var me = {},
		browser = {};

	/////////////////////////////////////////////////////////////////
	////////////////////// PRIVATE FUNCTIONS ////////////////////////
	/////////////////////////////////////////////////////////////////
	function getViewportSize() {
		browser.viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
		browser.viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
	}

	function debounce(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			clearTimeout(timeout);
			timeout = setTimeout(function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			}, wait);
			if (immediate && !timeout) func.apply(context, args);
		};
	}

	// check which transitionEnd to use and return it
	// returns null if no transitionEnd is supported
	// function whichTransitionEvent() {
	// 	var el = document.createElement('fakeelement'),
	// 		transitions = {
	// 			'transition':'transitionend',
	// 			'OTransition':'oTransitionEnd',
	// 			'MozTransition':'transitionend',
	// 			'WebkitTransition':'webkitTransitionEnd'
	// 		};
	//
	// 	for(var t in transitions) {
	// 		if( el.style[t] !== undefined ){
	// 			return transitions[t];
	// 		}
	// 	}
	// }

	/////////////////////////////////////////////////////////////////
	////////////////////// PUBLIC FUNCTIONS /////////////////////////
	/////////////////////////////////////////////////////////////////

	me.onResize = function(callback) {
		callback();

		$(window).on('resize', debounce(function() {
			callback();
		}, 200));
	};

	// check which transitionEnd to use and return it
	// returns null if no transitionEnd is supported
	// me.transitionEndEvent = whichTransitionEvent();

	browser.supportsAnimation = getAnimationSupport();
	browser.viewportSize = getViewportSize();
	browser.isTouch = isTouch();
	browser.viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	browser.viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

	me.onResize(getViewportSize);

	me.browser = browser;

	return me;
})();

(function(){
	$('html').removeClass('no-js');

	//CAST YOUR MAGIC HERE!

}());
