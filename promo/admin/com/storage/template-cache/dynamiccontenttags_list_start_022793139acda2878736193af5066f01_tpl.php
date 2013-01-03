<?php $IEM = $tpl->Get('IEM'); ?><div>
	<div class="toolTipBox" style="padding:10px; margin: 10px 10px 0 10px; background-image: url('images/infoballon.gif'); background-repeat: no-repeat; padding-left: 24px; background-position: 5px 10px;<?php echo $tpl->Get('ShowInfo'); ?>">
		<?php print GetLang('InsertDynamicContentTags_Description'); ?>
	</div>
	<div style="480px; padding: 10px; margin-left: 20px;">
		<?php echo $tpl->Get('FlashMessages'); ?>
	</div>
        <?php echo $tpl->Get('CloseButton'); ?>
</div>