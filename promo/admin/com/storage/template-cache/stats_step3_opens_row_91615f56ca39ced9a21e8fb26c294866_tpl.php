<?php $IEM = $tpl->Get('IEM'); ?><tr class="GridRow">
	<td height="22" nowrap align="left">
		&nbsp;<?php if(isset($GLOBALS['EmailAddress'])) print $GLOBALS['EmailAddress']; ?>
	</td>
	<td nowrap align="left">
		<?php if(isset($GLOBALS['DateOpened'])) print $GLOBALS['DateOpened']; ?>
	</td>
	<td nowrap align="left">
		<?php if(isset($GLOBALS['OpenedEmailAsType'])) print $GLOBALS['OpenedEmailAsType']; ?>
	</td>
</tr>
