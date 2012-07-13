<?php

	function get_header(){

	$header = array
	(
			'mem_fees' => t('Price(in CAD)'),
			'mem_dur' => t('Membership Duration'),
			'mem_type' => t('Membership Type'),	
			'access_forum' => t('Forum'),
			'access_qb' => t('Question Bank'),
			'access_disc_board' => t('Discussion Board'),
			'access_lect_notes' => t('Lecture Notes'),
			'access_lect_videos' => t('Lecture Videos')
	);
	return $header;
	}
	
	function get_options(){
		
		$Y ='<center><img src=\'../misc/message-24-ok.png\'  height=\"30\" width=\"30\" /><center>';
		$N ='<center><img src=\'../misc/message-24-error.png\'  height=\"30\" width=\"30\" /><center>';
		
		
	$options = array();
	$mems = array
	(
			array('mem_id' => 0, 'mem_dur'=>'1 Day','mem_type' => 'Free Trial', 'fees' => 'Free', 'forum'=>$Y,  'qb' =>$N, 'disc_board'=>$N,
					'lect_notes'=>$N, 'lect_videos'=>$N ),
			array('mem_id' => 1, 'mem_dur'=>'15 Days', 'mem_type' => 'Regular', 'fees' => '$10','forum'=>$Y,  'qb' =>$Y, 'disc_board'=>$N,
					'lect_notes'=>$N, 'lect_videos'=>$N ),
			array('mem_id' => 2,'mem_dur'=>'15 Days',  'mem_type' => 'Premium', 'fees' => '$15','forum'=>$Y,  'qb' =>$Y, 'disc_board'=>$Y,
					'lect_notes'=>$Y, 'lect_videos'=>$Y ),
			array('mem_id' => 3,'mem_dur'=>'1 Month',  'mem_type' => 'Regular', 'fees' => '$15', 'forum'=>$Y,  'qb' =>$Y,'disc_board'=>$N,
					'lect_notes'=>$N, 'lect_videos'=>$N ),
			array('mem_id' => 4,'mem_dur'=>'1 Month',  'mem_type' => 'Premium', 'fees' => '$22.50','forum'=>$Y, 'qb' =>$Y, 'disc_board'=>$Y,
					'lect_notes'=>$Y, 'lect_videos'=>$Y ),
			array('mem_id' => 5,'mem_dur'=>'2 Months',  'mem_type' => 'Regular', 'fees' => '$25', 'forum'=>$Y, 'qb' =>$Y, 'disc_board'=>$N,
					'lect_notes'=>$N, 'lect_videos'=>$N ),
			array('mem_id' => 6,'mem_dur'=>'2 Months',  'mem_type' => 'Premium', 'fees' => '$37.50','forum'=>$Y,  'qb' =>$Y, 'disc_board'=>$Y,
					'lect_notes'=>$Y, 'lect_videos'=>$Y ),
			array('mem_id' => 7,'mem_dur'=>'3 Months',  'mem_type' => 'Regular', 'fees' => '$40','forum'=>$Y,   'qb' =>$Y, 'disc_board'=>$N,
					'lect_notes'=>$N, 'lect_videos'=>$N ),
			array('mem_id' => 8,'mem_dur'=>'3 Months',  'mem_type' => 'Premium', 'fees' => '$60','forum'=>$Y,  'qb' =>$Y, 'disc_board'=>$Y,
					'lect_notes'=>$Y, 'lect_videos'=>$Y ),
			array('mem_id' => 9,'mem_dur'=>'6 Months',  'mem_type' => 'Premium', 'fees' => '$100','forum'=>$Y,  'qb' =>$Y, 'disc_board'=>$Y,
					'lect_notes'=>$Y, 'lect_videos'=>$Y ),
			array('mem_id' => 10,'mem_dur'=>'1 Year',  'mem_type' => 'Premium', 'fees' => '$150', 'forum'=>$Y, 'qb' =>$Y,  'disc_board'=>$Y,
					'lect_notes'=>$Y, 'lect_videos'=>$Y )
				
	);
	
	
	foreach($mems as $mem)
	{
		
		$options[$mem['mem_id']] =array
		(
			'mem_fees' =>'<b>'.$mem['fees'].'</b>',
			'mem_dur' => $mem['mem_dur'],
			'mem_type' => $mem['mem_type'],
				'access_forum' => $mem['forum'],
			'access_qb' => $mem['qb'],
		//'access_qb'=> array('data'=>array('#prefix'=> $mem['qb'])),
		//		'access_forum'=> array('data'=>array('#prefix'=> $mem['forum'])),
			
			'access_disc_board' => $mem['disc_board'],
			'access_lect_notes' => $mem['lect_notes'],
			'access_lect_videos' => $mem['lect_videos'],
				
		);
	}
	return $options;
	}