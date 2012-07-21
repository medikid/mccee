/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() { 
  
jQuery('input[type="checkbox"]').click(function(){
    //create an array of answer checkboxes
    var answer_boxes = ['answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e']
    
    //get checkbox name that raised event click 
    var clicked_box = jQuery(this).attr('name');
    
    //get array of checked boxes
     var  checked_boxes = jQuery('input[type="checkbox"]:checked');
     
     //iterate through checked boxes and uncheck all the answer boxes except the button that raised event
     jQuery.each(checked_boxes, function(key, value){
         var checked_box = jQuery(value).attr('name');
       
       //iterate through checked boxes vs answer_boxes and uncheck all the boxes except the box that was clicke
       if ((jQuery.inArray(checked_box, answer_boxes) > -1) && checked_box != clicked_box){
       jQuery(value).removeAttr('checked')
      }
        
     })
     
})
     
    //get name of the clicked box
    //jQuery(this).attr('name')
    
    //get if the clicked checkbox is checked or not
    //jQuery(this).attr('checked')
    
    //get all checked input checkboxes
    //jQuery('div.form-item input[type="checkbox"]:checked')
    
    //get all checked checkboxes, returns
    //jQuery('input:checked')
    
    
    //get name of the checkbox, reutrns answer_a
    //jQuery('input#edit-answer-a').attr('name')
    
    
})