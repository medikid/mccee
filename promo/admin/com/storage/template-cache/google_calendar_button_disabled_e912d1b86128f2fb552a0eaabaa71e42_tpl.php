<?php $IEM = $tpl->Get('IEM'); ?><a href="#" title="<?php print GetLang('GoogleCalendarCaption'); ?>" onclick="alert('<?php print GetLang('GoogleCalendarNotEnabled'); ?>');return false;" style="position:relative;top:4px;"><img src="images/gcal_add.gif" title="<?php print GetLang('AddtoGoogleCalendar'); ?>" style="border: 0px;"></a>
<script>
if (date_field_dates == null) {
	var date_field_dates = new Array();
}

date_field_dates[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>] = <?php if(isset($GLOBALS['DateJSON'])) print $GLOBALS['DateJSON']; ?>;
</script>
