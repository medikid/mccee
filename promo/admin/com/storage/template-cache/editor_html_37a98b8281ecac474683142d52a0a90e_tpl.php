<?php $IEM = $tpl->Get('IEM'); ?><script>
	function ImportCheck() {
		var checker = document.getElementById('newsletterurl');
		if (checker.value.length <= 7) {
			alert('<?php print GetLang('Editor_ChooseWebsiteToImport'); ?>');
			checker.focus();
			return false;
		}
		return true;
	}

	$(function() { if(<?php if(isset($GLOBALS['UsingWYSIWYG'])) print $GLOBALS['UsingWYSIWYG']; ?> == 0) UsingWYSIWYG = false; });
</script>

	<tr>
		<td valign="top" width="150" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
			<?php print GetLang('HTMLContent'); ?>:
		</td>
		<td valign="top">
			<table width="<?php if(isset($GLOBALS['EditorWidth'])) print $GLOBALS['EditorWidth']; ?>" border="0" class="WISIWYG_Editor_Choices">
				<tr>
					<td width="20">
						<input onClick="switchContentSource('html', 1)" id="hct1" name="hct" type="radio" checked>
					</td>
					<td>
						<label for="hct1"><?php print GetLang('HTML_Using_Editor'); ?></label><br>
					</td>
				</tr>
				<tr>
					<td width="20">
						<input onClick="switchContentSource('html', 2)" id="hct2" name="hct" type="radio">
					</td>
					<td>
						<label for="hct2"><?php print GetLang('Editor_Upload_File'); ?></label><br>
					</td>
				</tr>
				<tr id="htmlNLFile" style="display:none">
					<td></td>
					<td>
						<img src="images/nodejoin.gif" alt="." align="top" />
						<iframe src="<?php if(isset($GLOBALS['APPLICATION_URL'])) print $GLOBALS['APPLICATION_URL']; ?>/admin/functions/remote.php?DisplayFileUpload&ImportType=HTML" frameborder="0" height="30" width="500" id="newsletterfile"></iframe>
					</td>
				</tr>
				<tr>
					<td width="20">
						<input onClick="switchContentSource('html', 3)" id="hct3" name="hct" type="radio">
					</td>
					<td>
						<label for="hct3"><?php print GetLang('Editor_Import_Website'); ?></label>
					</td>
				</tr>
				<tr id="htmlNLImport" style="display:none">
					<td></td>
					<td>
						<img src="images/nodejoin.gif" alt="." />
						<input type="text" name="newsletterurl" id="newsletterurl" value="http://" class="Field" style="width:200px">
						<input class="FormButton" type="button" name="upload" value="<?php print GetLang('ImportWebsite'); ?>" onclick="ImportWebsite(this, '<?php print GetLang('Editor_Import_Website_Wait'); ?>', 'html', '<?php print GetLang('Editor_ImportButton'); ?>', '<?php print GetLang('Editor_ProblemImportingWebsite'); ?>')" class="Field" style="width:60px">
					</td>
				</tr>
			</table>
			<br>
			<div id="htmlEditor">
				<?php if(isset($GLOBALS['HTMLContent'])) print $GLOBALS['HTMLContent']; ?>
			</div>
		</td>
	</tr>
	<tr id="htmlCF">
		<td>
			&nbsp;
		</td>
		<td>
			<input type="button" onclick="javascript: ShowCustomFields('html', 'myDevEditControl', '<?php print $IEM['CurrentPage']; ?>'); return false;" value="<?php print GetLang('ShowCustomFields'); ?>..." class="FormButton" style="width: 140px;" />
			<input type="button" onclick="javascript: InsertUnsubscribeLink('html'); return false;" value="<?php print GetLang('InsertUnsubscribeLink'); ?>" class="FormButton" style="width: 150px;" />
		</td>
	</tr>
