<?php $IEM = $tpl->Get('IEM'); ?><div id="div5" style="display:none">
	<div class="body">
		<br><?php if(isset($GLOBALS['DisplayUnsubscribesIntro'])) print $GLOBALS['DisplayUnsubscribesIntro']; ?>
		<br>
		<br>
		<?php if(isset($GLOBALS['Calendar'])) print $GLOBALS['Calendar']; ?>
		<br />
		<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
	</div>
</div>
<script>amChartInited(0);</script>
