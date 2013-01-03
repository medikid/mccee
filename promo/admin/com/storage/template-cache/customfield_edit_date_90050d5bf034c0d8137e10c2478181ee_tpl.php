<?php $IEM = $tpl->Get('IEM'); ?>		<td width="200" class="FieldLabel">
			<?php if(isset($GLOBALS['Required'])) print $GLOBALS['Required']; ?>
			<?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>:&nbsp;
		</td>
		<td id="CustomFieldDateInput_<?php if(isset($GLOBALS['CustomFieldID'])) print $GLOBALS['CustomFieldID']; ?>" class="CustomFieldDateInput_Row">
			<?php if(isset($GLOBALS['Display_date_Field1'])) print $GLOBALS['Display_date_Field1']; ?>
			<?php if(isset($GLOBALS['Display_date_Field2'])) print $GLOBALS['Display_date_Field2']; ?>
			<?php if(isset($GLOBALS['Display_date_Field3'])) print $GLOBALS['Display_date_Field3']; ?>
			<input type="hidden" id="CustomFiledDateInput_Anchor_<?php if(isset($GLOBALS['CustomFieldID'])) print $GLOBALS['CustomFieldID']; ?>" class="CustomFieldDateInput_DatepickerAnchor" />
			<?php if(isset($GLOBALS['GoogleCalendarButton'])) print $GLOBALS['GoogleCalendarButton']; ?>
		</td>