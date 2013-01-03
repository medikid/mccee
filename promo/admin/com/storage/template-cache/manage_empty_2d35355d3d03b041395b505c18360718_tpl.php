<?php $IEM = $tpl->Get('IEM'); ?><table width="100%" border="0">
	<tr>
		<td class="Heading1"><?php echo GetLang('Addon_dynamiccontenttags_ViewHeading'); ?></td>
	</tr>
	<tr>
		<td class="body pageinfo"><p><?php echo GetLang('Addon_dynamiccontenttags_Form_Intro'); ?></p></td>
	</tr>
	<tr>
		<td>
			<?php echo $tpl->Get('FlashMessages'); ?>
		</td>
	</tr>
	<tr>
		<td class="body">
			<?php echo $tpl->Get('Addon_Tags_Empty'); ?>
		</td>
	</tr>
	<tr>
		<td class="body">
			<?php echo $tpl->Get('Tags_Create_Button'); ?>
		</td>
	</tr>
</table>

