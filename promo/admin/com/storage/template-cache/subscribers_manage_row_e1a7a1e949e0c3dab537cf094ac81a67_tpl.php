<?php $IEM = $tpl->Get('IEM'); ?><tr class="GridRow" id="subscriber<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>">
	<td align="center">
		<input type="checkbox" name="subscribers[]" value="<?php if(isset($GLOBALS['subscriberid'])) print $GLOBALS['subscriberid']; ?>" class="UICheckboxToggleRows">
	</td>
	<td width="36" class="eventButton" nowrap="nowrap">
		<img src="images/m_subscribers.gif">
		<span class="eventButton"><?php if(isset($GLOBALS['EventButton'])) print $GLOBALS['EventButton']; ?></span>
	</td>
	<?php if(isset($GLOBALS['Columns'])) print $GLOBALS['Columns']; ?>
	<td>
		<?php if(isset($GLOBALS['SubscriberAction'])) print $GLOBALS['SubscriberAction']; ?>
	</td>
</tr>
<tr class="subscriberEventRow subscriberEventRowActive" id="subscriber<?php if(isset($GLOBALS['SubscriberID'])) print $GLOBALS['SubscriberID']; ?>_Events" style="width:100%;">
	<td colspan="<?php if(isset($GLOBALS['ColumnCount'])) print $GLOBALS['ColumnCount']; ?>" class="dataCol"><div class="dataArea"></div></td>
</tr>
