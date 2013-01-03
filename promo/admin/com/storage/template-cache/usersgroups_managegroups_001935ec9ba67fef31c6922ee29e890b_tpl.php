<?php $IEM = $tpl->Get('IEM'); ?><style type="text/css">
	tr.Heading3 td { white-space:nowrap }

	table#ActionContainerTop { padding-top:5px; border:0; width:100% }
	table#ActionContainerTop input { width:150px }
</style>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr><td class="Heading1"><?php echo GetLang('UsersGroups_ManageGroups'); ?></td></tr>
	<tr><td class="body pageinfo"><p><?php echo GetLang('UsersGroups_ManageGroups_Intro'); ?></p></td></tr>
	<?php if(trim($tpl->Get('PAGE','messages')) != ''): ?><tr><td><?php echo $tpl->Get('PAGE','messages'); ?></td></tr><?php endif; ?>
	<tr>
		<td class="body">
			<form name="frmUsersGroupsManage" method="post" action="index.php?Page=UsersGroups">
				<table id="ActionContainerTop">
					<tr>
						<td>
							<input id="createGroupButton" type="button" class="SmallButton" value="<?php echo GetLang('UsersGroups_ManageGroups_CreateGroupButton'); ?>" />
							<?php if(count($tpl->Get('records')) != 0): ?><input id="deleteGroupsButton" type="button" class="SmallButton" value="<?php echo GetLang('UsersGroups_ManageGroups_DeleteGroupsButton'); ?>" /><?php endif; ?>
						</td>
						<?php if(count($tpl->Get('records')) != 0): ?><td align="right" valign="bottom"><?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Paging");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?></td><?php endif; ?>
					</tr>
				</table>
				<?php if(count($tpl->Get('records')) != 0): ?>
					<table border="0" cellspacing="0" cellpadding="0" width="100%" class="Text" id="GroupsListTable">
						<tr class="Heading3">
							<td width="5" nowrap align="center">
								<input type="checkbox" name="toggle" class="UICheckboxToggleSelector" />
							</td>
							<td width="5">&nbsp;</td>
							<td width="70%">
								<?php echo GetLang('UsersGroups_Field_GroupName'); ?>
								<a href="index.php?Page=UsersGroups&action=manageGroups&SortBy=groupname&Direction=Up"><img src="images/sortup.gif" border="0" /></a>
								<a href="index.php?Page=UsersGroups&action=manageGroups&SortBy=groupname&Direction=Down"><img src="images/sortdown.gif" border="0" /></a>
							</td>
							<td width="15%">
								<?php echo GetLang('UsersGroups_Field_UsersInGroup'); ?>
								<a href="index.php?Page=UsersGroups&action=manageGroups&SortBy=usercount&Direction=Up"><img src="images/sortup.gif" border="0" /></a>
								<a href="index.php?Page=UsersGroups&action=manageGroups&SortBy=usercount&Direction=Down"><img src="images/sortdown.gif" border="0" /></a>
							</td>
							<td width="15%">
								<?php echo GetLang('UsersGroups_Field_DateCreated'); ?>
								<a href="index.php?Page=UsersGroups&action=manageGroups&SortBy=createdate&Direction=Up"><img src="images/sortup.gif" border="0" /></a>
								<a href="index.php?Page=UsersGroups&action=manageGroups&SortBy=createdate&Direction=Down"><img src="images/sortdown.gif" border="0" /></a>
							</td>
							<td width="70"><?php echo GetLang('Action'); ?></td>
						</tr>
						<?php $array = $tpl->Get('records'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
							<tr class="GridRow GroupRecordRow">
								<td valign="top" align="center"><input type="checkbox" name="groups[]" value="<?php echo $tpl->Get('each','groupid'); ?>" class="UICheckboxToggleRows <?php if($tpl->Get('each','usercount') > 0): ?>GroupContainsUser<?php endif; ?>" /></td>
								<td><img src="images/group.gif"></td>
								<td><?php echo $tpl->Get('each','groupname'); ?></td>
								<td><?php echo $tpl->Get('each','usercount'); ?></td>
								<td style="white-space:nowrap;">&nbsp;<?php echo $tpl->Get('each','processed_CreateDate'); ?></td>
								<td style="white-space:nowrap;">
									<?php if($tpl->Get('each','usercount') != 0): ?><a href="index.php?Page=Users&GroupID=<?php echo $tpl->Get('each','groupid'); ?>" title="<?php echo GetLang('UsersGroups_ManageGroups_Action_ViewUsers'); ?>"><?php endif; ?>
										<?php echo GetLang('UsersGroups_ManageGroups_Action_ViewUsers'); ?>
									<?php if($tpl->Get('each','usercount') != 0): ?></a><?php endif; ?>
									&nbsp;<a href="index.php?Page=UsersGroups&Action=editGroup&GroupID=<?php echo $tpl->Get('each','groupid'); ?>" title="<?php echo GetLang('Edit'); ?>"><?php echo GetLang('Edit'); ?></a>
									&nbsp;
								</td>
							</tr>
						 <?php endforeach; endif; ?>
					</table>
				<?php endif; ?>
			</form>
			
			<?php if(count($tpl->Get('records')) != 0): ?><?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Paging_Bottom");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?><?php endif; ?>
		</td>
	</tr>
</table>
<script type="text/javascript">
Application.Page.UsersGroups_ManageGroups = {
	eventReady: function() {
		if ($('table#GroupsListTable')) {
			Application.Ui.CheckboxSelection('table#GroupsListTable', 'input.UICheckboxToggleSelector', 'input.UICheckboxToggleRows');
			$('input#deleteGroupsButton').click(Application.Page.UsersGroups_ManageGroups.eventDeleteGroups);
			$('input#createGroupButton').click(Application.Page.UsersGroups_ManageGroups.eventCreateGroup);
		}

		$(document.frmUsersGroupsManage).submit(Application.Page.UsersGroups_ManageGroups.eventFormStopEvent);
	},

	eventFormStopEvent: function(e) {
		e.stopPropagation();
		e.preventDefault();
		return false;
	},

	eventDeleteGroups: function(e) {
		var selectedRows = $('table tr.GroupRecordRow input.UICheckboxToggleRows[type=checkbox]:checked');

		if (selectedRows.size() == 0) {
			alert('<?php echo GetLang('UsersGroups_ManageGroups_JS_ChooseAtLeastOne'); ?>');
			return true;
		}

		if (selectedRows.filter('.GroupContainsUser').size() != 0) {
			alert('<?php echo GetLang('UsersGroups_ManageGroups_JS_GroupContainsUser'); ?>');
			return true;
		}

		if (!confirm('<?php echo GetLang('UsersGroups_ManageGroups_JS_DeletePrompt'); ?>')) {
			return true;
		}

		var selectedIDs = [];
		for(var i = 0, j = selectedRows.size(); i < j; ++i) selectedIDs.push(selectedRows.get(i).value);

		Application.Util.submitPost('index.php?Page=UsersGroups&Action=deleteGroups', {groups:selectedIDs});
	},

	eventCreateGroup: function(e) {
		Application.Util.submitGet('index.php', {Page:'UsersGroups', Action:'createGroup'});
	}
};

Application.init.push(Application.Page.UsersGroups_ManageGroups.eventReady);
</script>
