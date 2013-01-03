<?php $IEM = $tpl->Get('IEM'); ?><form method="post" action="index.php?Page=Send&Action=Step3">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php print GetLang('Send_Step2'); ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php print GetLang('Send_Subscribers_Search_Step2'); ?>
				</p>
			</td>
		</tr>
		<tr>
			<td><?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?></td>
		</tr>
		<tr>
			<td>
				<div style="padding-bottom: 10px;">
					<input class="FormButton" type="submit" value="<?php print GetLang('Next'); ?>">
					<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if(confirm("<?php print GetLang('Send_CancelPrompt'); ?>")) { document.location="index.php?Page=Newsletters" }'>
				</div>
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel" id="FilteringOptions">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('FilterSearch'); ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Email'); ?>:&nbsp;
						</td>
						<td>
							<input type="text" name="emailaddress" value="" class="Field250">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('FilterEmailAddress')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_FilterEmailAddress')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Format'); ?>:&nbsp;
						</td>
						<td>
							<select name="format" class="Field250">
								<?php if(isset($GLOBALS['FormatList'])) print $GLOBALS['FormatList']; ?>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('FilterFormat')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_FilterFormat')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('ConfirmedStatus'); ?>:&nbsp;
						</td>
						<td>
							<select name="confirmed" class="Field250">
								<option value="-1"><?php print GetLang('Either_Confirmed'); ?></option>
								<option value="1" SELECTED><?php print GetLang('Confirmed'); ?></option>
								<option value="0"><?php print GetLang('Unconfirmed'); ?></option>
							</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('FilterConfirmedStatus')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_FilterConfirmedStatus')); ?></span></span>
						</td>
					</tr>
					<tr style="display: none;">
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('Status'); ?>:&nbsp;
						</td>
						<td>
							<select name="status" class="Field250">
								<option value="a" SELECTED><?php print GetLang('Active'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('FilterByDate'); ?>:&nbsp;
						</td>
						<td>
							<label for="datesearch[filter]"><input type="checkbox" name="datesearch[filter]" id="datesearch[filter]" value="1"<?php if(isset($GLOBALS['FilterChecked'])) print $GLOBALS['FilterChecked']; ?> onClick="javascript: enableDate_SubscribeDate(this, 'datesearch')">&nbsp;<?php print GetLang('YesFilterByDate'); ?></label>
							&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Send_FilterByDate')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Send_FilterByDate')); ?></span></span>
							<br/>
							<div id="datesearch" style="display: none">
								<table border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td valign="middle">
											<img src="images/nodejoin.gif" width="20" height="20" border="0">
										</td>
										<td>
											<select class="datefield" name="datesearch[type]" onChange="javascript: ChangeFilterOptionsSubscribeDate(this, 'datesearch');">
												<option value="after"><?php print GetLang('After'); ?></option>
												<option value="before"><?php print GetLang('Before'); ?></option>
												<option value="exactly"><?php print GetLang('Exactly'); ?></option>
												<option value="between"><?php print GetLang('Between'); ?></option>
											</select>
										</td>
										<td valign="top">
											<?php if(isset($GLOBALS['Display_subdate_date1_Field1'])) print $GLOBALS['Display_subdate_date1_Field1']; ?>
											<?php if(isset($GLOBALS['Display_subdate_date1_Field2'])) print $GLOBALS['Display_subdate_date1_Field2']; ?>
											<?php if(isset($GLOBALS['Display_subdate_date1_Field3'])) print $GLOBALS['Display_subdate_date1_Field3']; ?>
										</td>
									</tr>
									<tr style="display: none" id="datesearchdate2">
										<td colspan="2" align="right" valign="middle">
											<img src="images/nodejoin.gif" width="20" height="20" border="0">&nbsp;<?php print GetLang('AND'); ?>&nbsp;
										</td>
										<td valign="top">
											<?php if(isset($GLOBALS['Display_subdate_date2_Field1'])) print $GLOBALS['Display_subdate_date2_Field1']; ?>
											<?php if(isset($GLOBALS['Display_subdate_date2_Field2'])) print $GLOBALS['Display_subdate_date2_Field2']; ?>
											<?php if(isset($GLOBALS['Display_subdate_date2_Field3'])) print $GLOBALS['Display_subdate_date2_Field3']; ?>
										</td>
									</tr>
								</table>
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
							<?php print GetLang('ClickedOnLink'); ?>:
						</td>
						<td>
							<label for="clickedlink"><input type="checkbox" name="clickedlink" id="clickedlink" value="1" onClick="javascript: enable_ClickedLink(this, 'clicklink', 'linkid', '<?php print GetLang('LoadingMessage'); ?>')">&nbsp;<?php print GetLang('YesFilterByLink'); ?></label>
							&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Send_ClickedOnLink')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Send_ClickedOnLink')); ?></span></span>
							<br/>
							<?php if(isset($GLOBALS['ClickedLinkOptions'])) print $GLOBALS['ClickedLinkOptions']; ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('OpenedNewsletter'); ?>:
						</td>
						<td>
							<label for="openednewsletter"><input type="checkbox" name="openednewsletter" id="openednewsletter" value="1" onClick="javascript: enable_OpenedNewsletter(this, 'opennews', 'newsletterid', '<?php print GetLang('LoadingMessage'); ?>')">&nbsp;<?php print GetLang('YesFilterByOpenedNewsletter'); ?></label>
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Send_OpenedNewsletter')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Send_OpenedNewsletter')); ?></span></span>
							<br/>
							<?php if(isset($GLOBALS['OpenedNewsletterOptions'])) print $GLOBALS['OpenedNewsletterOptions']; ?>
						</td>
					</tr>
					<?php if(isset($GLOBALS['CustomFieldInfo'])) print $GLOBALS['CustomFieldInfo']; ?>
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel"></td>
						<td>
							<input class="FormButton" type="submit" value="<?php print GetLang('Next'); ?>">
							<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if (confirm("<?php print GetLang('Send_CancelPrompt'); ?>")) { document.location="index.php?Page=Newsletters" }' />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>

