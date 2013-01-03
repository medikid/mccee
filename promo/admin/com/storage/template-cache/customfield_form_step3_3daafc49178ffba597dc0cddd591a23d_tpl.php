<?php $IEM = $tpl->Get('IEM'); ?><form method="post" action="index.php?Page=CustomFields&Action=Associate" onsubmit="return CheckForm();">
<input type="hidden" name="fieldid" value="<?php if(isset($GLOBALS['fieldid'])) print $GLOBALS['fieldid']; ?>">
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
				<input class="FormButton" type="submit" value="<?php print GetLang('Save'); ?>">
				<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if(confirm("<?php if(isset($GLOBALS['CancelButton'])) print $GLOBALS['CancelButton']; ?>")) { document.location="index.php?Page=CustomFields" }'>
				<br />
				&nbsp;
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr>
						<td colspan="2" class="Heading2">
							&nbsp;&nbsp;<?php print GetLang('AssociateCustomField'); ?>
						</td>
					</tr>
					<tr>
						<td width="200" class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?><?php print GetLang('MailingLists'); ?>:&nbsp;
						</td>
						<td>
							<select name="listid[]" multiple="multiple" class="ISSelectReplacement ISSelectSearch">
								<?php if(isset($GLOBALS['ListAssociations'])) print $GLOBALS['ListAssociations']; ?>
							</select>
						</td>
					</tr>
				</table>
				<table width="100%" cellspacing="0" cellpadding="2" border="0" class="PanelPlain">
					<tr>
						<td width="200" class="FieldLabel"></td>
						<td>
							<input class="FormButton" type="submit" value="<?php print GetLang('Save'); ?>" />
							<input class="FormButton" type="button" value="<?php print GetLang('Cancel'); ?>" onClick='if (confirm("<?php if(isset($GLOBALS['CancelButton'])) print $GLOBALS['CancelButton']; ?>")) { document.location="index.php?Page=CustomFields" }' />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>

<script>
	function CheckForm() {
		if (!CountLists()) {
			alert("<?php print GetLang('ChooseCustomFieldLists'); ?>");
			return false;
		}
		return true;
	}

	function CountLists() {
		for (i = 0; i < $('select')[0].options.length; i++) {
			if ($('select')[0].options[i].selected) { return true; }
		}
		
		return false;
	}

</script>