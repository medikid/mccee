/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * .class
 * #id
 * #id :selected where : is the psuedoclass selected checked are few examples
 * text() val() get value and text 
 */

jQuery(document).ready(function () { 
  var max_width = 189;
  jQuery('label[for="edit-tp-exam"]').width(max_width);
jQuery('#edit-tp-create-new').click(function(){
   
 //if tp_create_new is checked then set tp_name dropdown to 0 
  if (jQuery('input#edit-tp-create-new').is(':checked')){
      //alert("if checkbox checked, set dropdown = 0");
     
      jQuery('select#edit-tp-name').val('0');
      jQuery('input#edit-tp-new-profile-name').parent().show();
  }
})

jQuery('select#edit-tp-name').change(function(){
       //if tp_name != 0, then uncheck the tp_create-new checkbox
 if (jQuery('select#edit-tp-name :selected').val() != "0") {
     
     //alert("if dropdown is not 0, uncheck checkbox!" + tp_data_json);
     jQuery('input#edit-tp-create-new').removeAttr('checked'); 
     jQuery('input#edit-tp-new-profile-name').parent().hide();
 }
    
})

//raise event when hidden tp_data_json changed
jQuery('div#test_profile_data_wrapper input').change(function(){
    var tp_data_json = jQuery(this).val();
    set_tp_data(tp_data_json);
    alert("hidden box tp data changed " + tp_data_json);
})

});

function set_tp_data(tp_data_json){
var data = tp_data_json;

set_tp_exam(data);
set_tp_total(data);
set_tp_duration(data);

set_tp_test_mode(data);

set_tp_is_customized(data); //this will also set compositino if _is_customized=yes

}

function set_tp_exam(data){
    jQuery('Select[name="tp_exam"]').val(data.tp_exam);
}

function set_tp_total(data){
    jQuery('Select[name="tp_total"]').val(data.tp_total);
}

function set_tp_duration(data){
    jQuery('Select[name="tp_duration"]').val(data.tp_duration);
}

function set_tp_test_mode(data){
    switch(data.tp_test_mode){
	case 1:
	    jQuery('input[name="tp_test_mode"]')[0].checked = true
	    break;
	 case 2:
	    jQuery('input[name="tp_test_mode"]')[1].checked = true
	    break;
    }
}

function set_tp_is_customized(data){
    switch(data.tp_is_customized){
	case 0:
	  jQuery('input[name="tp_is_customized"]')[0].checked = true;
	  jQuery('div.form-item-tp-composition').show();
	  reset_tp_composition();
	  jQuery('div.form-item-tp-composition').hide();
	    break;
	case 1:
	    jQuery('input[name="tp_is_customized"]')[1].checked = true;
	    jQuery('div.form-item-tp-composition').show();
	    set_tp_composition(data);
	    break;
    }
}

function set_tp_composition(data){
    jQuery('div#edit-tp-composition input').each(function(){
	var i = jQuery(this).val();
	
	if ( data.tp_composition[i] == i ){
	    jQuery('input[name="tp_composition['+ i +']"]').attr('checked',true);
	    } else jQuery('input[name="tp_composition['+ i +']"]').attr('checked',false);
	    })
}

function reset_tp_composition(){
    jQuery('div#edit-tp-composition input').each(function(){
	var i = jQuery(this).val();
	 jQuery('input[name="tp_composition['+ i +']"]').attr('checked',false);
    })
}
//check max width and set labl width to max width
/*
$('label').autoWidth();

To make the labels flexible, but not to go beyond a fixed width (so to not break a layout), just pass a max/limiting width you don't want them to go beyond:

$('label').autoWidth({limitWidth: 350});

jQuery.fn.autoWidth = function(options)
{
  var settings = {
        limitWidth   : false
  }
  
  if(options) {
        jQuery.extend(settings, options);
    };
    
    var maxWidth = 0;
  
  this.each(function(){
        if ($(this).width() > maxWidth){
          if(settings.limitWidth && maxWidth >= settings.limitWidth) {
            maxWidth = settings.limitWidth;
          } else {
            maxWidth = $(this).width();
          }
        }
  });  
  
  this.width(maxWidth);
} 
* */