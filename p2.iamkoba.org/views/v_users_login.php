
<script>
function validateForm()
{
var a=document.forms["myForm"]["email"].value;
if (a==null || a=="")
  {
  alert("Enter the email you registered with Please");
  return false;
  }
  var b=document.forms["myForm"]["password"].value;
if (b==null || b=="")
  {
  alert("Please enter your Password");
  return false;
  }
}
</script>




<form name="myForm" method='POST' action='/users/p_login' onsubmit="return validateForm();">

	Email<br>
	<input type="text" name="email">
	<br>	
	Password<br>
	<input type="password" name="password">

	
			<? if($error): ?>
				<div class='error'>
					Login failed. Please check your email and password.
					</div>
					<br>
			<? endif; ?>
	<br>
		
	<input type="submit" value="Submit">

</form>