$(document).ready(function() {
		
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	$('.color-choice').click(function() {
	
		// Figure out which color we should use
		var color = $(this).css('background-color');

		// Change the background color of the canvas
		$('#canvas').css('background-color', color);
		
		// Also change the texture choices
		$('.texture-choice').css('background-color', color);

	});	
	
	/*------------------------------------font choice ---------------
	---------------------------------------------------------------*/
	$('.font-choice').click(function() {
	
		// Figure out which color we should use
		var font = $(this).css('background-font');

		

	});	
	/*------------------------------
	----------------------creating the font event --------------------------*/
	
	$('.texture-font').click(function() {
	
		// Figure out which font we should use
		var font = $(this).css('background-font');
		
		
	});	
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	$('.texture-choice').click(function() {
	
		// Figure out which image we should use
		var image = $(this).css('background-image');
		
		// Change the background image of the canvas
		$('#canvas').css('background-image', image);
	
	});	
	

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	$('input[name=message]').click(function() {
	
		// Figure out what message we should enter
		var message = $(this).attr('value');
			
		$('#message-in-canvas').html(message);
		
	});
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	$('#recipient').keyup(function() {
	
		var recipient = $(this).val();
		
		var length = recipient.length;
		
		if(length == 14) {
			$('#recipient-error').html("The max amount of characters is 14");
			$('#recipient-error').show();
		}
		else {
			$('#recipient-error').html("");
			$('#recipient-error').hide();
		}
		
		$('#recipient-in-canvas').html(recipient + "!");
	
	});
	
	
	
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	$('#graphic-search-button').click(function() {
	
		var search_term = $('#graphic-search-input').val();
		
		var url = 'http://students.susanbuck.net/storage/code/_js/google_images.php?keyword=' + search_term;
				
		$.ajax({
			url: url,
			cache: false,
			beforeSend: function() {
				$('#graphic-search-results').html("Searching...");	
			},
			success: function(data) {
				
				$('#graphic-search-results').html(data);
				
			},
			dataType: "html"
		});
					
	});
	
	
	/*-------------------------------------------------------------------------------------------------
	We have to attach our click method here a little differently. Instead of just using the .click
	method we use the .live method and have it listen for click.
	
	We do it this way because this listener will work for our static graphics as well as the ajax'ed
	graphics we get from Google. The .live method will listen for items added to the page even after page
	load, whereas plain .click won't.
	-------------------------------------------------------------------------------------------------*/
	$('.graphic-choice').live('click', function() {
	
		var image = $(this).attr('src');
		
		$('#canvas').prepend("<img class='draggable new-draggable' src='" + image + "'>");
		$(".draggable").draggable({ containment: "#canvas" });
	
	});
	
	
	/*-------------------------------------------------------------------------------------------------
	the above is contained inside the area you want the images stored
	-------------------------------------------------------------------------------------------------*/
	$('#refresh-button').click(function() {
					
		$('#message-in-canvas').html("");
		$('#recipient-in-canvas').html("");
		$('.draggable').remove();
		$('#canvas').css('background-color', 'white');
		$('#canvas').css('background-image', '');
	
	});
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	$('#print-button').click(function() {
		
		// Setup the window we're about to open	    
	    var print_window =  window.open('','_blank','');
	    
	    // Get the content we want to put in that window - this line is a little tricky to understand, but it gets the job done
	    var contents = $('<div>').html($('#canvas').clone()).html();
	    
	    // Build the HTML content for that window, including the contents
	    var html = '<html><head><link rel="stylesheet" href="card-generator.css" type="text/css"></head><body>' + contents + '</body></html>';
	    
	    // Write to our new window
	    print_window.document.open();
	    print_window.document.write(html);
	    print_window.document.close();
	    		
	});
	
			
});