<?php $IEM = $tpl->Get('IEM'); ?><link rel="stylesheet" href="includes/styles/ui.datepicker.css" type="text/css">
<link rel="stylesheet" href="includes/styles/timepicker.css" type="text/css">
<script src="includes/js/jquery/ui.js"></script>

<script>
	<?php if(isset($GLOBALS['CustomDatepickerUI'])) print $GLOBALS['CustomDatepickerUI']; ?>
</script>
<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("google_calendar_form");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
<script>
	var SegmentID = '<?php if(isset($GLOBALS['SegmentID'])) print $GLOBALS['SegmentID']; ?>';
	function CheckForm() {
		var f = document.frmSubscriberEditor;

		if (f.emailaddress.value == "") {
			alert("<?php print GetLang('Subscribers_EnterEmailAddress'); ?>");
			f.emailaddress.focus();
			return false;
		}

		<?php if(isset($GLOBALS['ExtraJavascript'])) print $GLOBALS['ExtraJavascript']; ?>
		return true;
	}

	function Save() {
		if (CheckForm()) {
			var segment = (SegmentID == ''? '' : '&SegmentID=' + SegmentID);
			$(document.frmSubscriberEditor).attr('action', 'index.php?Page=Subscribers&Action=Edit&SubAction=Save&List=<?php if(isset($GLOBALS['list'])) print $GLOBALS['list']; ?>' + segment + '&save');
			document.frmSubscriberEditor.submit();
		}
	}

	// Show the loading indicator
	$(document).ajaxSend(function() {
		$('#loading_indicator').css('display','block');
	});
	$(document).ajaxStop(function() {
		$('#loading_indicator').css('display','none');
	});

	$(function() {
		$(document.frmSubscriberEditor).submit(function(event) {
			if (this.emailaddress.value == "") {
				event.preventDefault();
				event.stopPropagation();

				alert("<?php print GetLang('Subscribers_EnterEmailAddress'); ?>");
				this.emailaddress.focus();
				return false;
			}

			var f = this;
			<?php if(isset($GLOBALS['ExtraJavascript'])) print $GLOBALS['ExtraJavascript']; ?>
			return true;
		});

		$('.CancelButton').click(function() {
			if (confirm("<?php print GetLang('Subscribers_Edit_CancelPrompt'); ?>"))
				document.location="index.php?Page=Subscribers&Action=Manage&SubAction=Step3";
		});

		$('.CustomFieldDateInput_Row').each(function() {
			var anchor = $('.CustomFieldDateInput_DatepickerAnchor', this).get(0);
			var year = $('.CustomField_Date_Year', this).get(0);
			var minYear = year.options[1].value;
			var maxYear = year.options[year.options.length - 1].value;

			$(anchor).datepicker({
				yearRange: minYear + ':' + maxYear,
				beforeShow: function() {
					var id = this.id.match(/CustomFiledDateInput_Anchor_(\d*)/);
					if(id.length != 2) return;

					var day = $('#CustomFieldDateInput_' + id[1] + ' .CustomField_Date_Day').get(0);
					var month = $('#CustomFieldDateInput_' + id[1] + ' .CustomField_Date_Month').get(0);
					var year = $('#CustomFieldDateInput_' + id[1] + ' .CustomField_Date_Year').get(0);

					if(!day || !month || !year) return;
					$(this).val($(day).val() + '/' + $(month).val() + '/' + $(year).val());
				},
				onSelect: function(date) {
					var id = this.id.match(/CustomFiledDateInput_Anchor_(\d*)/);
					if(id.length != 2) return;

					var day = $('#CustomFieldDateInput_' + id[1] + ' .CustomField_Date_Day').get(0);
					var month = $('#CustomFieldDateInput_' + id[1] + ' .CustomField_Date_Month').get(0);
					var year = $('#CustomFieldDateInput_' + id[1] + ' .CustomField_Date_Year').get(0);

					if(!day || !month || !year) return;

					var temp = date.match(/(\d{2})\/(\d{2})\/(\d{4})/);
					if(!temp || temp.length != 4) temp = ['', '', '', ''];
					$(day).val(temp[1]);
					$(month).val(temp[2]);
					$(year).val(temp[3]);
				}
			});
		});
	});
</script>

<link rel="stylesheet" href="includes/styles/timepicker.css" type="text/css">
<script>

</script>
<script src="includes/js/jquery/timepicker.js"></script>
<script src="includes/js/jquery/form.js"></script>
<div id="eventAddFormDiv" style="display:none;">
<?php if(isset($GLOBALS['EventAddForm'])) print $GLOBALS['EventAddForm']; ?>
</div>

<form name="frmSubscriberEditor" method="post" action="index.php?Page=Subscribers&Action=Edit&SubAction=Save&List=<?php if(isset($GLOBALS['list'])) print $GLOBALS['list']; ?>">
<input type="hidden" name="subscriberid" value="<?php if(isset($GLOBALS['subscriberid'])) print $GLOBALS['subscriberid']; ?>"/>
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('Subscribers_Edit'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Subscribers_Edit_Intro'); ?>
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
				<input class="FormButton" type="button" value="<?php print GetLang('SaveAndKeepEditing'); ?>" style="width:130px" onclick='Save();'>
				<input class="FormButton_wide" type="submit" value="<?php print GetLang('SaveAndExit'); ?>">
				<input class="FormButton CancelButton" type="button" value="<?php print GetLang('Cancel'); ?>"/>
				<br />
				&nbsp;
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
							<input type="text" name="emailaddress" value="<?php if(isset($GLOBALS['emailaddress'])) print $GLOBALS['emailaddress']; ?>" class="Field250">
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
							<select name="format" class="Field250">
								<?php if(isset($GLOBALS['FormatList'])) print $GLOBALS['FormatList']; ?>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Format')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Format')); ?></span></span>
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
							<select name="confirmed" class="Field250">
								<?php if(isset($GLOBALS['ConfirmedList'])) print $GLOBALS['ConfirmedList']; ?>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ConfirmedStatus')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ConfirmedStatus')); ?></span></span>
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
							<select name="status" class="Field250">
								<?php if(isset($GLOBALS['StatusList'])) print $GLOBALS['StatusList']; ?>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SubscriberStatus')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SubscriberStatus')); ?></span></span>
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
</form>
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
