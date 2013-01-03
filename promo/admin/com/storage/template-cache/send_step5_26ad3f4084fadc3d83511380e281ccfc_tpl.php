<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="3" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php print GetLang('Send_Step5'); ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<?php print GetLang('Send_Step5_KeepBrowserWindowOpen'); ?>
		</td>
	</tr>
	<tr>
		<td class="body">
			<ul style="line-height:1.5; margin-left:30px; padding-left:0px">
				<li><?php if(isset($GLOBALS['Send_NumberAlreadySent'])) print $GLOBALS['Send_NumberAlreadySent']; ?></li>
				<li><?php if(isset($GLOBALS['Send_NumberLeft'])) print $GLOBALS['Send_NumberLeft']; ?></li>
				<li><?php if(isset($GLOBALS['SendTimeSoFar'])) print $GLOBALS['SendTimeSoFar']; ?></li>
				<li><?php if(isset($GLOBALS['SendTimeLeft'])) print $GLOBALS['SendTimeLeft']; ?></li>
			</ul>
			<input type="button" class="SmallButton" style="width:260px" value="<?php print GetLang('PauseSending'); ?>" onclick="PauseSending()" />
		</td>
	</tr>
</table>
<script>
	function PauseSending() {
		window.opener.document.location = 'index.php?Page=Send&Action=PauseSend&Job=<?php if(isset($GLOBALS['JobID'])) print $GLOBALS['JobID']; ?>';
		window.opener.focus();
		window.close();
	}
</script>

<script>
	setTimeout('window.location="index.php?Page=Send&Action=Send&Job=<?php if(isset($GLOBALS['JobID'])) print $GLOBALS['JobID']; ?>&Started=1"', 1);
</script>
