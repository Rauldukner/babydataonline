 <? session_start(); ?>
<!doctype html>
<html>
<head>
    <title>My Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="jquery.mobile-1.4.2/jquery.mobile-1.4.2.min.css">
     
    <script src="lib/jquery-1.8.2.min.js"></script>
    <script src="jquery.mobile-1.4.2/jquery.mobile-1.4.2.min.js"></script>
    
    




</head>
<body>

     <div data-role="page" id="splash" data-theme="b">

        <div id="login">
            <form name="form1" method="post" action="checklogin.php">
                <label>Username</label>
                <input type="text" id="uname" name="uname"><br>
                <label>Password</label>
                <input type="password" id="pword" name="pword"><br>
                
                 
                <input type="submit" name="Submit" value="Login">
                
            </form>
            <a href="register.php"><input type="button" value="Register"></a>
        </div>

    </div>


</body>

</html>

                           


                           



