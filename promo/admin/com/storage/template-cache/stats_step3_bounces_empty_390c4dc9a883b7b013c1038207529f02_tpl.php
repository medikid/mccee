<?php $IEM = $tpl->Get('IEM'); ?><div id="div4" style="display:none">
	<div class="body">
		<br><?php if(isset($GLOBALS['DisplayBouncesIntro'])) print $GLOBALS['DisplayBouncesIntro']; ?>
		<br>
		<br>
		<?php if(isset($GLOBALS['Calendar'])) print $GLOBALS['Calendar']; ?>
		<br>
		<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
	</div>
</div>
<script>amChartInited(0);</script>
