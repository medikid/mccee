<?php $IEM = $tpl->Get('IEM'); ?>	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?><?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>:&nbsp;
		</td>
		<td>
			<input type="text" name="CustomFields[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>]" value="<?php if(isset($GLOBALS['FieldValue'])) print $GLOBALS['FieldValue']; ?>" class="Field250">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Filter_Number')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Filter_Number')); ?></span></span>
		</td>
	</tr>
