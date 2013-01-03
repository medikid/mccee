<?php $IEM = $tpl->Get('IEM'); ?><link rel="stylesheet" href="includes/styles/ui.datepicker.css" type="text/css">
<link rel="stylesheet" href="includes/styles/timepicker.css" type="text/css">
<script src="includes/js/jquery/ui.js"></script>
<script>
var SegmentID = '<?php if(isset($GLOBALS['SegmentID'])) print $GLOBALS['SegmentID']; ?>';
// Show the loading indicator
$(document).ajaxSend(function() {
	$('#loading_indicator').css('display','block');
});
$(document).ajaxStop(function() {
	$('#loading_indicator').css('display','none');
});
</script>
<script src="includes/js/jquery/timepicker.js"></script>
<script src="includes/js/jquery/form.js"></script>
<script><?php if(isset($GLOBALS['DatePickerJavascript'])) print $GLOBALS['DatePickerJavascript']; ?></script>
<div id="eventAddFormDiv" style="display:none;">
<?php if(isset($GLOBALS['EventAddForm'])) print $GLOBALS['EventAddForm']; ?>
</div>

<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("google_calendar_form");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>

	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('Subscribers_View'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Subscribers_View_Intro'); ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
			</td>
		</tr>
		<tr>
			<td>
			<?php if(isset($GLOBALS['EditButton'])) print $GLOBALS['EditButton']; ?>
			<?php if(isset($GLOBALS['DeleteButton'])) print $GLOBALS['DeleteButton']; ?>
			<input class="FormButton" type="button" value="<?php print GetLang('Done'); ?>" onClick='document.location="index.php?Page=Subscribers&Action=Manage&SubAction=Step3"'>
			<br />&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="4" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('EditSubscriberDetails'); ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Email'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['emailaddress'])) print $GLOBALS['emailaddress']; ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Format'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['FormatList'])) print $GLOBALS['FormatList']; ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ConfirmedStatus'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['ConfirmedList'])) print $GLOBALS['ConfirmedList']; ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SubscriberStatus'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['StatusList'])) print $GLOBALS['StatusList']; ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SubscribeRequestDate'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['requestdate'])) print $GLOBALS['requestdate']; ?>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SubscribeRequestDate')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SubscribeRequestDate')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SubscribeRequestIP'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['requestip'])) print $GLOBALS['requestip']; ?>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SubscribeRequestIP')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SubscribeRequestIP')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SubscribeConfirmDate'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['confirmdate'])) print $GLOBALS['confirmdate']; ?>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SubscribeConfirmDate')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SubscribeConfirmDate')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SubscribeConfirmIP'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['confirmip'])) print $GLOBALS['confirmip']; ?>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SubscribeConfirmIP')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SubscribeConfirmIP')); ?></span></span>
						</td>
					</tr>
					<tr style='display: <?php if(isset($GLOBALS['ShowUnsubscribeInfo'])) print $GLOBALS['ShowUnsubscribeInfo']; ?>'>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('UnsubscribeTime'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['unsubscribetime'])) print $GLOBALS['unsubscribetime']; ?>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UnsubscribeTime')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UnsubscribeTime')); ?></span></span>
						</td>
					</tr>
					<tr style='display: <?php if(isset($GLOBALS['ShowUnsubscribeInfo'])) print $GLOBALS['ShowUnsubscribeInfo']; ?>'>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('UnsubscribeIP'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['unsubscribeip'])) print $GLOBALS['unsubscribeip']; ?>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UnsubscribeIP')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UnsubscribeIP')); ?></span></span>
						</td>
					</tr>
					<?php if(isset($GLOBALS['CustomFieldInfo'])) print $GLOBALS['CustomFieldInfo']; ?>
				</table>
			</td>
		</tr>
	</table>
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('SubscriberEvents'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php if(isset($GLOBALS['SubscriberEvents_Intro'])) print $GLOBALS['SubscriberEvents_Intro']; ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
					<div id="eventsTable">
					</div>
			</td>
		</tr>
	</table>

<script>
<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("subscribers_events_table_javascript");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
</script>