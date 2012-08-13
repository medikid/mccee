jQuery(document).ready(function(){ 
    jQuery(menuDivSelector).hide(); //hide the menu when the page loads

    var textarea_dummy_text = jQuery('textarea[name="dummy_mcq_text"]'); //var for dummy text area
    var textarea_dummy_json = jQuery('div.dummy_mcq_json'); // var for dummy json view
    var json_paste_trail = jQuery('div.json_paste_trail'); //track json paste trail
    var menuDivSelector = "div.custom_context_menu"; //var for div selector for menu
    var selectedText;
    //now bind the mouseup event, when the mouse is up do this
    textarea_dummy_text.bind("mouseup", function(e){
       selectedText = textarea_dummy_text.caret().text; //now we got the mouse selected text
       //var selectedTextStart = textarea_dummy_text.caret().start; //gets start caret position
       //var selectedTextEnd = textarea_dummy_text.caret().end; //gets end caret  position
       
	if (selectedText.length > 0){
		jQuery(menuDivSelector)
		    .appendTo('body')
		    .css({ 
			top: e.pageY + "px",
			left: e.pageX + "px"
		    })
		    .show('fast'); //this is main function to show menu, place menu at the mouse position

	} else jQuery(menuDivSelector).hide();

	}) //end of mouseup binder

	    //raise click event listener on the li list items
	    jQuery('div.custom_context_menu li').click(function(){
		var clickedMenuId = jQuery(this).attr('id');
		var clickedMenuClass = jQuery(this.parentNode).attr('class');

		if (clickedMenuClass == "submenu"){
		    if (clickedMenuId =="answer"){ selectedText = jQuery(this).html().replace(/<\/?[^>]+>/gi, '').toLowerCase(); }//override answer, remove html tags
			var updated_json_string = append_mcq_json(textarea_dummy_json.html(), clickedMenuId, selectedText );
			textarea_dummy_json.html(updated_json_string);//updated hidden field
			jQuery('input[name="dummy_mcq_json_object"]').val(updated_json_string);
			append_json_paste_trail(clickedMenuId);//update trail to track last pasted
			jQuery(menuDivSelector).hide();
			return false; //this would prevent the double clicked events from li
		} else {
			   var updated_json_string = append_mcq_json(textarea_dummy_json.html(), clickedMenuId, selectedText );
			textarea_dummy_json.html(updated_json_string);
			jQuery('input[name="dummy_mcq_json_object"]').val(updated_json_string);//updated hidden field
		    append_json_paste_trail(clickedMenuId);//update trail to track last pasted
		    jQuery(menuDivSelector).hide();
		}
	    })  
    })

function append_json_paste_trail(keyName){
    var divSelector = "div.json_paste_trail div#"+keyName;
    jQuery(divSelector).css('font-weight', 'bold');
}


function append_mcq_json(jsonString, keyName, valueName){
    var jsonObj;
    if (jsonString == "" || jsonString == null ){
	jsonObj = new Object();
    } else jsonObj = jQuery.parseJSON(jsonString);
	
	jsonObj[keyName] = valueName;
      var updatedJsonString = JSON.stringify(jsonObj);   
	return updatedJsonString;
}
