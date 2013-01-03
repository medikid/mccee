<?php $IEM = $tpl->Get('IEM'); ?><div id="div2" style="display:none">
	<div class="body">
		<br><?php if(isset($GLOBALS['DisplayOpensIntro'])) print $GLOBALS['DisplayOpensIntro']; ?>
		<br>
		<br>
		<?php if(isset($GLOBALS['Calendar'])) print $GLOBALS['Calendar']; ?>
		<br />
		<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
	</div>
</div>
<script>amChartInited(0);</script>