<h3><?php _e( 'Attendees', 'wordsesh' ); ?></h3>
	
<ul class="attendee-list">
	
	<?php
	$count = 0;
	while ( $count < 12 ) {
	?>
	
		<li class="attendee">
		
			<a href="#">
				
				<img class="attendee-img" src="" />
			
				<span class="attendee-name">Attendee Name</a>
				<span class="attendee-byline">Hello</a>
			
			</a>
		
		</li>
	
	<?php
		$count ++;
	}
	?>
	
</ul>
