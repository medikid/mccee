jQuery(document).ready(function(){  
    /*
    jQuery('th').click( function(){
	table_header_clicked(this);
    });
    
    jQuery('input[value="Clear Bets"]').click(function(){
	clear_bets_form();
    });
    */
   jQuery('th').live("click", function(){table_header_clicked(this);} );
    jQuery('input[value="Clear Bets"]').live("click", function(){ clear_bets_form();} );
   /*
   jQuery('th').live("click", table_header_clicked(this));
   jQuery('input[value="Clear Bets"]').live("click", clear_bets_form());
   */
});

function table_header_clicked(element){    
    var clicked_element = element;
	    var num = jQuery(clicked_element).attr('id');
	    if (jQuery(clicked_element).hasClass('selected')){
		jQuery(clicked_element).removeClass('selected');
		if (num < 100){
		    var pt = jQuery('input[name="pattern_type"]:checked').val();
		    var str = jQuery('input[name="bets_' + pt + '"]').val();
		    var prev_values = str.split(' ');
		    var new_values = "";
		    for (a in prev_values){
			if ( parseInt(prev_values[a]) == num){
			} else {	
			    new_values += " " + prev_values[a];

			}
		    }
		    jQuery('input[name="bets_' + pt + '"]').val( new_values );
		} else {
		    jQuery('input[name="bets_for"]').val(num);
		}
		
	    } else {
		jQuery(clicked_element).addClass('selected');
	    
		if (num < 100){
		    pt = jQuery('input[name="pattern_type"]:checked').val();
		    var prev_bet = jQuery('input[name="bets_' + pt + '"]').val();
		    jQuery('input[name="bets_' + pt + '"]').val( prev_bet + " " + num );

		    } else {
			jQuery('input[name="bets_for"]').val(num);
		}
	    }	
}

function clear_bets_form(){    
    jQuery('input[name="bets_for"]').val("");
    jQuery('input[name="bets_1"]').val("");
    jQuery('input[name="bets_2"]').val("");
    jQuery('input[name="bets_3"]').val("");
    jQuery('input[name="bets_4"]').val("");
    jQuery('input[name="bets_5"]').val("");
    
    
}