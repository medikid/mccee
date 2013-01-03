<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php print GetLang('Send_Finished_Heading'); ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<p>
				<?php if(isset($GLOBALS['SendReport_Intro'])) print $GLOBALS['SendReport_Intro']; ?>
			</p>
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Send_Report'])) print $GLOBALS['Send_Report']; ?>
		</td>
	</tr>
	<tr>
		<td><br>
			<input type="button" value="<?php print GetLang('OK'); ?>" onclick="javascript: document.location='index.php?Page=Newsletters';" class="FormButton">
		</td>
	</tr>
</table>
<script>
	function ShowReport(reporttype) {
		var link = 'index.php?Page=Send&Action=View_Report&ReportType=' + reporttype;

		var top = screen.height / 2 - (230);
		var left = screen.width / 2 - (250);

		window.open(link,"reportWin","left=" + left + ",top="+top+",toolbar=false,status=no,directories=false,menubar=false,scrollbars=false,resizable=false,copyhistory=false,width=500,height=460");
	}
</script>
