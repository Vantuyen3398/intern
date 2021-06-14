<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
</head>
<body>
    <div  class="form">
        <h2>Login</h2>
        <?php  
            if (isset($_POST['submit'])) {
                echo ($msg);
            }
        ?>
        <form id="contactform" action="index.php?action=login" method="post">

                <p class="contact"><label for="username">Username</label></p> 
                <input id="username" name="username"  tabindex="2" type="text"> 

                <p class="contact"><label for="password">Password</label></p> 
                <input type="password" id="password" name="password"> 

            <input class="buttom" name="submit" id="submit" tabindex="5" value="Login" type="submit">     
    </form> 
    </div>
</body>
</html>