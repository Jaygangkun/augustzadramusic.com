(function($) {
    'use strict';

    var like = {};
    
    like.edgeOnDocumentReady = edgeOnDocumentReady;

    $(document).ready(edgeOnDocumentReady);
    
    /**
    *  All functions to be called on $(document).ready() should be in this function
    **/
    function edgeOnDocumentReady() {
        edgeLikes();
    }

    function edgeLikes() {
        $(document).on('click','.edge-like', function() {
            var likeLink = $(this),
                id = likeLink.attr('id'),
				postID = likeLink.data('post-id'),
				type = '';

            if ( likeLink.hasClass('liked') ) {
                return false;
            }

            if (typeof likeLink.data('type') !== 'undefined') {
                type = likeLink.data('type');
            }

            var dataToPass = {
                action: 'noizzy_edge_like',
                likes_id: id,
                type: type,
				like_nonce: $('#qodef_like_nonce_'+postID).val()
            };

            var like = $.post(edgeGlobalVars.vars.edgeAjaxUrl, dataToPass, function( data ) {
                likeLink.html(data).addClass('liked').attr('title', 'You already like this!');
            });

            return false;
        });
    }
    
})(jQuery);