<?php $IEM = $tpl->Get('IEM'); ?><div id="Campaign_id" style="height:53px;clear:both;margin-bottom:5px;">
	<span class="LeftImage" style="float:left;"></span>
	<span class="RightImage" style="float:right;"></span>
	<div class="MidImage">
		<span class="CampIcon"></span>
		<span style="float:left;" class="CampaignListText">
			<div>
			<?php if($tpl->Get('newsletterdetailsPage','action') != 'None'): ?>
			<a href="index.php?Page=Newsletters&Action=<?php echo $tpl->Get('newsletterdetailsPage','action'); ?>&id=<?php echo $tpl->Get('newsletterdetailsPage','newsletterid'); ?>" <?php echo $tpl->Get('newsletterdetailsPage','name_link_param'); ?> title="<?php echo GetLang('Edit'); ?> <?php echo $tpl->Get('newsletterdetailsPage','namelong'); ?>"><?php echo $tpl->Get('newsletterdetailsPage','name'); ?></a>
			<?php else: ?>
			<?php echo $tpl->Get('newsletterdetailsPage','name'); ?>
			<?php endif; ?>
			</div>
			<div style="padding-top:2px;"><?php echo $tpl->Get('newsletterdetailsPage','subject'); ?></div>
		</span>
		<span style="float:right;"  class="CampaignListText">
			<?php echo $tpl->Get('newsletterdetailsPage','createdate'); ?>
		</span>
	</div>
</div>
