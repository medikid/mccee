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
  jQuery('label[for="edit-profq-test"]').width(max_width);
jQuery('#edit-profq-create-new').click(function(){
   
 //if profq_create_new is checked then set profq_name dropdown to 0 
  if (jQuery('input#edit-profq-create-new').is(':checked')){
      //alert("if checkbox checked, set dropdown = 0");
     
      jQuery('select#edit-profq-name').val('0');
      jQuery('input#edit-profq-new-profile-name').parent().show();
  }
})

jQuery('select#edit-profq-name').change(function(){
       //if profq_name != 0, then uncheck the profq_create-new checkbox
 if (jQuery('select#edit-profq-name :selected').val() != "0") {
    // alert("if dropdown is not 0, uncheck checkbox!");
     jQuery('input#edit-profq-create-new').removeAttr('checked'); 
     jQuery('input#edit-profq-new-profile-name').parent().hide();
 }
    
})

});
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