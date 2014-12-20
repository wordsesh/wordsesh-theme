/**
 * clock.js
 *
 * Handles 'The Clock'.
 */
jQuery(document).ready(function($){

    // Set up the clock's numbers
    for (var i = 0; i < 24; i++){
    	jQuery('.clock-hours').append(
    		"<span id="+i+" class=\'hour-box\'><div class=\'hour\'>"+i+":00</div><div class=\'line\'></div></span>"
    	);
    }

    var d, ms, s, m, h;
    var clock = jQuery( '.utc-24-clock' );
    var SPM = 60; // Seconds Per Minute

    var seconds = setInterval(function(){
    	var now = new Date();
        d = new Date( now.getTime() + now.getTimezoneOffset() * 60000 );
        ms = d.getMilliseconds();
        s = (d.getSeconds() + (ms / 1000));

        sWidth = (s / 60) * 100; //Percentage of seconds

    }, 200)

    var minutes = setInterval(function(){
        m = d.getMinutes();
        mWidth = ((m + (sWidth / 100)) / 60) * 100; //Percentage of seconds for minutes

    }, 500)

    var hours = setInterval(function(){
        h = d.getHours() % 24;
        hWidth = ((h + (mWidth / 100)) / 24) * 100; //Percentage of seconds for hours
        jQuery( '.time-bar' ).width( hWidth+'%' );
        if ( h > 6 && jQuery(window).width() < 1200 ) {
       		offset = '-50' * h;
			clock.css( 'marginLeft', offset + 'px' );
		}

		if ( 20 === d.getDate() ) {

			var currentSesh = jQuery('#schedule').find("[data-utctime='" + doubleDigitIt( h ) + "']");
			var api = jQuery('#schedule').data('jsp');

			if ( currentSesh.hasClass( 'current-sesh' ) ) {

			} else {
				jQuery('#schedule .timeline-post').removeClass( 'current-sesh current' );
				currentSesh.addClass( 'current-sesh current' );
				api.scrollTo( (300 * h), '');
			}
		}

    }, 1000)


	function doubleDigitIt( n ) {
		var output = n + '';
		while (output.length < 2) {
			output = '0' + output;
		}
		return output;
	}

});