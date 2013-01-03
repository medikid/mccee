<?php $IEM = $tpl->Get('IEM'); ?><style type="text/css">@import url(includes/styles/ui.datepicker.css);</style>
<script src="includes/js/jquery/ui.js"></script>
<script>
	<?php if(isset($GLOBALS['CustomDatepickerUI'])) print $GLOBALS['CustomDatepickerUI']; ?>
</script>
<script>
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

	$(function() {
		$(document.frmSubscriberEditor).submit(function(event) {
			if(!CheckForm()) {
				event.preventDefault();
				event.stopPropagation();
			}
		});

		$('.CancelButton').click(function() {
			if(confirm("<?php print GetLang('Subscribers_Add_CancelPrompt'); ?>"))
				document.location="index.php?Page=Subscribers&Action=Manage&SubAction=Step3";
		});

		$('.SaveAddButton').click(function() {
			if (CheckForm()) {
				$(document.frmSubscriberEditor).attr('action', 'index.php?Page=Subscribers&Action=Add&SubAction=SaveAdd&list=<?php if(isset($GLOBALS['list'])) print $GLOBALS['list']; ?>');
				document.frmSubscriberEditor.submit();
			}
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
<form name="frmSubscriberEditor" method="post" action="index.php?Page=Subscribers&Action=Add&SubAction=Save&list=<?php if(isset($GLOBALS['list'])) print $GLOBALS['list']; ?>">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php if(isset($GLOBALS['Heading'])) print $GLOBALS['Heading']; ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Subscribers_Add_Step2_Intro'); ?>
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
				<input class="FormButton SaveAddButton" type="button" value="<?php print GetLang('Save'); ?>"/>
				<?php if(isset($GLOBALS['SaveExitButton'])) print $GLOBALS['SaveExitButton']; ?>
				<input class="FormButton CancelButton" type="button" value="<?php print GetLang('Cancel'); ?>"/>
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="4" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('NewSubscriberDetails'); ?>
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
					<?php if(isset($GLOBALS['CustomFieldInfo'])) print $GLOBALS['CustomFieldInfo']; ?>
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel">&nbsp;</td>
						<td valign="top" height="30">
							<input class="FormButton SaveAddButton" type="button" value="<?php print GetLang('Save'); ?>"/>
							<?php if(isset($GLOBALS['SaveExitButton'])) print $GLOBALS['SaveExitButton']; ?>
							<input class="FormButton CancelButton" type="button" value="<?php print GetLang('Cancel'); ?>"/>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
