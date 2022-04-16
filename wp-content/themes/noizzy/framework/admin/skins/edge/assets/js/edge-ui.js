(function($){
	window.edgeAdmin = {};
	edgeAdmin.framework = {};
	
	$(document).ready(function() {
		//plugins init goes here


		if ($('.edge-page-form').length > 0) {
            edgeFixHeaderAndTitle();
            initTopAnchorHolderSize();
            edgeScrollToAnchorSelect();
            edgeChangedInput();
		}
    });

	function edgeFixHeaderAndTitle () {
		var pageHeader 				= $('.edge-page-header');
		var pageHeaderHeight		= pageHeader.height();
		var adminBarHeight			= $('#wpadminbar').height();
		var pageHeaderTopPosition 	= pageHeader.offset().top - parseInt(adminBarHeight);
		var pageTitle				= $('.edge-page-title');
		var pageTitleTopPosition	= pageHeaderHeight + adminBarHeight - parseInt(pageTitle.css('marginTop'));
		var tabsNavWrapper			= $('.edge-tabs-navigation-wrapper');
		var tabsNavWrapperTop		= pageHeaderHeight;
		var tabsContentWrapper	    = $('.edge-tab-content');
		var tabsContentWrapperTop	= pageHeaderHeight + pageTitle.outerHeight();

		$(window).on('scroll load', function() {
			if($(window).scrollTop() >= pageHeaderTopPosition) {
				pageHeader.addClass('edge-header-fixed').css('top', parseInt(adminBarHeight));
				pageTitle.addClass('edge-page-title-fixed').css('top', pageTitleTopPosition);
				tabsNavWrapper.css('marginTop', tabsNavWrapperTop);
				tabsContentWrapper.css('marginTop', tabsContentWrapperTop);
			} else {
				pageHeader.removeClass('edge-header-fixed').css('top', 0);
				pageTitle.removeClass('edge-page-title-fixed').css('top', 0);
				tabsNavWrapper.css('marginTop', 0);
				tabsContentWrapper.css('marginTop', 0);
			}
		});
	}
	
	function initTopAnchorHolderSize() {
		function initTopSize() {
			var optionsPageHolder = $('.edge-options-page'),
				anchorAndSaveHolder = $('.edge-top-section-holder'),
				pageTitle = $('.edge-page-title'),
				tabsContentWrapper = $('.edge-tabs-content');
			
			anchorAndSaveHolder.css('width', optionsPageHolder.width() - parseInt(anchorAndSaveHolder.css('margin-left')));
			pageTitle.css('width', tabsContentWrapper.outerWidth());
		}
		
		initTopSize();
		
		$(window).on('resize', function () {
			initTopSize();
		});
	}
	
	function edgeScrollToAnchorSelect() {
		var selectAnchor = $('#edge-select-anchor');
		
		selectAnchor.on('change', function () {
			var selectAnchor = $('option:selected', selectAnchor);
			
			if (typeof selectAnchor.data('anchor') !== 'undefined') {
				edgeScrollToPanel(selectAnchor.data('anchor'));
			}
		});
	}

    function edgeScrollToPanel(panel) {
        var pageHeader = $('.edge-page-header'),
            pageHeaderHeight = pageHeader.height(),
            adminBarHeight = $('#wpadminbar').height(),
            pageTitle = $('.edge-page-title'),
            pageTitleHeight = pageTitle.outerHeight();

        var panelTopPosition = $(panel).offset().top - adminBarHeight - pageHeaderHeight - pageTitleHeight;

        $('html, body').animate({
            scrollTop: panelTopPosition
        }, 1000);

        return false;
    }
	
	function edgeChangedInput() {
		$('.edge-tabs-content form.edge_ajax_form:not(.edge-import-page-holder):not(.edge-backup-options-page-holder)').on('change keyup keydown', 'input:not([type="submit"]), textarea, select', function (e) {
			$('.edge-input-change').addClass('yes');
		});
		
		$('.edge-tabs-content form.edge_ajax_form:not(.edge-import-page-holder):not(.edge-backup-options-page-holder) .field.switch label:not(.selected)').on('click',function () {
			$('.edge-input-change').addClass('yes');
		});
		
		$('.edge-tabs-content form.edge_ajax_form:not(.edge-import-page-holder):not(.edge-backup-options-page-holder) #anchornav input').on('click',function () {
			var inputChange = $('.edge-input-change.yes'),
				changesSave = $('.edge-changes-saved');
			
			if (inputChange.length) {
				inputChange.removeClass('yes');
			}
			
			changesSave.addClass('yes');
			setTimeout(function () {
				changesSave.removeClass('yes');
			}, 3000);
		});
		
		$(window).on('beforeunload', function () {
			if ($('.edge-input-change.yes').length) {
				return 'You haven\'t saved your changes.';
			}
		});
	}

})(jQuery);