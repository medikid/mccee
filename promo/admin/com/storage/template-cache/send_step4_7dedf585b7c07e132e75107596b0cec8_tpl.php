<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td class="Heading1">
			<?php print GetLang('Send_Step4'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Messages'])) print $GLOBALS['Messages']; ?>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo">
			<p>
				<?php if(isset($GLOBALS['SentToTestListWarning'])) print $GLOBALS['SentToTestListWarning']; ?>
				<?php if(isset($GLOBALS['ImageWarning'])) print $GLOBALS['ImageWarning']; ?>
				<?php if(isset($GLOBALS['EmailSizeWarning'])) print $GLOBALS['EmailSizeWarning']; ?>
				<?php print GetLang('Send_Step4_Intro'); ?>
			</p>
			<ul style="margin-bottom:0px">
				<li><?php if(isset($GLOBALS['Send_NewsletterName'])) print $GLOBALS['Send_NewsletterName']; ?></li>
				<li><?php if(isset($GLOBALS['Send_NewsletterSubject'])) print $GLOBALS['Send_NewsletterSubject']; ?></li>
				<li><?php if(isset($GLOBALS['Send_SubscriberList'])) print $GLOBALS['Send_SubscriberList']; ?></li>
				<li><?php if(isset($GLOBALS['Send_TotalRecipients'])) print $GLOBALS['Send_TotalRecipients']; ?></li>
				<?php if(isset($GLOBALS['ApproximateSendSize'])) print $GLOBALS['ApproximateSendSize']; ?>
				<li><?php print GetLang('Send_Not_Completed'); ?></li>
			</ul>
			<br />
		</td>
	</tr>
	<tr>
		<td class="body">
			<input type="button" value="<?php print GetLang('StartSending'); ?>" class="SmallButton" style="font-weight:bold; width:190px" onclick="javascript: PopupWindow();">
			<input type="button" value="<?php print GetLang('Cancel'); ?>" class="FormButton" onclick="if(confirm('<?php print GetLang('ConfirmCancelSend'); ?>')) {document.location='index.php?Page=Newsletters';}">
		</td>
	</tr>
</table>
<script>
	function PopupWindow() {
		var top = screen.height / 2 - (170);
		var left = screen.width / 2 - (225);

		if(confirm('<?php print GetLang('PopupSendWarning'); ?>')) {
			window.open("index.php?Page=Send&Action=Send&Job=<?php if(isset($GLOBALS['JobID'])) print $GLOBALS['JobID']; ?>","sendWin","left=" + left + ",top="+top+",toolbar=false,status=no,directories=false,menubar=false,scrollbars=false,resizable=false,copyhistory=false,width=480,height=290");
		}
	}
</script>
