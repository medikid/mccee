<?php $IEM = $tpl->Get('IEM'); ?><tr class="GridRow">
	<td valign="top" align="center">
		<input type="checkbox" name="stats[]" value="<?php if(isset($GLOBALS['StatID'])) print $GLOBALS['StatID']; ?>" class="UICheckboxToggleRows">
	</td>
	<td valign="top"><img src="images/m_stats.gif"></td>
	<td>
		<?php if(isset($GLOBALS['Newsletter'])) print $GLOBALS['Newsletter']; ?>
	</td>
	<td>
		<span title="<?php if(isset($GLOBALS['MailingList_Full'])) print $GLOBALS['MailingList_Full']; ?>"><?php if(isset($GLOBALS['MailingList'])) print $GLOBALS['MailingList']; ?></span>
	</td>
	<td>
		<?php if(isset($GLOBALS['StartDate'])) print $GLOBALS['StartDate']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['FinishDate'])) print $GLOBALS['FinishDate']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['TotalRecipients'])) print $GLOBALS['TotalRecipients']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['UnsubscribeCount'])) print $GLOBALS['UnsubscribeCount']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['BounceCount'])) print $GLOBALS['BounceCount']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['StatsAction'])) print $GLOBALS['StatsAction']; ?>
	</td>
</tr>
