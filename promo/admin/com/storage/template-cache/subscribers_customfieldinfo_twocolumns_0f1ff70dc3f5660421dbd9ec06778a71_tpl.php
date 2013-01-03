<?php $IEM = $tpl->Get('IEM'); ?><tr>
	<td colspan="2">
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="50%">
					<table width="100%">
						<?php if(isset($GLOBALS['CustomFieldInfo_1'])) print $GLOBALS['CustomFieldInfo_1']; ?>
					</table>
				</td>
				<td width="50%">
					<table width="100%">
						<?php if(isset($GLOBALS['CustomFieldInfo_2'])) print $GLOBALS['CustomFieldInfo_2']; ?>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>