$(document).ready(function() { // start doc ready; do not delete this!

	$('.color-choice').click(function() {
	
		// Find out what color was clicked
		var color_that_was_chosen = $(this).css('background-color');
	
		// Set the canvas to be that color
		$('#canvas').css('background-color', color_that_was_chosen);
		
		//texture choice
		$('.texture-choice').css('background-color', color);
			
	});
	
	// image to use
	$('.texture-choice').click(function() {
	
		var image_that_was_chosen = $(this).css('background-image');
		
		// console.log(image_that_was_chosen);
		$('#canvas').css('background-image', image_that_was_chosen);
	
	});
	
	$('input[name=message]').click(function() {
	
		// Figure out what the message is
		var message = $(this).attr('value');
		
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
		
		$('#recipient-output').html(recipient + "!");
	
	});
	
	$('.graphic-choice').live ('click',(function() {
	
		var image = $(this).attr('src');
		
				
		$('#canvas').prepend("<img class='draggable new-draggable' src='" + image + "'>");		
		
		$(".draggable").draggable({ containment: "#canvas" });
	
	});
	
	// clear card code
	$('#refresh-button').click(function() {
	
		$('#message-in-canvas').html("");
		$('#recipient-in-canvas').html("");
		$('.draggable').remove();
		$('#canvas').css('background-color', 'white');
		$('#canvas').css('background-image','');
	
	});
		
					
}); // end doc ready; do not delete this!