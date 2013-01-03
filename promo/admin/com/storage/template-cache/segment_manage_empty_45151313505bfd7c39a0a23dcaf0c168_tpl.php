<?php $IEM = $tpl->Get('IEM'); ?><script>
	$(function() {
		if(<?php if(isset($GLOBALS['DisplayCreateButton'])) print $GLOBALS['DisplayCreateButton']; ?>)
			$('#sectionCreateButton').show();
	});
</script>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr><td class="Heading1"><?php print GetLang('SegmentManage'); ?></td></tr>
	<tr><td class="Intro"><?php print GetLang('Help_SegmentManage'); ?></td></tr>
	<tr><td class="body"><?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?></td></tr>
	<tr id="sectionCreateButton" style="display:none;">
		<td class="body">
			<form name="frmCommands" action="index.php" method="get">
				<input type="hidden" name="Page" value="Segment" />
				<input type="hidden" name="Action" value="Create" />
				<input type="submit" value="<?php print GetLang('SegmentManageCreateNew'); ?>" title="<?php print GetLang('SegmentManageCreateNew_Title'); ?>" class="SmallButton" />
			</form>
		</td>
	</tr>
</table>

