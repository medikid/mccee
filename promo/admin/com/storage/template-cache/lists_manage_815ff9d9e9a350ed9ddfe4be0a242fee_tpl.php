<?php $IEM = $tpl->Get('IEM'); ?><script src="includes/js/jquery/interface.js"></script>
<script src="includes/js/jquery/inestedsortable.js"></script>
<script>
Application.Page.ListsManage = {

	updatingSortables: false,
	updateTimeout: null,

	eventDOMReady: function(event) {
		var mode = '<?php if(isset($GLOBALS['Mode'])) print $GLOBALS['Mode']; ?>';
		if (mode == 'Folder') {
			Application.Ui.Folders.CreateSortableList('l');
		}
		Application.Ui.CheckboxSelection(	'table#SubscriberListManageList',
											'input.UICheckboxToggleSelector',
											'input.UICheckboxToggleRows');
	}
}

Application.init.push(Application.Page.ListsManage.eventDOMReady);

</script>
<table cellspacing="0" cellpadding="0" align="center" width="100%">
	<tr>
		<td class="Heading1"><?php print GetLang('ListsManage'); ?></td>
	</tr>
	<tr>
		<td class="Intro pageinfo"><p><?php print GetLang('Help_ListsManage'); ?></p></td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
		</td>
	</tr>
	<tr>
		<td class="body">
			<span class="body"><?php if(isset($GLOBALS['ListsReport'])) print $GLOBALS['ListsReport']; ?></span>
			<form name="ActionListsForm" method="post" action="index.php?Page=Lists&Action=Change" onsubmit="return ConfirmChanges();" style="margin: 0px;padding: 0px;">
				<table width="100%" border="0">
					<tr>
						<td valign="bottom">
							<?php if(isset($GLOBALS['Lists_AddButton'])) print $GLOBALS['Lists_AddButton']; ?>
							<br />
							<select name="ChangeType">
								<option value="" SELECTED><?php print GetLang('ChooseAction'); ?></option>
								<?php if(isset($GLOBALS['Option_DeleteList'])) print $GLOBALS['Option_DeleteList']; ?>
								<?php if(isset($GLOBALS['Option_DeleteSubscribers'])) print $GLOBALS['Option_DeleteSubscribers']; ?>
								<option value="ChangeFormat_Text"><?php print GetLang('ChangeFormat_Text'); ?></option>
								<option value="ChangeFormat_HTML"><?php print GetLang('ChangeFormat_HTML'); ?></option>
								<option value="ChangeStatus_Confirm"><?php print GetLang('ChangeStatus_Confirm'); ?></option>
								<option value="ChangeStatus_Unconfirm"><?php print GetLang('ChangeStatus_Unconfirm'); ?></option>
								<option value="MergeLists"><?php print GetLang('MergeLists'); ?></option>
							</select>
							<input type="submit" name="cmdChangeType" value="<?php print GetLang('Go'); ?>" class="Text">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("folder_viewpicker");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
						</td>
						<td align="right" valign="bottom">
							%%TPL_Paging%%
						</td>
					</tr>
				</table>

				<table border="0" cellspacing="0" cellpadding="0" width="100%" class="Text" id="SubscriberListManageList">
					<tr class="Heading3">
						<td width="28" nowrap align="center">
							<input type="checkbox" name="toggle" class="UICheckboxToggleSelector">
						</td>
						<td width="44" nowrap="nowrap"><img src="images/blank.gif" width="44" height="1" /></td>
						<td width="*" nowrap="nowrap">
							<?php print GetLang('ListName'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Name&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Name&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="120" nowrap="nowrap">
							<?php print GetLang('Created'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Date&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Date&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="120" nowrap="nowrap">
							<?php print GetLang('Subscribers'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Subscribers&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Subscribers&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="120" nowrap="nowrap">
							<?php print GetLang('ListOwner'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=fullname&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=fullname&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="40" nowrap="nowrap" align="center">
							<?php print GetLang('ArchiveLists'); ?>
						</td>
						<td width="240" nowrap="nowrap">
							<?php print GetLang('Action'); ?>
						</td>
					</tr>
				</table>
				<div id="PlaceholderParent" style="margin:0; padding:0;">
					<ul id="PlaceholderSortable" class="SortableList Folder">
						%%TPL_Lists_Manage_Row%%
					</ul>
				</div>
			</form>

			%%TPL_Paging_Bottom%%

		</td>
	</tr>
</table>

<script>

	function closePopup() {
		tb_remove();
	}

	function ConfirmDelete(ListID) {
		if (!ListID) {
			return false;
		}
		if (confirm("<?php print GetLang('DeleteListPrompt'); ?>")) {
			document.location='index.php?Page=<?php print $IEM['CurrentPage']; ?>&Action=Delete&id=' + ListID;
			return true;
		}
	}

	function ConfirmDeleteAllSubscribers(ListID) {
		if (!ListID) {
			return false;
		}
		if (confirm("<?php print GetLang('DeleteAllSubscribersPrompt'); ?>")) {
			document.location='index.php?Page=<?php print $IEM['CurrentPage']; ?>&Action=DeleteAllSubscribers&id=' + ListID;
			return true;
		}
	}

	function ConfirmChanges() {
		formObj = document.ActionListsForm;

		if (formObj.ChangeType.selectedIndex == 0) {
			alert("<?php print GetLang('PleaseChooseAction'); ?>");
			formObj.ChangeType.focus();
			return false;
		}

		selectedValue = formObj.ChangeType[formObj.ChangeType.selectedIndex].value;

		lists_found = 0;
		for (var i=0;i < formObj.length;i++)
		{
			fldObj = formObj.elements[i];
			if (fldObj.type == 'checkbox')
			{
				if (fldObj.checked) {
					lists_found++;
					// check for more than 2 lists found already
					// as merging lists together requires more than one being selected.
					if (lists_found > 2) {
						break;
					}
				}
			}
		}

		if (lists_found <= 0) {
			alert("<?php print GetLang('ChooseList'); ?>");
			return false;
		}

		if (selectedValue == 'MergeLists') {
			if (lists_found < 2) {
				alert("<?php print GetLang('ChooseMultipleLists'); ?>");
				return false;
			}
		}

		if (confirm("<?php print GetLang('ConfirmChanges'); ?>")) {
			return true;
		}

		return false;
	}

</script>
