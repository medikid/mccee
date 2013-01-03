<?php $IEM = $tpl->Get('IEM'); ?>// This is a supplementary JavaScript that must be parsed in by IEM engine in order to further customize
// JQuery's ui.datepicker, should be included as an inline script due to the fact that this has to be parsed in by the templating engine

$.extend($.datepicker,{
	CUSTOM_IEM_MONTH_NAMES:				[	'<?php print GetLang('Jan'); ?>', '<?php print GetLang('Feb'); ?>', '<?php print GetLang('Mar'); ?>', '<?php print GetLang('Apr'); ?>',
											'<?php print GetLang('May'); ?>', '<?php print GetLang('Jun'); ?>', '<?php print GetLang('Jul'); ?>', '<?php print GetLang('Aug'); ?>',
											'<?php print GetLang('Sep'); ?>', '<?php print GetLang('Oct'); ?>', '<?php print GetLang('Nov'); ?>', '<?php print GetLang('Dec'); ?>'],
	CUSTOM_IEM_DAY_NAMES:				['<?php print GetLang('Sun'); ?>', '<?php print GetLang('Mon'); ?>', '<?php print GetLang('Tue'); ?>', '<?php print GetLang('Wed'); ?>', '<?php print GetLang('Thu'); ?>', '<?php print GetLang('Fri'); ?>', '<?php print GetLang('Sat'); ?>'],

	customIEM_ShortenArrayString:		function(source, strlength) {
		var temp = [];
		for(var i = 0, j = source.length; i < j; ++i)
			temp.push(source[i].substring(0,strlength));
		return temp;
	}
});

$.datepicker.setDefaults({	speed: '',
							showOn: 'both',
							buttonImage: 'images/calendar.gif',
							buttonImageOnly: true,
							dateFormat: 'dd/mm/yy',
							monthNames: $.datepicker.CUSTOM_IEM_MONTH_NAMES,
							monthNamesShort: $.datepicker.customIEM_ShortenArrayString($.datepicker.CUSTOM_IEM_MONTH_NAMES, 3),
							dayNames: $.datepicker.CUSTOM_IEM_DAY_NAMES,
							dayNamesShort: $.datepicker.customIEM_ShortenArrayString($.datepicker.CUSTOM_IEM_DAY_NAMES, 3),
							dayNamesMin: $.datepicker.customIEM_ShortenArrayString($.datepicker.CUSTOM_IEM_DAY_NAMES, 2)});