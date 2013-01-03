<?php $IEM = $tpl->Get('IEM'); ?><div id="opennews" style="display: none">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="middle">
				<img src="images/nodejoin.gif" width="20" height="20" border="0">
			</td>
			<td colspan="2">
				<select name="opentype" style="width: 120px;">
					<option value="opened"><?php print GetLang('Search_HaveOpened'); ?></option>
					<option value="not_opened"><?php print GetLang('Search_HaveNotOpened'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="middle">
				&nbsp;
			</td>
			<td valign="middle">
				<img src="images/nodejoin.gif" width="20" height="20" border="0">
			</td>
			<td>
				<select name="newsletterid" id="newsletterid">
				</select>
			</td>
		</tr>
	</table>
</div>
