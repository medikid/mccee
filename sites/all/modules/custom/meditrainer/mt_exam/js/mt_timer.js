jQuery.timer = function(){
    var div_timer = 'div.timer';
    var div_timer_h = div_timer + ' #hours';
    var div_timer_m = div_timer + ' #minutes';
    var div_timer_s = div_timer + ' #seconds';
    var input_time_total = 'input[name="time_total"]';
    var input_time_remaining = 'input[name="time_remaining"]';
    var timerId;
    var state = 'init';
    
    var div_hms = '<div id="hours">00</div>:<div id="minutes">00</div>:<div id="seconds">00</div>';
   
   var init = function(){
	jQuery(div_timer).html(div_hms);
	
	var time_remaining = parseInt(this.get_time_remaining());	
	this.set_time(time_remaining)
    }
    
    var get_timerId = function(){
	return timerId;
    }
    
    var get_timer_state = function(){
	return state;
    }
    
    var set_timer_state = function(st){
	state =  st;
    }
    
    var get_time_total = function(){
	var time_total = jQuery(input_time_total).val();
	return time_total;
    }
    
    var get_time_remaining = function(){
	var time_remaining = jQuery(input_time_remaining).val();
	return time_remaining;
    }
    
    var set_time_remaining =  function(time_s){
	jQuery(input_time_remaining).val(time_s);
    }
    
    var get_h = function(){
	var h = jQuery(div_timer_h).html();
	return h;
    }
    
    var set_h = function(hr){
	var hr_f = format_time(hr);
	jQuery(div_timer_h).html(hr_f);
    }
    var get_m = function(){
	var m = jQuery(div_timer_m).html();
	return m;
    }
    
    var set_m = function(mn){	
	var mn_f = format_time(mn);
	jQuery(div_timer_m).html(mn_f);
    }
    
    var get_s = function(){
	var s = jQuery(div_timer_s).html();
	return s;
    }
    
    var set_s = function(sc){	
	var sc_f = format_time(sc);
	jQuery(div_timer_s).html(sc_f);
    }
    
   var format_time = function(time_hms){
       var hms = 0;
       if (parseInt(time_hms) < 10 ){
	   hms = '0' + time_hms;
       } else hms = time_hms;
	
	return hms;
    }
    
    var get_time_hms = function(){
	var time = {
	    'h' : parseInt(this.get_h()),
	    'm' : parseInt(this.get_m()),
	    's' : parseInt(this.get_s())
	}
	return time;
    }
    
    var set_time_hms = function(time_hms){
	set_h(time_hms.h);
	set_m(time_hms.m);
	set_s(time_hms.s);
    }
    
  
    var sec_to_hms = function(time_s){
	var time = {
	'h' : Math.floor(time_s / 3600),
	'm' : Math.floor( (time_s % 3600)  / 60),
	's' : time_s % 60
	}
	return time;
    }
    
  
    var hms_to_sec = function(time_hms){
	var time_s = (parseInt(time_hms.h) * 3600) + (parseInt(time_hms.m) * 60) + parseInt(time_hms.s);
	return time_s;
}

  var get_time = function(){
	var time_hms = get_time_hms();
	return hms_to_sec(time_hms);
	
    }
    
    var set_time = function(time_s){
	var time_hms = sec_to_hms(time_s);
	set_time_hms(time_hms);
	
    }
    var set = function(){
	
    }
    var start = function(){	
	timerId = setInterval(function(){
	tick();
	}, 1000);

	set_timer_state('play')
    }
    var stop = function(){
	
    }
    var pause = function(){
	if (get_timer_state() == 'init' || get_timer_state() == 'play'){
	clearTimeout(get_timerId());
	set_timer_state('pause');
	}
    }
    
    var resume = function(){
	if (get_timer_state() == 'pause'){
	start();
	set_timer_state('play');
	}
    }
    
    var reset = function(){
	pause();
	set_time_remaining(get_time_total());
	start();
    }
    
    var go_forward = function(){
	
    }
    
    var go_backward = function(){
	
    }
    
    var tick = function(){
	var time_remaining = parseInt(get_time_remaining());
	
	time_remaining = time_remaining - 1;
	set_time_remaining(time_remaining);
	
	set_time(time_remaining);
    }
    
    
    
    return{
	init : init,
	get_time_total : get_time_total,
	get_time_remaining : get_time_remaining,
	set_time_remaining : set_time_remaining,
	get_timer_state : get_timer_state,
	set_timer_state : set_timer_state,
	get_h : get_h,
	set_h : set_h,
	get_m : get_m,
	set_m : set_m,
	get_s : get_s,
	set_s : set_s,
	get_time_hms : get_time_hms,
	set_time_hms : set_time_hms,
	format_time : format_time,
	get_time : get_time,
	set_time : set_time,
	set : set,
	start : start,
	stop : stop,
	pause : pause,
	reset : reset,
	resume : resume,
	go_forward : go_forward,
	go_backward : go_backward,
	tick : tick,
	get_timerId : get_timerId
    }
}