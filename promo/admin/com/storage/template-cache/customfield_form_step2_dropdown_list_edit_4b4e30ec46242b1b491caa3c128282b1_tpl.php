<?php $IEM = $tpl->Get('IEM'); ?><?php ob_start(); ?><?php if(isset($GLOBALS['Key'])) print $GLOBALS['Key']; ?><?php $tpl->Assign("row_key", trim(ob_get_contents())); ob_end_clean(); ?>
<tr>
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php if($tpl->Get('row_key') == ''): ?><b><?php endif; ?><?php echo GetLang('DropDown'); ?> <?php if(isset($GLOBALS['KeyNumber'])) print $GLOBALS['KeyNumber']; ?> <?php echo GetLang('Value'); ?>:<?php if($tpl->Get('row_key') == ''): ?></b><?php endif; ?>&nbsp;
	</td>
	<td class="PickListValues">
		<input type="text" name="Value[<?php if(isset($GLOBALS['KeyNumber'])) print $GLOBALS['KeyNumber']; ?>]" class="Field250" value="<?php if(isset($GLOBALS['Value'])) print $GLOBALS['Value']; ?>" id="value_<?php if(isset($GLOBALS['KeyNumber'])) print $GLOBALS['KeyNumber']; ?>">&nbsp;<?php echo $tpl->Get(';nghlp','Checkbox_Value'); ?>
		<input type="hidden" name="Key[<?php if(isset($GLOBALS['KeyNumber'])) print $GLOBALS['KeyNumber']; ?>]" value="<?php if(isset($GLOBALS['Key'])) print $GLOBALS['Key']; ?>" id="key_<?php if(isset($GLOBALS['KeyNumber'])) print $GLOBALS['KeyNumber']; ?>">
		<?php if($tpl->Get('row_key') != ''): ?><br /><?php echo GetLang('Checkbox_Key'); ?>:&nbsp;"<?php if(isset($GLOBALS['Key'])) print $GLOBALS['Key']; ?>"&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Checkbox_Key')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Checkbox_Key')); ?></span></span><?php endif; ?>
	</td>
</tr>
