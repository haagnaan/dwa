<form method='POST' action='/users/p_login'>

	Email<br>
	<input type='text' name='email'>
	<br>	
	Password<br>
	<input type='password' name='password'>

	
			<? IF($error): ?>
				<div class='error'>
					Login failed. Please check your email and password.
					</div>
					<br>
			<? ENDIF; ?>
	<br><br>
		
	<input type='submit'>

</form>