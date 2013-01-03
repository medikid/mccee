<?php $IEM = $tpl->Get('IEM'); ?><script>
	Application.Page.NewslettersManage = {
		eventDOMReady: function(event) {
			Application.Ui.CheckboxSelection(	'table#NewsletterManageList',
												'input.UICheckboxToggleSelector',
												'input.UICheckboxToggleRows');
		}
	}

	Application.init.push(Application.Page.NewslettersManage.eventDOMReady);
</script>
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1"><?php print GetLang('NewslettersManage'); ?></td>
	</tr>
	<tr>
		<td class="body pageinfo"><p><?php print GetLang('Help_NewslettersManage'); ?><?php if(isset($GLOBALS['Newsletters_HasAccess'])) print $GLOBALS['Newsletters_HasAccess']; ?></p></td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
		</td>
	</tr>
	<tr>
		<td class="body">
			<table width="100%" border="0">
				<tr>
					<td>
						<div style="padding-top:10px; padding-bottom:10px">
							<?php if(isset($GLOBALS['Newsletters_AddButton'])) print $GLOBALS['Newsletters_AddButton']; ?>
							<?php if(isset($GLOBALS['Newsletters_ExtraButtons'])) print $GLOBALS['Newsletters_ExtraButtons']; ?>
						</div>
						<form name="ActionNewslettersForm" method="post" action="index.php?Page=Newsletters&Action=Change" onsubmit="return ConfirmChanges();" style="margin: 0px; padding: 0px;">
							<select name="ChangeType">
								<option value="" selected="selected"><?php print GetLang('ChooseAction'); ?></option>
								<?php if(isset($GLOBALS['Option_DeleteNewsletter'])) print $GLOBALS['Option_DeleteNewsletter']; ?>
								<?php if(isset($GLOBALS['Option_ArchiveNewsletter'])) print $GLOBALS['Option_ArchiveNewsletter']; ?>
								<?php if(isset($GLOBALS['Option_ActivateNewsletter'])) print $GLOBALS['Option_ActivateNewsletter']; ?>
							</select>
							<input type="submit" name="cmdChangeType" value="<?php print GetLang('Go'); ?>" class="Text">
					</td>
					<td align="right" valign="bottom">
						%%TPL_Paging%%
					</td>
				</tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" width="100%" class="Text" id="NewsletterManageList">
				<tr class="Heading3">
					<td width="5" nowrap align="center">
						<input type="checkbox" name="toggle" class="UICheckboxToggleSelector" />
					</td>
					<td width="5">&nbsp;</td>
					<td width="25%" nowrap="nowrap">
						<?php print GetLang('Name'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Name&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Name&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border="0" /></a>
					</td>
					<td width="30%" nowrap="nowrap">
						<?php print GetLang('Subject'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Subject&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Subject&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border="0" /></a>
					</td>
					<td width="14%" nowrap="nowrap">
						<?php print GetLang('Created'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Date&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Date&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border="0" /></a>
					</td>
					<td width="10%" nowrap="nowrap">
						<?php print GetLang('LastSent'); ?>
					</td>
					<td width="11%" nowrap="nowrap">
						<?php print GetLang('Owner'); ?>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Owner&Direction=Up&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortup.gif" border="0" /></a>&nbsp;<a href='index.php?Page=<?php print $IEM['CurrentPage']; ?>&SortBy=Owner&Direction=Down&<?php if(isset($GLOBALS['SearchDetails'])) print $GLOBALS['SearchDetails']; ?>'><img src="images/sortdown.gif" border="0" /></a>
					</td>
					<td width="5%">
						<span class="HelpText" onMouseOut="HideHelp('active');" onMouseOver="ShowQuickHelp('active', '<?php print GetLang('Active'); ?>', '<?php print GetLang('ActiveEmailCampaignHelp'); ?>');"><?php print GetLang('Active'); ?></span><br /><div style="font-weight: normal" id="active" style="display: none;"></div>
					</td>
					<td width="5%">
						<span class="HelpText" onMouseOut="HideHelp('archive');" onMouseOver="ShowQuickHelp('archive', '<?php print GetLang('Archive'); ?>', '<?php print GetLang('ArchiveHelp'); ?>');"><?php print GetLang('Archive'); ?></span><br /><div style="font-weight: normal" id="archive" style="display: none;"></div>
					</td>
					<td width="150">
						<?php print GetLang('Action'); ?>
					</td>
				</tr>
				%%TPL_Newsletters_Manage_Row%%
			</table>
			%%TPL_Paging_Bottom%%
		</td>
	</tr>
</table>

<script>
	function ConfirmChanges() {
		formObj = document.ActionNewslettersForm;

		if (formObj.ChangeType.selectedIndex == 0) {
			alert("<?php print GetLang('PleaseChooseAction'); ?>");
			formObj.ChangeType.focus();
			return false;
		}

		selectedValue = formObj.ChangeType[formObj.ChangeType.selectedIndex].value;

		newsletters_found = 0;
		for (var i=0;i < formObj.length;i++)
		{
			fldObj = formObj.elements[i];
			if (fldObj.type == 'checkbox')
			{
				if (fldObj.checked) {
					newsletters_found++;
					break;
				}
			}
		}

		if (newsletters_found <= 0) {
			alert("<?php print GetLang('ChooseNewsletters'); ?>");
			return false;
		}

		if (confirm("<?php print GetLang('ConfirmChanges'); ?>")) {
			return true;
		}

		return false;
	}

	function ConfirmDelete(NewsletterID) {
		if (!NewsletterID) {
			return false;
		}
		if (confirm("<?php print GetLang('DeleteNewsletterPrompt'); ?>")) {
			document.location='index.php?Page=<?php print $IEM['CurrentPage']; ?>&Action=Delete&id=' + NewsletterID;
			return true;
		}
	}
</script>
