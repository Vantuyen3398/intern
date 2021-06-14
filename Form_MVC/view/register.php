<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register</title>
	<link rel="stylesheet" href="../css/register.css">
    
</head>
<body>
	<div  class="form">
		<h2>Register</h2>
		<?php 
			if (isset($_POST['submit'])) {
				 echo $msg;
			}
		?>
    	<form id="contactform" action="index.php?action=register" method="post" name="register" onsubmit="return validateForm()" enctype="multipart/form-data"> 
    			<p class="contact"><label for="name">Name</label></p> 
    			<input id="name" name="name" placeholder="First and last name"  tabindex="1" type="text"> 

    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com"  type="email"> 

                <p class="contact"><label for="username">Create a username</label></p> 
    			<input id="username" name="username" placeholder="username"  tabindex="2" type="text"> 

                <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" name="password"> 

                <p class="contact"><label for="date">Date Of Birth</label></p> 
    			<input type="date" id="date" name="date"> 

    			<p class="contact"><label for="img">Avatar</label></p> 
    			<input type="file" id="avatar" name="avatar" > 

            <input class="buttom" name="submit" id="submit" tabindex="5" value="Register" type="submit" > 	 
   	</form> 
	</div>
    <script src="../js/validate.js"></script>
</body>
</html>