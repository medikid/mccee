<?php $IEM = $tpl->Get('IEM'); ?><tr>
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php print GetLang('DefaultValue'); ?>:&nbsp;
	</td>
	<td>
		<input type="text" name="DefaultValue" class="Field50" value="<?php if(isset($GLOBALS['DefaultValue'])) print $GLOBALS['DefaultValue']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('DefaultValue')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_DefaultValue')); ?></span></span>
	</td>
</tr>
<tr>
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php print GetLang('FieldLength'); ?>:&nbsp;
	</td>
	<td>
		<input type="text" name="FieldLength" class="Field50" value="<?php if(isset($GLOBALS['FieldLength'])) print $GLOBALS['FieldLength']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('FieldLength')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_FieldLength')); ?></span></span>
	</td>
</tr>
<tr>
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php print GetLang('MaxLength'); ?>:&nbsp;
	</td>
	<td>
		<input type="text" name="MaxLength" class="Field50" value="<?php if(isset($GLOBALS['MaxLength'])) print $GLOBALS['MaxLength']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('MaxLength')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_MaxLength')); ?></span></span>
	</td>
</tr>
<tr>
	<td width="200" class="FieldLabel">
		<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
		<?php print GetLang('MinLength'); ?>:&nbsp;
	</td>
	<td>
		<input type="text" name="MinLength" class="Field50" value="<?php if(isset($GLOBALS['MinLength'])) print $GLOBALS['MinLength']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('MinLength')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_MinLength')); ?></span></span>
	</td>
</tr>
