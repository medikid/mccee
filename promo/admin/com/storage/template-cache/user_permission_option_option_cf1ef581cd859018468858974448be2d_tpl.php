<?php $IEM = $tpl->Get('IEM'); ?><tr<?php if(isset($GLOBALS['CheckBoxRowAttribute'])) print $GLOBALS['CheckBoxRowAttribute']; ?>>
	<td>
		<label for="<?php if(isset($GLOBALS['CheckBoxName'])) print $GLOBALS['CheckBoxName']; ?>"><input type="checkbox" name="<?php if(isset($GLOBALS['CheckBoxName'])) print $GLOBALS['CheckBoxName']; ?>" id="<?php if(isset($GLOBALS['CheckBoxName'])) print $GLOBALS['CheckBoxName']; ?>" value="1"<?php if(isset($GLOBALS['CheckBoxChecked'])) print $GLOBALS['CheckBoxChecked']; ?>>&nbsp;<?php if(isset($GLOBALS['CheckBoxOption'])) print $GLOBALS['CheckBoxOption']; ?></label>
	</td>
</tr>
