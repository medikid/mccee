<?php $IEM = $tpl->Get('IEM'); ?><tr class="GridRow">
	<td valign="top" align="center">
		<input type="checkbox" name="customfields[]" value="<?php if(isset($GLOBALS['id'])) print $GLOBALS['id']; ?>" class="UICheckboxToggleRows">
	</td>
	<td>
		<img src="images/customfields.gif">
	</td>
	<td>
		<?php if(isset($GLOBALS['Name'])) print $GLOBALS['Name']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['Created'])) print $GLOBALS['Created']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['CustomFieldType'])) print $GLOBALS['CustomFieldType']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['CustomFieldRequired'])) print $GLOBALS['CustomFieldRequired']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['CustomFieldAction'])) print $GLOBALS['CustomFieldAction']; ?>
	</td>
</tr>
