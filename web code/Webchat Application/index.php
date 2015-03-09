<?php

if(isset($_GET['logout'])){
	session_start();
session_destroy();
}

function loginForm(){
echo'
<div id="loginform">
<form action="db.php" method="post">
<p>Please enter your name to continue:</p>
<label for="name">Name:</label>
<input type="text" name="name" id="name" />
<label for="password">Password:</label>
<input type="password" name="password" id="password" />
<input type="submit" name="enter" id="enter" value="Enter" />
<input type="button" value="Register a User" onCLick="registerUser()"/>
<div id="display">  </div>
</form>
</div>
';
}

?>
<?php
session_start();
if(!isset($_SESSION['name'])){
loginForm();

}
else{
	header('location: welcome.php');
}
?>


<!DOCTYPE html>
<html>
<head>
<title>chat</title>
<link type="text/css" rel="stylesheet" href="style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js">
</script>

<script>
function registerUser(){
	$.ajax({ 
			type: "POST",
			url: "register.php",
			data: { name: $('#name').val(),
					password: $('#password').val() 
			},
			success: function(status) {
				console.log(status);
			$('#display').html(status);
			}
			});
			
			
}

	
</script>
</head>
</body>
</html>