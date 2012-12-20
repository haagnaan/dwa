<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
	<link rel="SHORTCUT ICON" href="http://iamkoba.org/dwa/favicon.ico">

				
	<!-- Controller Specific JS/CSS -->
	<link rel="stylesheet" href="/css/bio.css" type="text/css"> 
	<?php echo @$client_files; ?>
	
</head>

<body>

	<div id='wrapper'>
		
		<h1>Iamkoba (Nulla Deditio)</h1>
		
		<div id='menu'>
	
			<!-- Menu for users who are logged in -->
			<? if($user): ?>
				
				<a href='/users/logout'>Logout</a>
				<a href='/posts/users/'>Change who you're following</a>
				<a href='/posts/'>View posts</a>
				<a href='/posts/add'>Add a new post</a>
			
			<!-- Menu options for users who are not logged in -->	
			<? else: ?>
			
				<a href='/users/signup'>Sign up</a>
				<a href='/users/login'>Log in</a>
			
			<? endif; ?>
	
		</div>
	
		<br>
		<?=$content;?> 

	</div>
	
</body>
</html>