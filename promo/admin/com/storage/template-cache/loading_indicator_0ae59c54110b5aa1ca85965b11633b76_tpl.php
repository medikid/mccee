<?php $IEM = $tpl->Get('IEM'); ?><div id="loading_indicator<?php if(isset($GLOBALS['TableType'])) print $GLOBALS['TableType']; ?>" class="loading_indicator" style="display: none;">
<span>
<div>
<img src="images/searching.gif" width="16" height="16">
<?php print GetLang('Loading_Stats'); ?>
</div>
</span>
</div>