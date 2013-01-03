jQuery(document).ready(function () { 
    //var data = { active : 0, mail_format : 't' };    
    //post_ajx_reload_radios(data);
    
    //alert("Added and executed");
    //jQuery('input[name="mail_format"]').reload_radios('h');
        
});

function post_ajx_reload_radios(radio_data){
    var data = radio_data;
    jQuery('input[name="active"]').each(function(){
	if (jQuery(this).val() == data.active ){
	jQuery(this).attr('checked', true);
	}    
    })
    
    jQuery('input[name="mail_format"]').each(function(){
	if (jQuery(this).val() == data.mail_format ){
	jQuery(this).attr('checked', true);
	}    
    })
    
}

jQuery.fn.reload_radios = function(radio_data){
    alert("Jquery reload radios executed");
    jQuery(this).each(function(){
	if (jQuery(this).val() == radio_data ){
	jQuery(this).attr('checked', true);
	}    
    })
}

