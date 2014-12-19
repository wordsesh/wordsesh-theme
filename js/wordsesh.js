
jQuery( document ).ready( function( $ ) {

    $( ".clock" ).countDownTimer({
    	color 	: '#2d8c73',
    	endDate : new Date(Date.UTC(2014, 11, 20, 0, 0, 0))
    });

	if ($(window).width() >= 768){
		$('#schedule').jScrollPane({
			showArrows: true,
			horizontalArrowPositions: 'before',
			animateScroll: true
		});
	}

});