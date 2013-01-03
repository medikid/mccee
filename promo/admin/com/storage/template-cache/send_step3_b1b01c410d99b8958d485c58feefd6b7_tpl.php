<?php $IEM = $tpl->Get('IEM'); ?><script>
	var SendPage = {	varPrevNewsletterIdx:	0,
						varCurNewsletterIdx:	0,
						_CheckFormObservers:	[],
						toggleTrackerOptions: 	function() { $('#tracklinks_module_list')[this.getFormObject().tracklinks.checked && $('.Module_Tracker_Options').length > 0? 'show' : 'hide'](); },
						getFormObject: 			function() { return document.frmSendStep3; },
						getCampaignName:		function() {
													var o = this.getFormObject().newsletter;
													if(o.selectedIndex != 0) return '';
													else return o[o.selectedIndex].text;
												},
						addCheckFormObserver:	function($fn) { if($fn) this._CheckFormObservers.push($fn); },
						checkForm:				function() {
													for(var i = 0, j = this._CheckFormObservers.length; i < j; ++i) {
														if(this._CheckFormObservers[i]) {
															try {
																if(!this._CheckFormObservers[i]())
																	return false;
															} catch(e) { }
														}
													}

													return true;
												}};

	SendPage.addCheckFormObserver(function() {
		var form = SendPage.getFormObject();

		if (form.newsletter.selectedIndex < 1) {
			alert("<?php print GetLang('SelectNewsletterPrompt'); ?>");
			form.newsletter.focus();
			return false;
		}

		if (form.sendfromname.value == '') {
			alert("<?php print GetLang('EnterSendFromName'); ?>");
			form.sendfromname.focus();
			return false;
		}

		if (form.sendfromemail.value == '') {
			alert("<?php print GetLang('EnterSendFromEmail'); ?>");
			form.sendfromemail.focus();
			return false;
		}

		if (form.replytoemail.value == '') {
			alert("<?php print GetLang('EnterReplyToEmail'); ?>");
			form.replytoemail.focus();
			return false;
		}

		if (form.bounceemail.value == '') {
			alert("<?php print GetLang('EnterBounceEmail'); ?>");
			form.bounceemail.focus();
			return false;
		}

		return true;
	});


	$(function() {
		$(document.frmSendStep3).submit(function() { return SendPage.checkForm(); });

		$('input.CancelButton', document.frmSendStep3).click(function() {
			if(confirm("<?php print GetLang('Send_CancelPrompt'); ?>")) document.location="index.php?Page=Newsletters";
		});

		$('#hrefPreview').click(function() {
			var baseurl = "index.php?Page=Newsletters&Action=Preview&id=";
			if (document.frmSendStep3.newsletter.selectedIndex < 0) {
				alert("<?php print GetLang('SelectNewsletterPrompt'); ?>");
				document.frmSendStep3.newsletter.focus();
				return false;
			}
			if (document.frmSendStep3.newsletter.length > 1) {
				if (document.frmSendStep3.newsletter.selectedIndex == 0) {
					alert("<?php print GetLang('SelectNewsletterPreviewPrompt'); ?>");
					document.frmSendStep3.newsletter.focus();
					return false;
				}
			}
			var realId = document.frmSendStep3.newsletter[document.frmSendStep3.newsletter.selectedIndex].value;
			window.open(baseurl + realId , "pp");
			return false;
		});

		$(document.frmSendStep3.newsletter).change(function() {
			if(this.selectedIndex == 0) return;
			SendPage.varPrevNewsletterIdx = SendPage.varCurNewsletterIdx;
			SendPage.varCurNewsletterIdx = this.selectedIndex;
		});

		$(document.frmSendStep3.tracklinks).click(function() { SendPage.toggleTrackerOptions(); });



		SendPage.toggleTrackerOptions();
	});

	function ShowSendTime(chkbox) {
		if (chkbox.checked) {
			document.getElementById('show_senddate').style.display='none';
		} else {
			document.getElementById('show_senddate').style.display='';
		}
	}
</script>
<form name="frmSendStep3" method="post" action="index.php?Page=Send&Action=Step4">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('Send_Step3'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Send_Step3_Intro'); ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
				<?php if(isset($GLOBALS['NoCronMessage'])) print $GLOBALS['NoCronMessage']; ?>
			</td>
		</tr>
		<tr>
			<td>
				<input class="FormButton" type="submit" value="<?php print GetLang('Next'); ?>" />
				<input class="FormButton CancelButton" type="button" value="<?php print GetLang('Cancel'); ?>" />
				<input type="hidden" name="sendcharset" value="<?php if(isset($GLOBALS['SendCharset'])) print $GLOBALS['SendCharset']; ?>" />
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('WhichCampaignToSend'); ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?><?php print GetLang('WhichEmailToSend'); ?>&nbsp;
						</td>
						<td>
							<select name="newsletter" style="margin-top:4px">
								<?php if(isset($GLOBALS['NewsletterList'])) print $GLOBALS['NewsletterList']; ?>
							</select>&nbsp;
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendNewsletter')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendNewsletter')); ?></span></span><a id="hrefPreview" href="#"><img src="images/magnify.gif" border="0">&nbsp;&nbsp;<?php print GetLang('Preview'); ?></a>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SendFromName'); ?>&nbsp;
						</td>
						<td>
							<input type="text" name="sendfromname" value="<?php if(isset($GLOBALS['SendFromName'])) print $GLOBALS['SendFromName']; ?>" class="Field250"><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendFromName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendFromName')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SendFromEmail'); ?>:&nbsp;
						</td>
						<td>
							<input type="text" name="sendfromemail" value="<?php if(isset($GLOBALS['SendFromEmail'])) print $GLOBALS['SendFromEmail']; ?>" class="Field250"><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendFromEmail')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendFromEmail')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ReplyToEmail'); ?>:&nbsp;
						</td>
						<td>
							<input type="text" name="replytoemail" value="<?php if(isset($GLOBALS['ReplyToEmail'])) print $GLOBALS['ReplyToEmail']; ?>" class="Field250"><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('ReplyToEmail')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_ReplyToEmail')); ?></span></span>
						</td>
					</tr>
					<tr style="display: <?php if(isset($GLOBALS['ShowBounceInfo'])) print $GLOBALS['ShowBounceInfo']; ?>">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('BounceEmail'); ?>:&nbsp;
						</td>
						<td>
							<input type="text" name="bounceemail" value="<?php if(isset($GLOBALS['BounceEmail'])) print $GLOBALS['BounceEmail']; ?>" class="Field250"><span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('BounceEmail')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_BounceEmail')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td class="EmptyRow" colspan="2"></td>
					</tr>
					<?php if(isset($GLOBALS['CronOptions'])) print $GLOBALS['CronOptions']; ?>
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('AdvancedSendingOptions'); ?>
						</td>
					</tr>
					<tr style="display: <?php if(isset($GLOBALS['DisplayNameOptions'])) print $GLOBALS['DisplayNameOptions']; ?>">
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SendTo_FirstName'); ?>:
						</td>
						<td>
							<select name="to_firstname">
								<option value="0"><?php print GetLang('SelectFirstNameOption'); ?></option>
								<?php if(isset($GLOBALS['NameOptions'])) print $GLOBALS['NameOptions']; ?>
							</select>&nbsp;&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendTo_FirstName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendTo_FirstName')); ?></span></span>
						</td>
					</tr>
					<tr style="display: <?php if(isset($GLOBALS['DisplayNameOptions'])) print $GLOBALS['DisplayNameOptions']; ?>">
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SendTo_LastName'); ?>:
						</td>
						<td>
							<select name="to_lastname">
								<option value="0"><?php print GetLang('SelectLastNameOption'); ?></option>
								<?php if(isset($GLOBALS['NameOptions'])) print $GLOBALS['NameOptions']; ?>
							</select>&nbsp;&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendTo_LastName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendTo_LastName')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('SendMultipart'); ?>&nbsp;
						</td>
						<td>
							<label for="sendmultipart"><input type="checkbox" name="sendmultipart" id="sendmultipart" value="1" CHECKED>&nbsp;<?php print GetLang('SendMultipartExplain'); ?></label>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendMultipart')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendMultipart')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('TrackOpens'); ?>&nbsp;
						</td>
						<td>
							<div>
								<label for="trackopens"><input type="checkbox" name="trackopens" id="trackopens" value="1" CHECKED>
									<?php print GetLang('TrackOpensExplain'); ?>
								</label>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TrackOpens')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TrackOpens')); ?></span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('TrackLinks'); ?>&nbsp;
						</td>
						<td>
							<div>
								<label for="tracklinks">
									<input type="checkbox" name="tracklinks" id="tracklinks" value="1" CHECKED>&nbsp;<?php print GetLang('TrackLinksExplain'); ?>
								</label>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('TrackLinks')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_TrackLinks')); ?></span></span>
							</div>
							<div id="tracklinks_module_list">
								<div style="float: left;"><img width="20" height="20" src="images/nodejoin.gif"/></div>
								<div style="float: left;"><?php if(isset($GLOBALS['TrackerOptions'])) print $GLOBALS['TrackerOptions']; ?></div>
							</div>
						</td>
					</tr>
					<tr style="display: <?php if(isset($GLOBALS['DisplayEmbedImages'])) print $GLOBALS['DisplayEmbedImages']; ?>">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('EmbedImages'); ?>&nbsp;
						</td>
						<td>
							<div>
								<label for="embedimages">
									<input type="checkbox" name="embedimages" id="embedimages" value="1"<?php if(isset($GLOBALS['EmbedImages'])) print $GLOBALS['EmbedImages']; ?>>&nbsp;<?php print GetLang('EmbedImagesExplain'); ?>
								</label>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('EmbedImages')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_EmbedImages')); ?></span></span>
							</div>
						</td>
					</tr>
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel"></td>
						<td>
							<input class="FormButton" type="submit" value="<?php print GetLang('Next'); ?>" />
							<input class="FormButton CancelButton" type="button" value="<?php print GetLang('Cancel'); ?>" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
