(function( $ ) {
	
    $.fn.countDownTimer = function(options) {
   !$.countDownTimer && $.countDownTimer
     var defaults = {
      color    : "#E6AC27",
      endDate  : new Date(),
      nowDate  : new Date()
     };

     var options = $.extend(defaults, options);
     var timer;

     //defaults.endDate = new Date(2013,0,20,5,00);

     var diff = defaults.endDate.getTime() - defaults.nowDate.getTime();
     var seconds = Math.floor(diff / 1000);
     var minutes = Math.floor(seconds / 60);
     var hours = Math.floor(minutes / 60);
     var days = Math.floor(hours / 24);


     function updateInterface(color){
             //console.log("_color: "+_color);
             defaults.color = color;
     }

     return this.each(function() {
         obj = $(this); 
    
         if(diff <= 0){
           return;
         }

         draw();
         tikTak();
      
    
       });

       function tikTak(){
         self.setInterval(draw, 1000);
       }    

       function draw(){
         defaults.nowDate  = new Date();
         diff              = defaults.endDate.getTime() - defaults.nowDate.getTime();
         seconds           = Math.floor(diff / 1000);
         minutes           = Math.floor(seconds / 60);
         hours             = Math.floor(minutes / 60);
         days              = Math.floor(hours / 24);

         hours %= 24;
         minutes %= 60;
         seconds %= 60;

         drawDays();
         drawHours();
         drawMinutes();
         drawSeconds();
       }

       function degree(val){
           var _val  = 360-(val*360)/60;
           var _deg  = (Math.PI/180)*_val - (Math.PI/180) * 90; 
           return  _deg;
       }

       function drawHours(){
           var canvas = document.getElementById('hours');
             var context = canvas.getContext('2d');
             var x = canvas.width / 2;
             var y = canvas.height / 2;
             var radius = 60;
             var startAngle  = degree(0)
             var endAngle    =  degree(hours);
             var counterClockwise = false;

             //console.log(startAngle +" "+ endAngle);

             context.clearRect(0, 0, canvas.width, canvas.height);

                 context.beginPath();

             context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
             context.lineWidth = 10;

             // line color
             context.strokeStyle = defaults.color;
             context.stroke();

             $(".hours-val").text(hours);
			 
			 if ( $(".hours-val").html() == '1' ) {
			 	 $(".hours-text").html( 'Hour' );
			 }
         }

         function drawMinutes(){
           var canvas = document.getElementById('minutes');
             var context = canvas.getContext('2d');
             var x = canvas.width / 2;
             var y = canvas.height / 2;
             var radius = 60;
             var startAngle  = degree(0)
             var endAngle    =  degree(minutes);
             var counterClockwise = false;

             //console.log(startAngle +" "+ endAngle);

             context.clearRect(0, 0, canvas.width, canvas.height);

                 context.beginPath();

             context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
             context.lineWidth = 10;

             // line color
             context.strokeStyle = defaults.color;
             context.stroke();

             $(".minutes-val").text(minutes);
			 
			 if ( $(".minutes-val").html() == '1' ) {
			 	 $(".minutes-text").html( 'Minute' );
			 }
         }

         function drawSeconds(){
           var canvas = document.getElementById('seconds');
             var context = canvas.getContext('2d');
             var x = canvas.width / 2;
             var y = canvas.height / 2;
             var radius = 60;
             var startAngle  = degree(0)
             var endAngle    =  degree(seconds);
             var counterClockwise = false;

             //console.log(startAngle +" "+ endAngle);

             context.clearRect(0, 0, canvas.width, canvas.height);

                 context.beginPath();

             context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
             context.lineWidth = 10;

             // line color
             context.strokeStyle = defaults.color;
             context.stroke();

             $(".seconds-val").text(seconds);
			 
			 if ( $(".seconds-val").html() == '1' ) {
			 	 $(".seconds-text").html( 'Second' );
			 }
         }

         function drawDays(){
           var canvas = document.getElementById('days');
             var context = canvas.getContext('2d');
             var x = canvas.width / 2;
             var y = canvas.height / 2;
             var radius = 60;
             var startAngle  = degree(0)
             var endAngle    =  degree(days);
             var counterClockwise = false;

             //console.log(startAngle +" "+ endAngle);

             context.clearRect(0, 0, canvas.width, canvas.height);

                 context.beginPath();

             context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
             context.lineWidth = 10;

             // line color
             context.strokeStyle = defaults.color;
             context.stroke();

             $(".days-val").text(days);
			 
			 if ( $(".days-val").html() == '1' ) {
			 	 $(".days-text").html( 'Day' );
			 }
			 
         }
    };
	
})( jQuery );