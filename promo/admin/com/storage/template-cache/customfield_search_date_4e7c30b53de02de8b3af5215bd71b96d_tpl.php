<?php $IEM = $tpl->Get('IEM'); ?>	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?><?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>:&nbsp;
		</td>
		<td>
			<label for="CustomFields[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>][filter]"><input type="checkbox" name="CustomFields[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>][filter]" id="CustomFields[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>][filter]" value="1"<?php if(isset($GLOBALS['FilterChecked'])) print $GLOBALS['FilterChecked']; ?> onClick="javascript: enableDate_SubscribeDate(this, '<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>')">&nbsp;<?php if(isset($GLOBALS['FilterDescription'])) print $GLOBALS['FilterDescription']; ?></label>&nbsp;&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Filter_Date')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Filter_Date')); ?></span></span><br/>
			<div id="<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>" style="display: <?php if(isset($GLOBALS['Style_FieldDisplayOne'])) print $GLOBALS['Style_FieldDisplayOne']; ?>">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td valign="middle">
							<img src="images/nodejoin.gif" width="20" height="20" border="0">
						</td>
						<td>
							<select class="datefield" name="CustomFields[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>][type]" onChange="javascript: ChangeFilterOptionsSubscribeDate(this, '<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>');">
								<?php if(isset($GLOBALS['FilterDateOptions'])) print $GLOBALS['FilterDateOptions']; ?>
							</select>
						</td>
						<td valign="top">
							<?php if(isset($GLOBALS['Display_date1_Field1'])) print $GLOBALS['Display_date1_Field1']; ?>
							<?php if(isset($GLOBALS['Display_date1_Field2'])) print $GLOBALS['Display_date1_Field2']; ?>
							<?php if(isset($GLOBALS['Display_date1_Field3'])) print $GLOBALS['Display_date1_Field3']; ?>
						</td>
					</tr>
					<tr style="display: <?php if(isset($GLOBALS['Style_FieldDisplayTwo'])) print $GLOBALS['Style_FieldDisplayTwo']; ?>" id="<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>date2">
						<td colspan="2" align="right" valign="middle">
							<img src="images/nodejoin.gif" width="20" height="20" border="0">&nbsp;<?php print GetLang('AND'); ?>&nbsp;
						</td>
						<td valign="top">
							<?php if(isset($GLOBALS['Display_date2_Field1'])) print $GLOBALS['Display_date2_Field1']; ?>
							<?php if(isset($GLOBALS['Display_date2_Field2'])) print $GLOBALS['Display_date2_Field2']; ?>
							<?php if(isset($GLOBALS['Display_date2_Field3'])) print $GLOBALS['Display_date2_Field3']; ?>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
