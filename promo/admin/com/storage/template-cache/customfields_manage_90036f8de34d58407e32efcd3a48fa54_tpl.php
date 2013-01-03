<?php $IEM = $tpl->Get('IEM'); ?><script>
	Application.Page.CustomfieldManage = {
		eventDOMReady: function(event) {
			Application.Ui.CheckboxSelection(	'table#CustomfieldManageList',
												'input.UICheckboxToggleSelector',
												'input.UICheckboxToggleRows');
		}
	};

	Application.init.push(Application.Page.CustomfieldManage.eventDOMReady);
</script>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1"><?php print GetLang('CustomFieldsManage'); ?></td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<p><?php print GetLang('Help_CustomFieldsManage'); ?> <a href="Javascript:LaunchHelp('<?php print $IEM['InfoTips']; ?>','810')"><?php print GetLang('WhatAreCustomFields'); ?></a></p>
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
		</td>
	</tr>
	<tr>
		<td class="body">
			<form name="formsform" method="post" action="index.php?Page=CustomFields&Action=Delete" onsubmit="return DeleteSelectedCustomFields(this);">
			<table width="100%" border="0">
				<tr>
					<td valign="top" valign="bottom">
						<?php if(isset($GLOBALS['CustomFields_AddButton'])) print $GLOBALS['CustomFields_AddButton']; ?>
						<?php if(isset($GLOBALS['CustomFields_DeleteButton'])) print $GLOBALS['CustomFields_DeleteButton']; ?>
					</td>
					<td align="right" valign="bottom">
						%%TPL_Paging%%
					</td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" width="100%" class="Text" id="CustomfieldManageList">
				<tr class="Heading3">
					<td width="5" nowrap align="center">
						<input type="checkbox" name="toggle" class="UICheckboxToggleSelector" />
					</td>
					<td width="5">&nbsp;</td>
					<td width="55%">
						<?php print GetLang('CustomFieldsName'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Name&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Name&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border=0></a>
					</td>
					<td width="15%">
						<?php print GetLang('Created'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Date&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Date&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border=0></a>
					</td>
					<td width="15%">
						<?php print GetLang('CustomFieldsType'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Type&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Type&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border=0></a>
					</td>
					<td width="20%">
						<?php print GetLang('CustomFieldRequired1'); ?>
					</td>
					<td width="100">
						<?php print GetLang('Action'); ?>
					</td>
				</tr>
				%%TPL_CustomFields_Manage_Row%%
			</table>
			%%TPL_Paging_Bottom%%
		</td>
	</tr>
</table>

<script>
	function DeleteSelectedCustomFields(formObj) {
		fields_found = 0;
		for (var i=0;i < formObj.length;i++)
		{
			fldObj = formObj.elements[i];
			if (fldObj.type == 'checkbox')
			{
				if (fldObj.checked) {
					fields_found++;
					break;
				}
			}
		}

		if (fields_found < 1) {
			alert("<?php print GetLang('ChooseFieldsToDelete'); ?>");
			return false;
		}

		if (confirm("<?php print GetLang('ConfirmChanges'); ?>")) {
			return true;
		}
		return false;
	}

function ConfirmDelete(FieldID) {
	if (!FieldID) {
		return false;
	}
	if (confirm("<?php print GetLang('DeleteCustomFieldPrompt'); ?>")) {
		document.location='index.php?Page=<?php print $IEM['CurrentPage']; ?>&Action=Delete&id=' + FieldID;
		return true;
	}
}

</script>
