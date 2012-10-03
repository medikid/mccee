<?php
$tp_total=150;
$qn=1;
$qnav_items = '<ul class="qnav_items" >';
while ($qn <= $tp_total){
	$mod = $qn % 2;
	$qnav_items .= '<li class="qnav_item" id="'.$qn.'" onclick="q_retr(this.id);"><ul ';
	if ($mod == 0){
	$qnav_items .= 'id="even"';	
	} else $qnav_items .= 'id="odd"';
	$qnav_items .='><li class="fl">fl</li><li class="vw">vw</li><li class="qn">'.$qn.'</li><li class="an">a</li><li class="va">va</li><li class="du">du</li></ul></li>';
	$qn++;
}
$qnav_items .='</ul>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script type="text/JavaScript" src="js/question_sheet_nav.js"></script>

<link rel="stylesheet" type="text/css" href="css/question_sheet_nav.css"/>
<title>Topbar fixed </title>
</head>
<body>
<div class="user_toolbar">user_toolbar</div>
<div class="question_sheet_navbar"><?php print $qnav_items; ?></div>
<div class="content">
<div class="question_viewer">question_viewer</div>
<div class="notes_viewer">notes_viwer</div>
</div>
</boody>
</html>
