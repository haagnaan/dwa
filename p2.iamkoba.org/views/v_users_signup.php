<script>

function validateForm()
	{
		var x=document.forms["myForm"]["first_name"].value;
		if (x==null || x=="")
		  {
		  alert("Please enter your First Name");
		  return false;
		  }
		var y=document.forms["myForm"]["last_name"].value;
		if (y==null || y=="")
		  {
		  alert("Please enter your Last Name");
		  return false;
		  }
		
		var b=document.forms["myForm"]["password"].value;
		if (b==null || b=="")
		  {
		  alert("Please enter your Password");
		  return false;
	  }
	  
		var a=document.forms["myForm"]["email"].value;
		var atpos=a.indexOf("@");
		var dotpos=a.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=a.length)
		  {
		  alert("Not a valid e-mail address");
		  return false;
		  }
}
</script>



<h2>Welcome to Iamkoba Blog Page</h2>


<div id="fcontent">
	<form method='POST' action='/users/p_signup' id="forms" name="myForm" onsubmit="return validateForm();">

		<table width="450" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="150" height="45" align="left" valign="top"><label for="firstName">First name:</td>
				<td height="45" align="left" valign="top"><input id="firstName" type='text' value="" name="first_name"></td>
			  </tr>
			  <tr>
				<td width="150" height="45" align="left" valign="top"><label for="lastName">Last Name:</td>
				<td height="45" align="left" valign="top"><input id="lastName" type='text' value="" name="last_name"></td>
			  </tr>
			  <tr>
				<td width="150" height="45" align="left" valign="top"><label for="email">Email:</td>
				<td height="45" align="left" valign="top"><input id="email" type='text' value="" name="email"></td>
			  </tr>
			  <tr>
				<td width="150" height="45" align="left" valign="top"><label for="Password">Password:</td>
				<td height="45" align="left" valign="top"><input id="password" type='password' value="" name="password"></td>
			  </tr>
			  <tr>
				<td width="150" height="45" align="left" valign="top"><input type="submit" value="Submit Form"></td>
				<td height="45" align="left" valign="top">&nbsp;</td>
			  </tr>
		</table>
		
		

	</form> 
</div>
