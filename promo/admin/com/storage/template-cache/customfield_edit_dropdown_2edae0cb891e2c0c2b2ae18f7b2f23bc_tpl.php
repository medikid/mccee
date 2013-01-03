<?php $IEM = $tpl->Get('IEM'); ?>		<td width="200" class="FieldLabel">
			<?php if(isset($GLOBALS['Required'])) print $GLOBALS['Required']; ?>
			<?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>:&nbsp;
		</td>
		<td>
			<select id="CustomFields[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>]" name="CustomFields[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>]">
				<?php if(isset($GLOBALS['OptionList'])) print $GLOBALS['OptionList']; ?>
			</select>
		</td>
