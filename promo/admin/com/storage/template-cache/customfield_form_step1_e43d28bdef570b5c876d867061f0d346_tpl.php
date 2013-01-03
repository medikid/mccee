<?php $IEM = $tpl->Get('IEM'); ?><form method="post" action="index.php?Page=CustomFields&Action=<?php if(isset($GLOBALS['Action'])) print $GLOBALS['Action']; ?>" onsubmit="return CheckForm()">
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr>
			<td class="Heading1">
				<?php if(isset($GLOBALS['Heading'])) print $GLOBALS['Heading']; ?>
			</td>
		</tr>
		<tr>
			<td class="body pageinfo">
				<p>
					<?php if(isset($GLOBALS['Intro'])) print $GLOBALS['Intro']; ?>
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
				<input class="FormButton" type="submit" value="<?php print GetLang('Next'); ?>">
				<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if(confirm("<?php print GetLang('CreateCustomField_CancelPrompt'); ?>")) { document.location="index.php?Page=CustomFields" }'>
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('CustomFieldDetails'); ?>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('CustomFieldType'); ?>:&nbsp;
						</td>
						<td>
							<?php if(isset($GLOBALS['FieldTypeList'])) print $GLOBALS['FieldTypeList']; ?>
							<!-- Custom Help so we can make it show higher -->
							<div id="cfHelp" style="display:none">
								<img onMouseOut="HideHelp('sscVAaNTpt');" onMouseOver="ShowHelp('sscVAaNTpt', '<?php print GetLang('CustomFieldType'); ?>', '<?php print GetLang('CustomFieldTypeHelp'); ?>');" src="images/help.gif" width="24" height="16" border="0"><div style="display:none; top: 180px;" id="sscVAaNTpt"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('CustomFieldName'); ?>:&nbsp;
						</td>
						<td>
							<input type="text" name="FieldName" id="FieldName" class="Field250" value="<?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('CustomFieldName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_CustomFieldName')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php print GetLang('CustomFieldRequired'); ?>&nbsp;
						</td>
						<td>
							<label for="FieldRequired"><input type="checkbox" id="FieldRequired" name="FieldRequired"<?php if(isset($GLOBALS['FieldRequired'])) print $GLOBALS['FieldRequired']; ?>><?php print GetLang('CustomFieldRequiredExplain'); ?></label>

							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('CustomFieldRequired')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_CustomFieldRequired')); ?></span></span>
						</td>
					</tr>
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel"></td>
						<td>
							<input class="FormButton" type="submit" value="<?php print GetLang('Next'); ?>" />
							<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if (confirm("<?php if(isset($GLOBALS['CancelButton'])) print $GLOBALS['CancelButton']; ?>")) { document.location="index.php?Page=CustomFields" }' />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<script>

	// Check the radio button custom fields (Added by Mitch during IEM5 alpha testing)
	var cf_selected = false;

	function CheckForm() {
		if ($('#FieldName').val() == '') {
			alert("<?php print GetLang('EnterCustomFieldName'); ?>");
			$('#FieldName').focus();
			return false;
		}

		if (!cf_selected) {
			alert("<?php print GetLang('SelectCustomFieldType'); ?>");
			$('#FieldName').focus();
			return false;
		}
	}

	$(document).ready(function() {
		document.getElementById('cfCustomHelp').innerHTML = document.getElementById('cfHelp').innerHTML;
		document.getElementById('cfHelp').innerHTML = '';
	});

</script>
