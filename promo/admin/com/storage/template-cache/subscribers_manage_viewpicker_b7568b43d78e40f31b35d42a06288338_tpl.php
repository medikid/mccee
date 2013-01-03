<?php $IEM = $tpl->Get('IEM'); ?><div id="SubscriberViewPicker" style="display: none; width: 350px; position: static;" class="DropShadowContainer PopDownMenuContainer">
	<div class="Shadow1" style="width: 100%">
		<div class="Shadow2" style="width: 100%">
			<div class="Shadow3" style="width: 100%">
				<div class="ItemContainer" style="width: 100%">
					<div id="SubscriberViewPicker_MenuContainer" class="DropDownMenu">
						<div style="line-height:1.7; padding:4px 10px; text-decoration:none; display: <?php if(isset($GLOBALS['DisplayStyleList'])) print $GLOBALS['DisplayStyleList']; ?>;"><img src="images/contacts_view.gif" />&nbsp;&nbsp;<b><?php print GetLang('MailingLists'); ?></b> (<span onclick="document.location.href='index.php?Page=Subscribers&Action=Manage&Lists=any';" style="cursor:pointer; display: inline; text-decoration: underline;"><?php print GetLang('SubscriberViewPicker_All'); ?></span> / <span onclick="document.location.href='index.php?Page=Subscribers&Action=Manage&SubAction=AdvancedSearch';" style="cursor:pointer; display: inline; text-decoration: underline;"><?php print GetLang('SubscriberViewPicker_Search'); ?></span>)</div>
						<ul style="display: <?php if(isset($GLOBALS['DisplayStyleList'])) print $GLOBALS['DisplayStyleList']; ?>;"><?php if(isset($GLOBALS['ListViews'])) print $GLOBALS['ListViews']; ?></ul>
						<div style="line-height:1.7; padding:4px 10px; text-decoration:none; display: <?php if(isset($GLOBALS['DisplayStyleSegment'])) print $GLOBALS['DisplayStyleSegment']; ?>;"><img src="images/contacts_segment_manage.gif" />&nbsp;&nbsp;<b><?php print GetLang('Segments'); ?></b> (<span onclick="document.location.href='index.php?Page=Segment';" style="cursor:pointer; display: inline; text-decoration: underline;"><?php print GetLang('SubscriberViewPicker_All'); ?></span>)</div>
						<ul style="display: <?php if(isset($GLOBALS['DisplayStyleSegment'])) print $GLOBALS['DisplayStyleSegment']; ?>;"><?php if(isset($GLOBALS['SegmentViews'])) print $GLOBALS['SegmentViews']; ?></ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>