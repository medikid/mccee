<?php $IEM = $tpl->Get('IEM'); ?><script>
var subscribers = new Array();
$(function() {
	Application.Ui.CheckboxSelection(	'table#subscriberEvents',
										'input.ToggleSelector',
										'input.event_checkbox');
});
</script>
<table class="Text" id="subscriberEvents" cellspacing="0" cellpadding="2" style="width: 100%;">
	<tr>
		<td width="100%" colspan="7">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="buttons" valign="bottom">
					<?php if(isset($GLOBALS['Event_AddButton'])) print $GLOBALS['Event_AddButton']; ?>
					<?php if(isset($GLOBALS['Event_DeleteButton'])) print $GLOBALS['Event_DeleteButton']; ?>
					</td>
					<td class="pagination" valign="bottom" align="right" nowrap="nowrap">
						<?php if(isset($GLOBALS['Paging'])) print $GLOBALS['Paging']; ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr class="Heading3" >
		<td width="5"><input type="checkbox" class="ToggleSelector"></td>
		<td width="5">&nbsp;</td>
		<td nowrap>
			<?php print GetLang('Subject'); ?>
			<a href="#" onclick="eventsTable('eventsubject','asc');return false;"><img src="images/sortup.gif" width="8" height="10" style="border: 0px;"></a>
			<a href="#" onclick="eventsTable('eventsubject','desc');return false;"><img src="images/sortdown.gif" width="8" height="10" style="border: 0px;"></a>
		</td>
		<td nowrap>
			<?php print GetLang('EventType'); ?>
			<a href="#" onclick="eventsTable('eventtype','asc');return false;"><img src="images/sortup.gif" width="8" height="10" style="border: 0px;"></a>
			<a href="#" onclick="eventsTable('eventtype','desc');return false;"><img src="images/sortdown.gif" width="8" height="10" style="border: 0px;"></a>
		</td>
		<td nowrap>
			<?php print GetLang('LastUpdated'); ?>
			<a href="#" onclick="eventsTable('lastupdate','asc');return false;"><img src="images/sortup.gif" width="8" height="10" style="border: 0px;"></a>
			<a href="#" onclick="eventsTable('lastupdate','desc');return false;"><img src="images/sortdown.gif" width="8" height="10" style="border: 0px;"></a>
		</td>
		<td nowrap>
			<?php print GetLang('CreatedBy'); ?>
			<a href="#" onclick="eventsTable('username','asc');return false;"><img src="images/sortup.gif" width="8" height="10" style="border: 0px;"></a>
			<a href="#" onclick="eventsTable('username','desc');return false;"><img src="images/sortdown.gif" width="8" height="10" style="border: 0px;"></a>
		</td>
		<td nowrap>
			<?php print GetLang('Action'); ?>
		</td>
	</tr>
	<?php if(isset($GLOBALS['Events'])) print $GLOBALS['Events']; ?>
</table>