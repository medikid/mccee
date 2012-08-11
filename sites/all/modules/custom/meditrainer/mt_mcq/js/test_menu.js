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
   var selectedTextStart = textarea_dummy_text.caret().start;
   var selectedTextEnd = textarea_dummy_text.caret().end;
    
    jQuery('div.dummy_mcq_json').get
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
	
	jQuery('div.custom_context_menu li').click(function(){
	    var clickedMenuId = jQuery(this).attr('id');
	    var clickedMenuClass = jQuery(this.parentNode).attr('class');
	    
	    if (clickedMenuClass == "submenu"){
	   	    if (textarea_dummy_json.html().length == 0){
			textarea_dummy_json.append(append_mcq_json_opener());
			
			if (clickedMenuId =="answer"){ selectedText = jQuery(this).html().toLowerCase(); }//override answer
			 
			 textarea_dummy_json.append(append_mcq_json(clickedMenuId,selectedText));	      
			} else textarea_dummy_json.append(append_mcq_json(clickedMenuId, selectedText));
		    
		    append_json_paste_trail(clickedMenuId);//update trail to track last pasted
		    jQuery(menuDivSelector).hide();
		    return false; //this would prevent the double clicked events from li
	    } else {
		if (textarea_dummy_json.html().length == 0){
			textarea_dummy_json.append(append_mcq_json_opener());
			 textarea_dummy_json.append(append_mcq_json(clickedMenuId,selectedText));	      
			} else textarea_dummy_json.append(append_mcq_json(clickedMenuId, selectedText));
		append_json_paste_trail(clickedMenuId);//update trail to track last pasted
		jQuery(menuDivSelector).hide();
	    }   
	   
	
	    
	    
	})  
    
})

function append_json_paste_trail(keyName){
    var divSelector = "div.json_paste_trail div#"+keyName;
    jQuery(divSelector).css('font-weight', 'bold');
}

function append_mcq_json_opener(){
    return json_mcq = "{ ";
}
function append_mcq_json(keyName, valueName){
    jsonText = " \" " + keyName + "\" : \"" + valueName +"\",";
    return jsonText;
}

function append_mcq_json_closer(){
    return json_mcq = " }";
}