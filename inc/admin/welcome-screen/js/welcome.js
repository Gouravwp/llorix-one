jQuery(document).ready(function() {
	
	/* If there are required actions, add an icon with the number of required actions in the About L One page -> Actions required tab */
    var llorix_one_nr_actions_required = llorixOneWelcomeScreenObject.nr_actions_required;

    if ( (typeof llorix_one_nr_actions_required !== 'undefined') && (llorix_one_nr_actions_required != '0') ) {
        jQuery('li.parallax-one-w-red-tab a').append('<span class="parallax-one-actions-count">' + llorix_one_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".parallax-one-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'llorix_one_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : llorixOneWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.parallax-one-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + llorixOneWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var llorix_one_actions_count = jQuery('.parallax-one-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof llorix_one_actions_count !== 'undefined' ) {
                    if( llorix_one_actions_count == '1' ) {
                        jQuery('.parallax-one-actions-count').remove();
                        jQuery('.parallax-one-tab-pane#actions_required').append('<p>' + llorixOneWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.parallax-one-actions-count').text(parseInt(llorix_one_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
	
	/* Tabs in welcome page */
	function llorix_one_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".parallax-one-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}
	
	var llorix_one_actions_anchor = location.hash;
	
	if( (typeof llorix_one_actions_anchor !== 'undefined') && (llorix_one_actions_anchor != '') ) {
		llorix_one_welcome_page_tabs('a[href="'+ llorix_one_actions_anchor +'"]');
	}
	
    jQuery(".parallax-one-nav-tabs a").click(function(event) {
        event.preventDefault();
		llorix_one_welcome_page_tabs(this);
    });
	
});