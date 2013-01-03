<?php $IEM = $tpl->Get('IEM'); ?><table cellspacing="0" cellpadding="0" width="100%" align="center">
<tr>
	<td>

<div class="Heading1"><?php print GetLang('Stats_NewsletterStatistics'); ?> for &quot;<?php if(isset($GLOBALS['NewsletterName'])) print $GLOBALS['NewsletterName']; ?>&quot;</div>

<script>
	var TabSize = 6;
</script>

<div>
	<br>

	<ul id="tabnav">
		<li><a href="#" class="active" onClick="ShowTab(1)" id="tab1"><?php print GetLang('NewsletterStatistics_Snapshot'); ?></a></li>
		<li><a href="#" onClick="ShowTab(2)" id="tab2"><?php print GetLang('NewsletterStatistics_Snapshot_OpenStats'); ?></a></li>
		<li><a href="#" onClick="ShowTab(3)" id="tab3"><?php print GetLang('NewsletterStatistics_Snapshot_LinkStats'); ?></a></li>
		<li><a href="#" onClick="ShowTab(4)" id="tab4"><?php print GetLang('NewsletterStatistics_Snapshot_BounceStats'); ?></a></li>
		<li><a href="#" onClick="ShowTab(5)" id="tab5"><?php print GetLang('NewsletterStatistics_Snapshot_UnsubscribeStats'); ?></a></li>
		<li><a href="#" onClick="ShowTab(6)" id="tab6"><?php print GetLang('NewsletterStatistics_Snapshot_ForwardStats'); ?></a></li>
	</ul>

</div>
<div id="div1">
	<div class="body pageinfo">
		<br><?php if(isset($GLOBALS['SummaryIntro'])) print $GLOBALS['SummaryIntro']; ?>
		<br><br>
	</div>
	<table width="100%" border="0">
		<tr>
			<td width="45%" valign="top" rowspan="2">
				<table border=0 width="100%" class="Text" cellspacing="0">
					<tr class="Heading3">
						<td colspan="2" nowrap align="left">
							<?php print GetLang('NewsletterStatistics_Snapshot_Heading'); ?>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left">
							&nbsp;<?php print GetLang('NewsletterSubject'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<a title="<?php print GetLang('PreviewThisNewsletter'); ?>" href="#" onclick="PreparePreview(); return false;"><?php if(isset($GLOBALS['NewsletterSubject'])) print $GLOBALS['NewsletterSubject']; ?></a>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left">
							&nbsp;<?php print GetLang('Stats_Newsletters_SelectList_Intro'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<a title="<?php print GetLang('EditThisNewsletter'); ?>" href="index.php?Page=Newsletters&Action=Edit&id=<?php if(isset($GLOBALS['NewsletterID'])) print $GLOBALS['NewsletterID']; ?>"><?php if(isset($GLOBALS['NewsletterName'])) print $GLOBALS['NewsletterName']; ?></a>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left" valign="top">
							&nbsp;<?php if(isset($GLOBALS['SentToLists'])) print $GLOBALS['SentToLists']; ?>
						</td>
						<td width="70%" height="22" nowrap align="left" valign="top">
							<?php if(isset($GLOBALS['MailingLists'])) print $GLOBALS['MailingLists']; ?>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left">
							&nbsp;<?php print GetLang('NewsletterStatistics_StartSending'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<?php if(isset($GLOBALS['StartSending'])) print $GLOBALS['StartSending']; ?>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left">
							&nbsp;<?php print GetLang('NewsletterStatistics_FinishSending'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<?php if(isset($GLOBALS['FinishSending'])) print $GLOBALS['FinishSending']; ?>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left">
							&nbsp;<?php print GetLang('NewsletterStatistics_SendingTime'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<?php if(isset($GLOBALS['SendingTime'])) print $GLOBALS['SendingTime']; ?>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left" valign="top">
							&nbsp;<?php print GetLang('NewsletterStatistics_SentTo'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<?php if(isset($GLOBALS['SentToDetails'])) print $GLOBALS['SentToDetails']; ?>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left" valign="top">
							&nbsp;<?php print GetLang('NewsletterStatistics_SentBy'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<a href="mailto:<?php if(isset($GLOBALS['UserEmail'])) print $GLOBALS['UserEmail']; ?>"><?php if(isset($GLOBALS['SentBy'])) print $GLOBALS['SentBy']; ?></a>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left" valign="top">
							&nbsp;<?php print GetLang('NewsletterStatistics_Opened'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<a href="<?php if(isset($GLOBALS['OpensURL'])) print $GLOBALS['OpensURL']; ?>" title="<?php print GetLang('Stats_TotalOpens_Description'); ?>"><?php if(isset($GLOBALS['TotalOpens'])) print $GLOBALS['TotalOpens']; ?></a>
							/
							<a href="<?php if(isset($GLOBALS['UniqueOpensURL'])) print $GLOBALS['UniqueOpensURL']; ?>" title="<?php print GetLang('Stats_TotalUniqueOpens_Description'); ?>"><?php if(isset($GLOBALS['UniqueOpens'])) print $GLOBALS['UniqueOpens']; ?></a>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left" valign="top">
							&nbsp;<?php print GetLang('OpenRate'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<?php if(isset($GLOBALS['OpenRate'])) print $GLOBALS['OpenRate']; ?>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left" valign="top">
							&nbsp;<?php print GetLang('Stats_Clickthrough'); ?>:
						</td>
						<td width="70%" nowrap align="left">
							<?php if(isset($GLOBALS['ClickThroughRate'])) print $GLOBALS['ClickThroughRate']; ?>
						</td>
					</tr>
					<tr class="GridRow">
						<td width="30%" height="22" nowrap align="left" valign="top">
							&nbsp;<?php print GetLang('NewsletterStatistics_Bounced'); ?>
						</td>
						<td width="70%" nowrap align="left">
							<?php if(isset($GLOBALS['TotalBounces'])) print $GLOBALS['TotalBounces']; ?>
						</td>
					</tr>
				</table>
			</td>

			<td></td>

			</tr><tr>
			<td width="55%">
				<?php if(isset($GLOBALS['SummaryChart'])) print $GLOBALS['SummaryChart']; ?>
			</td>
		</tr>
	</table>
</div>
<?php if(isset($GLOBALS['OpensPage'])) print $GLOBALS['OpensPage']; ?>
<?php if(isset($GLOBALS['LinksPage'])) print $GLOBALS['LinksPage']; ?>
<?php if(isset($GLOBALS['BouncesPage'])) print $GLOBALS['BouncesPage']; ?>
<?php if(isset($GLOBALS['UnsubscribesPage'])) print $GLOBALS['UnsubscribesPage']; ?>
<?php if(isset($GLOBALS['ForwardsPage'])) print $GLOBALS['ForwardsPage']; ?>

<script>
	function PreparePreview() {
		var openurl = "index.php?Page=Newsletters&Action=View&id=<?php if(isset($GLOBALS['NewsletterID'])) print $GLOBALS['NewsletterID']; ?>";
		window.open(openurl, "pp");
	}
</script>

		</td>
	</tr>
</table>