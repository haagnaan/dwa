$(document).ready(function() { // start doc ready; do not delete this!


$('.graphic-choice').click(function() {

		var image_that_was_chosen = $(this).css('background-image');
		console.log(image_that_was_chosen);
		$('#canvas').css('background-image', image_that_was_chosen);

	});


/*---------------------bbbbbbbbbbbbbbbbbbbbb---------------*/

	$('.graphic-choice').click(function() {

		var image = $(this).attr('src');

		var full_image = "<img class='draggable' src='" + image + "'>";

		$('#canvas').append(full_image);
		$('#canvas').draggable({cusor:'move'});
		$(".draggable").draggable({ containment: "#canvas" });
		$(".graphic-choice").droppable( {drop: handleDropEvent } );
		
	});
	
	function handleDropEvent( event, ui ) {
				var draggable = ui.draggable;
				}
				
	// clear card code
	$('#refresh-button').click(function() {
	
		$('.draggable').remove();
		$('#canvas').css('background-image','');
		//$('#recipient').empty();
	
	});

	
	
}); // end doc ready; do not delete this!