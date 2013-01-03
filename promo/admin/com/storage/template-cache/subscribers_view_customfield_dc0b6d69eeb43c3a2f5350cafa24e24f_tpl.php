<?php $IEM = $tpl->Get('IEM'); ?>		<td width="200" class="FieldLabel">
			<?php if(isset($GLOBALS['Required'])) print $GLOBALS['Required']; ?>
			<?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>:&nbsp;
		</td>
		<td>
			<?php if(isset($GLOBALS['FieldValue'])) print $GLOBALS['FieldValue']; ?>
		</td>
