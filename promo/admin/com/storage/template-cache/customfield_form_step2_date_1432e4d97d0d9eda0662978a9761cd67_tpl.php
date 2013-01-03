<?php $IEM = $tpl->Get('IEM'); ?>	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
			<?php print GetLang('DefaultValue'); ?>:&nbsp;
		</td>
		<td>
			<input type="text" name="DefaultValue" class="Field250" value="<?php if(isset($GLOBALS['DefaultValue'])) print $GLOBALS['DefaultValue']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('DefaultValue')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_DefaultValue')); ?></span></span>
		</td>
	</tr>
	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
			<?php print GetLang('DateDisplayOrderFirst'); ?>:&nbsp;
		</td>
		<td>
			<input type="text" name="Key[0]" class="Field250" value="<?php if(isset($GLOBALS['Display0'])) print $GLOBALS['Display0']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('DateDisplayOrder')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_DateDisplayOrder')); ?></span></span>
		</td>
	</tr>
	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
			<?php print GetLang('DateDisplayOrderSecond'); ?>:&nbsp;
		</td>
		<td>
			<input type="text" name="Key[1]" class="Field250" value="<?php if(isset($GLOBALS['Display1'])) print $GLOBALS['Display1']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('DateDisplayOrder')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_DateDisplayOrder')); ?></span></span>
		</td>
	</tr>
	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
			<?php print GetLang('DateDisplayOrderThird'); ?>:&nbsp;
		</td>
		<td>
			<input type="text" name="Key[2]" class="Field250" value="<?php if(isset($GLOBALS['Display2'])) print $GLOBALS['Display2']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('DateDisplayOrder')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_DateDisplayOrder')); ?></span></span>
		</td>
	</tr>
	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
			<?php print GetLang('DateDisplayStartYear'); ?>:&nbsp;
		</td>
		<td>
			<input type="text" name="Key[3]" class="Field250" value="<?php if(isset($GLOBALS['Display3'])) print $GLOBALS['Display3']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('DateDisplayStartYear')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_DateDisplayStartYear')); ?></span></span>
		</td>
	</tr>
	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
			<?php print GetLang('DateDisplayEndYear'); ?>:&nbsp;
		</td>
		<td>
			<input type="text" name="Key[4]" class="Field250" value="<?php if(isset($GLOBALS['Display4'])) print $GLOBALS['Display4']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('DateDisplayEndYear')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_DateDisplayEndYear')); ?></span></span>
		</td>
	</tr>
