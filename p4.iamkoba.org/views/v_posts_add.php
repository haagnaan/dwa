<script>

function validateForm()
	{
		var x=document.forms["myForm"]["content"].value;
		if (x==null || x=="")
		  {
		  alert("Please enter a post, and we hope that it will be meaningful to the group");
		  return false;
		  }
}

</script>



<form method='POST' action='/posts/p_add' id="form" name="myForm" onsubmit="return validateForm();">

	<strong>Add a Post:</strong><br>
	<textarea id="post" name="content"></textarea>

	<br><br>
	<input type='submit' value='Submit'> 

</form