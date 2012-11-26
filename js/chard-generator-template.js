$(document).ready(function() { // start doc ready; do not delete this!

	$('.color-choice').click(function() {
	
		// Find out what color was clicked
		var color_that_was_chosen = $(this).css('background-color');
	
		// Set the canvas to be that color
		$('#canvas, .texture-choice').css('background-color', color_that_was_chosen);
			
	});
	
	$('.texture-choice').click(function() {
	
		var image_that_was_chosen = $(this).css('background-image');
		console.log(image_that_was_chosen);
		$('#canvas').css('background-image', image_that_was_chosen);
	
	});
	
	$('input[name=message]').click(function() {
	
		// Figure out what the message is
		var message = $(this).val();
		
		$('#message').html(message);
			
	});
	
	$('#recipient').keyup(function() {
	
		var recipient = $(this).val();
		
		var length = recipient.length;
		
		var characters_left = 10 - length;
		
		if(characters_left <= 3 && characters_left > 0) {
			$('#characters-left').css('color','orange');
		}
		else if(characters_left == 0) {
			$('#characters-left').css('color','red');
		}
		else {
			$('#characters-left').css('color', 'black');
		}
		
		$('#characters-left').html(characters_left);
		
		$('#recipient-output').html(recipient);
	
	});
		
					
}); // end doc ready; do not delete this!