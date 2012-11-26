<div id='wrapper'>

	<!-- HEADING -->
	<h1>Card Generator</h1>
	
	<!-- CARD SETTINGS ON THE LEFT -->
	<div id='left-side'>
		<h2>Pick a color</h2>
		<div class='color-choice' id='red'></div>
		<div class='color-choice' id='orange'></div>
		<div class='color-choice' id='yellow'></div>
		<div class='color-choice' id='green'></div>
		<div class='color-choice' id='blue'></div>
		<div class='color-choice' id='indigo'></div>
		<div class='color-choice' id='violet'></div>
		
		<br>
		
		<h2>Pick a texture</h2>
		<div class='texture-choice' id='texture1'></div>
		<div class='texture-choice' id='texture2'></div>
		<div class='texture-choice' id='texture3'></div>
		<div class='texture-choice' id='texture4'></div>
		
		<br>
		
		<h2>Pick a message</h2>
		<input type='radio' name='message' value='Happy Birthday'>Happy Birthday<br>
		<input type='radio' name='message' value='Thank You'>Thank You<br>
		<input type='radio' name='message' value='Congrats!'>Congrats<br>
		
		
		<h2>Enter your recipient</h2>
		<small>You have <span id='characters-left'>10</span> characters left</small><br>
		<input type='text' id='recipient' maxlength=10>
		
		<br>
		
		<h2>Add some graphics</h2>
		<img src='/images/graphic_burst.png' class='graphic-choice'>
		<img src='/images/graphic_gift_2.png' class='graphic-choice'>
		<img src='/images/graphic_gift_3.png' class='graphic-choice'>
		<br>
		<img src='/images/graphic_gift.png' class='graphic-choice'>
		<img src='/images/graphic_heart.png' class='graphic-choice'>
		<img src='/images/graphic_star.png' class='graphic-choice'>
		
	</div>
	
	<!-- CARD SETTINGS ON THE RIGHT -->
	<div id='right-side'>
		<div id='card'>
        	<div id='canvas'>
        		<div id='message'></div>
	        	<div id='recipient-output'></div>
        	</div>
        </div>
	</div>
	
	<!-- FOOTER -->
	<div id='footer'></div>
	
	
</div>