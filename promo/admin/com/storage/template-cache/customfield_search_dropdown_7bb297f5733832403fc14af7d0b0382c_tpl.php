<?php $IEM = $tpl->Get('IEM'); ?>	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?><?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>:&nbsp;
		</td>
		<td>
			<select name="CustomFields[<?php if(isset($GLOBALS['FieldID'])) print $GLOBALS['FieldID']; ?>][]" class="Field250" multiple="multiple" class="ISSelectReplacement">
				<?php if(isset($GLOBALS['OptionList'])) print $GLOBALS['OptionList']; ?>
			</select>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Filter_Dropdown')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Filter_Dropdown')); ?></span></span>
		</td>
	</tr>