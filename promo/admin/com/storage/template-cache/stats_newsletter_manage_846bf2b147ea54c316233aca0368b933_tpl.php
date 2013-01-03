<?php $IEM = $tpl->Get('IEM'); ?><script>
	Application.Page.StatsNewsletterManage = {
		eventDOMReady: function(event) {
			Application.Ui.CheckboxSelection(	'table#StatisticsNewsletterManageList',
												'input.UICheckboxToggleSelector',
												'input.UICheckboxToggleRows');
		}
	};

	Application.init.push(Application.Page.StatsNewsletterManage.eventDOMReady);
</script>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1"><?php print GetLang('Stats_NewsletterStatistics'); ?></td>
	</tr>
	<tr>
		<td class="body pageinfo"><p><?php print GetLang('Stats_Newsletters_Step1_Intro'); ?></p></td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
		</td>
	</tr>
	<tr>
		<td class="body">
			<form name="mystatsform" method="post" action="index.php?Page=Stats&Action=Newsletters&SubAction=DoSelect">
				<table width="100%" border="0">
					<tr>
						<td valign="top">
							<select name="SelectAction">
								<option value="" SELECTED><?php print GetLang('ChooseAction'); ?></option>
								<option value="delete"><?php print GetLang('Delete_Stats_Selected'); ?></option>
								<option value="export"><?php print GetLang('Export_Stats_Selected'); ?></option>
								<option value="print"><?php print GetLang('Print_Stats_Selected'); ?></option>
							</select>
							<input type="submit" name="cmdSelectAction" value="<?php print GetLang('Go'); ?>" class="Text" onclick="return DoSelectedStats();" />
						</td>
						<td align="right">
							%%TPL_Paging%%
						</td>
					</tr>
				</table>
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Text" id="StatisticsNewsletterManageList">
					<tr class="Heading3">
						<td width="5"><input type="checkbox" name="toggle" class="UICheckboxToggleSelector"></td>
						<td width="5"></td>
						<td width="30%">
							<?php print GetLang('NewsletterName'); ?>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=Newsletter&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=Newsletter&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="26%">
							<?php print GetLang('ListName'); ?>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=List&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=List&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="22%" nowrap>
							<?php print GetLang('DateStarted'); ?>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=StartDate&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=StartDate&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="22%" nowrap>
							<?php print GetLang('DateFinished'); ?>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=FinishDate&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=FinishDate&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="90" nowrap>
							<?php print GetLang('TotalRecipients'); ?>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=Recipients&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=Recipients&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="110" nowrap>
							<?php print GetLang('UnsubscribeCount'); ?>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=Unsubscribes&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=Unsubscribes&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="90" nowrap>
							<?php print GetLang('BounceCount'); ?>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=Bounces&Direction=Up'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Stats&Action=Newsletters&SubAction=Step1&SortBy=Bounces&Direction=Down'><img src="images/sortdown.gif" border=0></a>
						</td>
						<td width="100">
							<?php print GetLang('Action'); ?>
						</td>
					</tr>
				%%TPL_Stats_Newsletter_Manage_Row%%
				</table>
			</form>
			%%TPL_Paging_Bottom%%
		</td>
	</tr>
</table>
<script>

	function DoSelectedStats() {
	        if (document.forms['mystatsform'].SelectAction.value == 'delete') {
	          // Require confirmation to delete
                  formObj = document.forms['mystatsform'];
                  stats_found = 0;
                  for (var i=0;i < formObj.length;i++)
                  {
                          fldObj = formObj.elements[i];
                          if (fldObj.type == 'checkbox')
                          {
                                  if (fldObj.checked) {
                                          stats_found++;
                                  }
                          }
                  }

                  if (stats_found <= 0) {
                          alert("<?php print GetLang('ChooseStatsToDelete'); ?>");
                          return false;
                  }

                  if (confirm("<?php print GetLang('DeleteStatsPrompt'); ?>")) {
                          return true;
                  }
                  return false;
		} else if (document.forms['mystatsform'].SelectAction.value == 'print') {
		  var url = 'remote_stats.php?height=380&width=420&statstype=n&overflow=none&Action=print';

                  formObj = document.forms['mystatsform'];
                  stats_found = 0;
                  for (var i=0;i < formObj.length;i++)
                  {
                          fldObj = formObj.elements[i];
                          if (fldObj.type == 'checkbox')
                          {
                                  if (fldObj.checked) {
                                          url = url + '&stats[]=' + fldObj.value;
                                  }
                          }
                  }
		  tb_show('',url);
		  return false;
		}
		return true;
	}

	function ConfirmDelete(StatsID) {
		if (!StatsID) {
			return false;
		}

		if (confirm("<?php print GetLang('DeleteStatsPrompt'); ?>")) {
			document.location='index.php?Page=Stats&Action=Newsletters&SubAction=DoSelect&SelectAction=Delete&id=' + StatsID;
		}
	}
</script>
