(function ($) {
	"use strict";
	
	var footer = {};
    edge.modules.footer = footer;
	
	footer.edgeOnWindowLoad = edgeOnWindowLoad;
	
	$(window).on('load', edgeOnWindowLoad);
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	 
	function edgeOnWindowLoad() {
		uncoveringFooter();
	}
	
	function uncoveringFooter() {
		var uncoverFooter = $('body:not(.error404) .edge-footer-uncover');

		if (uncoverFooter.length && !edge.htmlEl.hasClass('touch')) {

			var footer = $('footer'),
				footerHeight = footer.outerHeight(),
				content = $('.edge-content');
			
			var uncoveringCalcs = function () {
				content.css('margin-bottom', footerHeight);
				footer.css('height', footerHeight);
			};


			//set
			uncoveringCalcs();
			
			$(window).resize(function () {
				//recalc
				footerHeight = footer.find('.edge-footer-inner').outerHeight();
				uncoveringCalcs();
			});
		}
	}
	
})(jQuery);