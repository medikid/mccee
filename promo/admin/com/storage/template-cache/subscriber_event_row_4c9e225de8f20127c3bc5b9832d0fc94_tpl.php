<?php $IEM = $tpl->Get('IEM'); ?>	<tr class="GridRow" id="event_<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>_<?php if(isset($GLOBALS['eventid'])) print $GLOBALS['eventid']; ?>">
		<td width="5"><input type="checkbox" value="<?php if(isset($GLOBALS['eventid'])) print $GLOBALS['eventid']; ?>" class="event_checkbox"></td>
		<td width="5"><img src="images/<?php if(isset($GLOBALS['Icon'])) print $GLOBALS['Icon']; ?>"></td>
		<td style="width: 30%;"><div style="width:380px;white-space:nowrap;overflow:hidden;"><?php if(isset($GLOBALS['Subject'])) print $GLOBALS['Subject']; ?> - <span style="color:#777777;"><?php if(isset($GLOBALS['Notes'])) print $GLOBALS['Notes']; ?></span></div></td>
		<td style="width: 20%;" nowrap="nowrap"><?php if(isset($GLOBALS['Type'])) print $GLOBALS['Type']; ?></td>
		<td style="width: 20%;" nowrap="nowrap"><?php if(isset($GLOBALS['Date'])) print $GLOBALS['Date']; ?></td>
		<td style="width: 10%;" nowrap="nowrap"><?php if(isset($GLOBALS['User'])) print $GLOBALS['User']; ?></td>
		<td style="width: 15%;" nowrap="nowrap">
			<?php if(isset($GLOBALS['EventEditLink'])) print $GLOBALS['EventEditLink']; ?>
			<?php if(isset($GLOBALS['EventDeleteLink'])) print $GLOBALS['EventDeleteLink']; ?>
		</td>
	</tr>

<script>

if (!subscribers[<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>]) {
	subscribers[<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>] = new Array;
}
subscribers[<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>][<?php if(isset($GLOBALS['eventid'])) print $GLOBALS['eventid']; ?>] = <?php if(isset($GLOBALS['EventJSON'])) print $GLOBALS['EventJSON']; ?>;

</script>
