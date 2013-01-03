<?php $IEM = $tpl->Get('IEM'); ?><table class="subscriberEventTable" id="event_<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>_<?php if(isset($GLOBALS['eventid'])) print $GLOBALS['eventid']; ?>">
	<tr>
		<td colspan="2" class="eventtype">
			<?php if(isset($GLOBALS['Type'])) print $GLOBALS['Type']; ?>
			<span style="font-weight: normal;display:<?php if(isset($GLOBALS['EventLinkDisplay'])) print $GLOBALS['EventLinkDisplay']; ?>">
			( <?php if(isset($GLOBALS['EventEditLink'])) print $GLOBALS['EventEditLink']; ?> <?php if(isset($GLOBALS['EventOr'])) print $GLOBALS['EventOr']; ?> <?php if(isset($GLOBALS['EventDeleteLink'])) print $GLOBALS['EventDeleteLink']; ?> )
			</span>
		</td>
	</tr>
	<tr>
		<td class="eventsubject"><?php print GetLang('Subject'); ?>:</td>
		<td><?php if(isset($GLOBALS['Subject'])) print $GLOBALS['Subject']; ?></td>
	</tr>
	<tr>
		<td class="eventdate"><?php print GetLang('Date'); ?>:</td>
		<td><?php if(isset($GLOBALS['Date'])) print $GLOBALS['Date']; ?></td>
	</tr>
	<tr>
		<td class="eventnotes"><?php print GetLang('Notes'); ?>:</td>
		<td><?php if(isset($GLOBALS['Notes'])) print $GLOBALS['Notes']; ?></td>
	</tr>
</table>
<script>
if (!subscribers[<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>]) {
	subscribers[<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>] = new Array;
}
subscribers[<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>][<?php if(isset($GLOBALS['eventid'])) print $GLOBALS['eventid']; ?>] = <?php if(isset($GLOBALS['EventJSON'])) print $GLOBALS['EventJSON']; ?>;
</script>