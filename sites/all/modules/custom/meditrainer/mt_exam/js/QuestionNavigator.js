jQuery(document).ready(function () { 
   choices_onClick();
})

function choices_onClick(){
  jQuery('input[type="radio"]').click(function(){
    //create an array of answer checkboxes
    var choices_radios = ['choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e']
    
    //get checkbox name that raised event click 
    var clicked_radio = jQuery(this).attr('name');
    
    //get array of checked boxes
     var  checked_radios = jQuery('input[type="radio"]:checked');
     
     //iterate through checked boxes and uncheck all the answer boxes except the button that raised event
     jQuery.each(checked_radios, function(key, value){
         var checked_radio = jQuery(value).attr('name');
       
       //iterate through checked boxes vs answer_boxes and uncheck all the boxes except the box that was clicke
       if ((jQuery.inArray(checked_radio, choices_radios) > -1) && checked_radio != clicked_radio){
       jQuery(value).removeAttr('checked')
      }
        
	})
    })
}

function hide_notes_viewer(){
 jQuery('fieldset#edit-notes-viewer').hide();
}

function show_notes_viewer(){
 jQuery('fieldset#edit-notes-viewer').show();
}