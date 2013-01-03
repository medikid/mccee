<?php $IEM = $tpl->Get('IEM'); ?>	<script>
		function AddOption() {
			var CurrentSize = $('#customFieldsTable tr td input[@type=hidden]').size() + 1;

			$(	'<tr>'
				+ '<td class="FieldLabel" width="200"> <?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?> <b><?php echo GetLang('DropDown'); ?> ' + CurrentSize + ' <?php echo GetLang('Value'); ?>:</b>&nbsp;</td>'
				+ '<td class="PickListValues">'
				+ '<input name="Key[' + CurrentSize + ']" class="Field250" value="" id="key_' + CurrentSize + '" type="hidden">'
				+ '<input name="Value[' + CurrentSize + ']" class="Field250" value="" id="value_' + CurrentSize + '" type="text">'
				+ '</td>'
				+ '</tr>').insertBefore($('#customFieldsTable #additionalOption'));
		}

		Application.Page.CustomFieldEdit.onFormSubmitFunction.populateDropdownValue = function() {
			var rows = $('#customFieldsTable tr td.PickListValues');
			for(var i = 0, j = rows.length; i < j; ++i) {
				var display = $('input[@type=text]', rows[i]);
				var value = $('input[@type=hidden]', rows[i]);

				if ($.trim(display.val()) == '') {
					display.val(value.val());
				} else {
					if($.trim(value.val()) == '') value.val(display.val());
				}
			}

			return true;
		}
	</script>

	<tr>
		<td width="200" class="FieldLabel">
			<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
			<?php print GetLang('Instructions'); ?>:&nbsp;
		</td>
		<td>
			<input type="text" name="DefaultValue" id="DefaultValue" class="Field250" value="<?php if(isset($GLOBALS['DefaultValue'])) print $GLOBALS['DefaultValue']; ?>">&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('Instructions')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_Instructions')); ?></span></span>
		</td>
	</tr>

	<?php if(isset($GLOBALS['CurrentList'])) print $GLOBALS['CurrentList']; ?>

	<?php if(isset($GLOBALS['ExtraList'])) print $GLOBALS['ExtraList']; ?>

	<tr id="additionalOption">
		<td>&nbsp;</td>
		<td><a href="javascript:AddOption()"><img src="images/plus.gif" border="0" style="margin-right: 5px"></a><a href="javascript:AddOption()"><?php print GetLang('AddMore'); ?></a></td>
	</tr>