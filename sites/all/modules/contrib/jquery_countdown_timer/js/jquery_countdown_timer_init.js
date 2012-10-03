(function($){
  Drupal.behaviors.eu_cookie_compliance_popup = {
    attach: function(context, settings) {
      var note = $('#jquery-countdown-timer-note'),
      ts = new Date(Drupal.settings.jquery_countdown_timer.jquery_countdown_timer_date * 1000);
      $('#jquery-countdown-timer').not('.jquery-countdown-timer-processed').addClass('jquery-countdown-timer-processed').countdown({
	timestamp : ts,
	callback : function(days, hours, minutes, seconds){
          var message = "";
          message += days + " day" + ( days==1 ? '':'s' ) + ", ";
          message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
          message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
          message += seconds + " second" + ( seconds==1 ? '':'s' ) + " left";
          note.html(message);
	}
      });
    }
  }
})(jQuery);