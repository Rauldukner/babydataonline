 <? session_start(); ?>
<!doctype html>
<html>
<head>
    <title>My Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
     
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
   
    
</head>
<body>

<div data-role=page id="register">
  <div data-role=header>
    
  </div>

  <div data-role=content>
    

    <form method="post" action="registerMe.php">
    
    <span> Last name </span>
    <input type=text id="lname" name="lname">
    <span> First name </span>
    <input type=text id="fname" name="fname">
    <span> Child</span>
    <input type=text id="child" name="child">
    <span> Email</span>
    <input type=text id="email" name="email">
    <span> Username</span>
    <input type=text id="uname" name="uname">
    <span> Password</span>
    <input type=password id="pword" name="pword">
<br>
    <input type="submit" name="submit value="Register"> 
</form>
  </div>
</div>

</body>
</html> 
