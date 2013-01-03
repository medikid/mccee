<?php $IEM = $tpl->Get('IEM'); ?><script>
	var PAGE = {
		init:						function() {
			$(document.frmSend).submit(function(event) {
				event.preventDefault();
				event.stopPropagation();
			});

			if(document.frmSend['segments[]'].options.length == 0)
				$('#ShowSegmentOptions').attr('disabled', true);

			$('.CancelButton').click(function() { PAGE.cancel(); });

			$('.SubmitButton').click(function() { PAGE.submit(); });

			$('#segments, #lists').dblclick(function() { PAGE.submit(); });

			$('.SendFilteringOption').click(function() { PAGE.selectSendingOption(this.value); });
		},
		submit:					function() {
			if($('#ShowSegmentOptions').get(0).checked) {
				var elm = $('.SelectedSegments').get(0);
				if(elm.selectedIndex == -1) alert("<?php print GetLang('SelectSegment'); ?>");
				else document.frmSend.submit();
			} else {
				var elm = $('.SelectedLists').get(0);
				if(elm.selectedIndex == -1) alert("<?php print GetLang('SelectList'); ?>");
				else document.frmSend.submit();
			}
		},
		cancel:					function() {
			if(confirm("<?php print GetLang('Send_CancelPrompt'); ?>"))
				document.location="index.php?Page=Newsletters";
		},
		selectSendingOption:	function(sendingOption) {
			if(sendingOption == 3) this.showSegment();
			else this.showMailingList();
		},
		showSegment:			function(transition) {
			$('#FilteringOptions').hide();
			$('#SegmentOptions').show();
		},
		showMailingList:		function(transition) {
			$('#SegmentOptions').hide(transition? 'slow' : '');
			$('#FilteringOptions').show(transition? 'slow' : '');
		}
	};

	$(function() { PAGE.init(); });
</script>
<form name="frmSend" method="post" action="index.php?Page=Send&Action=Step2">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('Send_Step1'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Send_Step1_Intro'); ?>
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
				<input class="FormButton SubmitButton" type="button" value="<?php print GetLang('Next'); ?>" />
				<input class="FormButton CancelButton" type="button" value="<?php print GetLang('Cancel'); ?>" />
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('FilterOptions_Send'); ?>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ShowFilteringOptions_Send'); ?>&nbsp;
						</td>
						<td valign="top">
							<table width="100%" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<label class="SendFilteringOption_Label" for="DoNotShowFilteringOptions"><input type="radio" name="ShowFilteringOptions" id="DoNotShowFilteringOptions" class="SendFilteringOption" value="2" checked="checked" /><?php print GetLang('SendDoNotShowFilteringOptionsExplain'); ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="SendFilteringOption_Label" for="ShowFilteringOptions"><input type="radio" name="ShowFilteringOptions" id="ShowFilteringOptions" class="SendFilteringOption" value="1" /><?php print GetLang('SendShowFilteringOptionsExplain'); ?></label>
									</td>
								</tr>
								<tr style="display:<?php if(isset($GLOBALS['DisplaySegmentOption'])) print $GLOBALS['DisplaySegmentOption']; ?>;">
									<td>
										<label class="SendFilteringOption_Label" for="ShowSegmentOptions"><input type="radio" name="ShowFilteringOptions" id="ShowSegmentOptions" class="SendFilteringOption" value="3" /><?php print GetLang('SendShowSegmentOptionsExplain'); ?></label>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div id="FilteringOptions" <?php if(isset($GLOBALS['FilteringOptions_Display'])) print $GLOBALS['FilteringOptions_Display']; ?>>
					<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
						<tr>
							<td colspan="2" class="Heading2">
								&nbsp;&nbsp;<?php print GetLang('MailingListDetails'); ?>
							</td>
						</tr>
						<tr>
							<td width="200" class="FieldLabel">
								<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
								<?php print GetLang('SendMailingList'); ?>:&nbsp;
							</td>
							<td>
								<select id="lists" name="lists[]" multiple="multiple" class="SelectedLists ISSelectReplacement ISSelectSearch">
									<?php if(isset($GLOBALS['SelectList'])) print $GLOBALS['SelectList']; ?>
								</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendMailingList')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendMailingList')); ?></span></span>
							</td>
						</tr>
					</table>
				</div>
				<div id="SegmentOptions" style="display:none;">
					<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
						<tr>
							<td colspan="2" class="Heading2">
								&nbsp;&nbsp;<?php print GetLang('SegmentDetails'); ?>
							</td>
						</tr>
						<tr>
							<td width="200" class="FieldLabel">
								<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
								<?php print GetLang('SendToSegment'); ?>:&nbsp;
							</td>
							<td>
								<select id="segments" name="segments[]" multiple="multiple" class="SelectedSegments ISSelectReplacement">
									<?php if(isset($GLOBALS['SelectSegment'])) print $GLOBALS['SelectSegment']; ?>
								</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('SendToSegment')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_SendToSegment')); ?></span></span>
							</td>
						</tr>
					</table>
				</div>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel"></td>
						<td>
							<input class="FormButton SubmitButton" type="button" value="<?php print GetLang('Next'); ?>" />
							<input class="FormButton CancelButton" type="button" value="<?php print GetLang('Cancel'); ?>" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
