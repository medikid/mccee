<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="body"><?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?></td>
	</tr>
	<tr><td class="body"><?php if(isset($GLOBALS['Event_AddButton'])) print $GLOBALS['Event_AddButton']; ?></td></tr>
</table>