<?php $IEM = $tpl->Get('IEM'); ?><tr class="GridRow">
	<td>
		<input type="checkbox" name="newsletters[]" value="<?php if(isset($GLOBALS['id'])) print $GLOBALS['id']; ?>" class="UICheckboxToggleRows">
	</td>
	<td>
		<?php if(isset($GLOBALS['NewsletterIcon'])) print $GLOBALS['NewsletterIcon']; ?>
	</td>
	<td>
		<span title="<?php if(isset($GLOBALS['Name'])) print $GLOBALS['Name']; ?>"><?php if(isset($GLOBALS['Short_Name'])) print $GLOBALS['Short_Name']; ?></span>
	</td>
	<td>
		<span title="<?php if(isset($GLOBALS['Subject'])) print $GLOBALS['Subject']; ?>"><?php if(isset($GLOBALS['Short_Subject'])) print $GLOBALS['Short_Subject']; ?></span>
	</td>
	<td>
		<?php if(isset($GLOBALS['Created'])) print $GLOBALS['Created']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['LastSent'])) print $GLOBALS['LastSent']; ?>
	</td>
	<td>
		<?php if(isset($GLOBALS['Owner'])) print $GLOBALS['Owner']; ?>
	</td>
	<td>
		<center><?php if(isset($GLOBALS['ActiveAction'])) print $GLOBALS['ActiveAction']; ?></center>
	</td>
	<td>
		<center><?php if(isset($GLOBALS['ArchiveAction'])) print $GLOBALS['ArchiveAction']; ?></center>
	</td>
	<td>
		<?php if(isset($GLOBALS['NewsletterAction'])) print $GLOBALS['NewsletterAction']; ?>
	</td>
</tr>
