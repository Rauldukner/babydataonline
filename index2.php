<?php  session_start();
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata"); ?>
<!doctype html>


<html>
<head>
    <title>My Baby Data Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="jquery.mobile-1.4.2/jquery.mobile-1.4.2.min.css">
     
    <script src="lib/jquery-1.8.2.min.js"></script>
    <script src="jquery.mobile-1.4.2/jquery.mobile-1.4.2.min.js"></script>
    
   
   <style type="text/css">

   table {text-align:center;}

   </style>
   

</head>
<body> 


                            <!-- MENU PAGE -->

    <div data-role="page" id="pageone">
 
        <div data-role="header" data-theme="b" >
            <h2>Baby Data Tracker</h2>
            <div data-role="navbar" >

<?php session_start(); ?>

<?php if (isset($_SESSION['uname'])) { ?>
<p>Welcome back, <?= $_SESSION['uname']; ?>!</p>
<?php } else { ?>

<p>
  <a href="register.php">Create an account</a> | 
  <a href="index.php">Login to your account</a>
</p>

<?php } ?>

    <ul>
        
        <li><a href="#profile">Profile</a></li>
    </ul>
    </div>
          
</div>
 
        <div data-role="content">
            <p>Select Activity</p>

            <form>
    
            <ul data-role="listview" data-inset="true" data-theme="e">
    <li><a href="#pagetwo" data-transition="slide">Baby Feed</a></li>
    <li><a href="#pagethree" data-transition="slide">Nappy Change</a></li>
    <li><a href="#pagefour" data-transition="slide">Sleep</a></li>
    <li><a href="#pagefive" data-transition="slide">Medication</a></li>
    <li><a href="#pagesix" data-transition="slide">Milestones</a></li>
    
</ul>
</form>
<div id="feedlistholder">

    Recent Feeds: 
    <br><br>
    <?php session_start(); ?>
 <?php
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM feeds ORDER BY feeddate DESC, feedtime DESC LIMIT 5");

echo "<table  >
<tr>
<th>Feed time</th>
<th>Feed date</th>
<th>Type</th>
<th>Amount</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['feedtime'] . "</td>";
  echo "<td>" . $row['feeddate'] . "</td>";
  echo "<td>" . $row['feedtype'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</div>



<br>
<br>
<form action="Logout.php" method="get">
    <input type="submit" value="Logout">
</form>
 <div data-role="footer" data-id="foo1" data-position="fixed">
    <div data-role="navbar">
        <ul>
            <li><a href="#summary" onclick"outputFeedAmount()">Summary</a></li>
            
            <li><a href="#export">Export Data</a></li>
            
        </ul>
     </div>
    </div>

        </div>
 
        
</div>


                                





                                <!-- BABY FEED PAGE -->
<div data-role="page" id="pagetwo">

 
        <div data-role="header" data-theme="b" >
            <h2>Baby Feed Tracker</h2>
            <div data-role="navbar" >
              <?php session_start(); ?>

<?php if (isset($_SESSION['uname'])) { ?>
<p>Welcome back, <?= $_SESSION['uname']; ?>!</p>
<?php } else { ?>

<p>
  <a href="register.php">Create an account</a> | 
  <a href="index.php">Login to your account</a>
</p>

<?php } ?>
    <ul>
        <li><a href="#pageone" data-transition="slide" data-direction="reverse">Back</a></li>
        
    </ul>
</div>
            
        </div>
 
        <div data-role="content" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;">
        
      
        <br>
            


            <a href="#timer" data-role="button" data-rel="dialog" id="startfeed">Start Feed</a>
            <a href="#endtimer" data-role="button" data-rel="dialog">Stop Feed</a>

<br>

  <br>   
<br>
    <a href="#" data-role="button" data-icon="star">Synchronise</a>


        </div>
 
        
    </div><!-- /page -->


                            <!-- ********NAPPY CHANGE PAGE***********--> 


<div data-role="page" id="pagethree">
 
        <div data-role="header" data-theme="b" >
            <h2>Baby Data Tracker</h2>
            <div data-role="navbar" >
    <ul>
        <li><a href="#pageone" data-transition="slide" data-direction="reverse">Back</a></li>
        
    </ul>
</div><!-- /navbar -->
            
        </div><!-- /header -->
 
        <div data-role="content">
            
            <div data-role="popup" id="popupBasic">
                
        
</div>

            <a href="#nappys" data-role="button" data-rel="dialog">Add Nappy Change</a>



<div id="nappylistholder">
  Recent Nappy Changes:
  <br>
  <br>
  <?php
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM nappy ORDER BY ndate DESC, ntime DESC LIMIT 5");

echo "<table  >
<tr>
<th>Nappy change time</th>
<th>Nappy change date</th>
<th>Nappy type</th>
<th>Observations</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ntime'] . "</td>";
  echo "<td>" . $row['ndate'] . "</td>";
  echo "<td>" . $row['ntype'] . "</td>";
  echo "<td>" . $row['observations'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</div>


<br>
    
<br>
    <a href="#" data-role="button" data-icon="star">Synchronise</a>


        </div>
 
        
    </div>


                        <!-- ********SLEEP PAGE*********** -->

<div data-role="page" id="pagefour">
 
        <div data-role="header" data-theme="b" >
            <h2>Baby Data Tracker</h2>
            <div data-role="navbar" >
    <ul>
        <li><a href="#pageone" data-transition="slide" data-direction="reverse">Back</a></li>
        
    </ul>
</div>
            
        </div>
 
        <div data-role="content">
            

            <a href="#sleeps" data-role="button" data-rel="dialog">Sleep Start time</a>
            <a href="#endsleep" data-role="button" data-rel="dialog">Sleep End time</a>


<div id="sleeplistholder">
  Recent Sleeps:
  <br>
  <br>

  <?php
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM sleep ORDER BY sdate DESC, stime DESC LIMIT 5");

echo "<table  >
<tr>
<th>Start Sleep time</th>
<th>End Sleep</th>
<th>Date</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['stime'] . "</td>";
  echo "<td>" . $row['endstime'] . "</td>";
  echo "<td>" . $row['sdate'] . "</td>";
  
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</div>


<br>
    
<br>
    


        </div>
        
    </div>

                        <!-- ********MEDICATION PAGE*******-->

<div data-role="page" id="pagefive">
 
        <div data-role="header" data-theme="b" >
            <h2>Baby Data Tracker</h2>
            <div data-role="navbar" >
    <ul>
        <li><a href="#pageone" data-transition="slide" data-direction="reverse">Back</a></li>
        
    </ul>
</div>
            
        </div>
 
        <div data-role="content" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;">
            <form method="post" action="addMeds.php">
            <label>Select Medication Type:</label><br>
            <select id="medtype" name="medtype">
                <option value="calpol">Calpol</option>
                <option value="dentinox">Dentinox</option>
                <option value="bepanthen">Bepanthen</option>
            </select>
            <label>Time:</label><br>
            <input type="time"   id="medtime" name="medtime"/> 
            <label>Date:</label><br> 
            <input type="date"  id="meddate" name="meddate" /> 
            <label>Notes:</label><br> 
            <input type="text"  id="mednote" name="mednotes" /> 
            <button type="submit" onClick="window.location.reload()">Add Medication</button>
</form>
<div id="medlistholder">
    <br>
  Recent Medication:
  <br>
  
  <br>
<?php
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM medication ORDER BY meddate DESC, medtime DESC LIMIT 5");

echo "<table  >
<tr>
<th>Medication</th>
<th>Date</th>
<th>Time</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['medtype'] . "</td>";
  echo "<td>" . $row['meddate'] . "</td>";
  echo "<td>" . $row['medtime'] . "</td>";
  
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
<button onClick="window.location.reload()">Refresh Recent Medications</button>
</div>


<br>
    
<br>
  


        </div>
 
        
    </div>

                        <!-- ********MILESTONES PAGE****** -->

<div data-role="page" id="pagesix">
 
        <div data-role="header" data-theme="b" >
            <h2>Baby Data Tracker</h2>
            <div data-role="navbar" >
    <ul>
        <li><a href="#pageone" data-transition="slide" data-direction="reverse">Back</a></li>
        
    </ul>
</div>
            
        </div>
 
        <div data-role="content">
            
            <div data-role="popup" id="popupBasic">
                
        
</div>
    <div data-role="fieldcontain" id="milestoneinput">
        <form method="post" action="addMilestone.php">
            <label>Describe Milestone</label><br>
            <input type="text" id="mstype" name="mstype"><br><br>
            <label>Date:</label><br>
            <input type="date" id="msdate" name="msdate">
            <br><br>
           <button type="submit" >Add Milestone</button>
       </div>
   </form>
<div id="milestonelistholder">
  Recent Milestones:
  <br>
  <br>
  <?php session_start();
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$uname = mysql_real_escape_string($_SESSION['uname']);

$result = mysqli_query($con,"SELECT * FROM milestones WHERE uname='$uname' ORDER BY msdate DESC LIMIT 5");

echo "<table  >
<tr>
<th>Milestone</th>
<th>Date</th>


</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['mstype'] . "</td>";
  echo "<td>" . $row['msdate'] . "</td>";
 
  
  echo "</tr>";
}

echo "</table>";

echo $_SESSION['uname'];

mysqli_close($con);
?>
</div>


<br>
    
<br>
    <a href="#" data-role="button" data-icon="star">Synchronise</a>


        </div>
 
        
    </div>



                        <!-- ***********SUMMARY PAGE*********** -->

<div data-role="page" id="summary">
 
        <div data-role="header" data-theme="b" >
            <h2>Summary</h2>
            <div data-role="navbar" >
    <ul>
        <li><a href="#pageone" data-transition="slide" data-direction="reverse">Back</a></li>
        
    </ul>
            </div>
            
        </div>
 
      <div id="summarylistholder">
        <button id="showfeedamout" onclick="outputRecentFeeds()" value="Calculate 24 hour feed total"></button>
  
  <ul id="feedamountlist" data-role="listview" data-inset="true" >
  </ul>


        <button id="showsleepamout" onclick="outputRecentSleep()" value="Calculate last sleep total"></button>
  
  <ul id="sleepamountlist" data-role="listview" data-inset="true" >
  </ul>


        <button id="showNappyAmount" onclick="outputNappyAmount()" value="Calculate total nappy changes"></button>
  
  <ul id="nappyamountlist" data-role="listview" data-inset="true" >
  </ul>
  
</div>
 
        
            
            
        
</div>

           



                        


                                                <!-- ********TIMER POPUP********** -->

<div data-role="page" id="timer" data-theme="d" data-overlay-theme="d" >

<div data-role="fieldcontain" data-theme="d" data-overlay-theme="d">
    <a href="#pagetwo" data-role="button" data-icon="delete" data-mini="true" data-inline="true" data-theme="a">Close</a>
    <br>
    <br>
    <form id="feedtimer1" method="post" action="addFeed.php">
    <select id="feedtype" name="feedtype" data-role="slider">
        <option value="Bottle">Bottle</option>
        <option value="Breast">Breast</option>
        </select>
        <br>
    <label for="name">&nbsp&nbspStart Time:</label>
    <input type="time" id="feedtime"  name="feedtime"/>
    <br>
    <label for="name">&nbsp&nbspDate:</label>
    <input type="date"  id="feeddate"  name="feeddate" /> 
    <br>
    <br>
    <input type="submit" name="submit" id="addFeed" value="Add Feed">
</form>
</div>

</div>

                                                <!-- ********FEED END TIMER POPUP********** -->

<div data-role="page" id="endtimer" data-theme="d" data-overlay-theme="d" >

<div data-role="fieldcontain" data-theme="d" data-overlay-theme="d">
    <a href="#pagetwo" data-role="button" data-icon="delete" data-mini="true" data-inline="true" data-theme="a">Close</a>
    <br>
    <br>
        <br>
        <form action="endFtime.php" method="post">
    <label for="name">&nbsp&nbspEnd Time:&nbsp</label><br>
    <input type="time" id="endfeedtime"  name="endfeedtime" /><br><br>
    <label>Amount: </label><br>
    <select id="amount" name="amount">
        <option value="1">1oz</option>
        <option value="2">2oz</option>
        <option value="3">3oz</option>
        <option value="4">4oz</option>
        <option value="5">5oz</option>
        <option value="6">6oz</option>
        <option value="7">7oz</option>
        <option value="8">8oz</option>
        <option value="9">9oz</option>
        <option value="10">10oz</option>
    </select> 
        
    <br>

    
    <br>
    <button type="submit" id="addEndFeed" name="addEndFeed" >Add Feed</button>
    </form>
</div>

</div>


                                                <!-- **********NAPPY CHANGE POPUP*********** -->

<div data-role="page" id="nappys" data-theme="d" data-overlay-theme="d">

<div data-role="fieldcontain" data-theme="d">
    <a href="#pagethree" data-role="button" data-icon="delete" data-mini="true" data-inline="true" data-theme="e">Close</a>
    <br>
    <br>
    <form method="get" action="addNappy.php">
    <label for="name">&nbsp&nbspNappy Type?:</label><br/>
    <select name="ntype" id="ntype">
        <option value="Wet">Wet Only</option>
        <option value="Dirty">Dirty Only</option>
        <option value="WetDirty">Wet & Dirty</option>

    </select>
    <br><br>
    <label for="name">&nbsp&nbspNappy Changed:</label>
    <input type="time" name="ntime"   />
    <br><br>
    <label for="name">&nbsp&nbspDate:</label>
    <input type="date" name="ndate"   />
    <br>
    <label>Observations</label>
    <input type=text name="observations">
    <br>
    <input type="submit" value="Add Nappy" />
</form> 
</div>

</div>

                                            <!-- *********SLEEP POPUP*********** -->

<div data-role="page" id="sleeps" data-theme="d" data-overlay-theme="d" >

<div data-role="fieldcontain" data-theme="e" >
    <a href="#pagefour" data-role="button" data-icon="delete" data-mini="true" data-inline="true" data-theme="a">Close</a>
    <br>
    <br>
    <form id="sleepForm" method="GET" action="addSleep.php">
    <label >&nbsp&nbspStart Time:</label>
    <input type="time" name="stime"/>
    <br>
    <label >&nbsp&nbspDate:</label>
    <input type="date" name="sdate"/>
    <br>
    <br>
    <input type="submit" id="addSleep" name="submit" value="Start Sleep"/>
</form>
</div>

</div>

                                            <!-- *********END SLEEP POPUP*********** -->

<div data-role="page" id="endsleep" data-theme="d" data-overlay-theme="d" >

<div data-role="fieldcontain" data-theme="e" >
    <a href="#pagefour" data-role="button" data-icon="delete" data-mini="true" data-inline="true" data-theme="a">Close</a>
    <br>
    <br>
    <form method="GET" action="endStime.php">
    <label for="name">&nbsp&nbspEnd Time:</label>
    <input type="time" name="endstime" id="endstime"   />
    <label for="name">&nbsp&nbspEnd Date:</label>
    <input type="date" name="endsdate" id="endsdate"   />
    <br>
    
    <input type="submit" name="submit" value="End Sleep" />
</form> 
</div>

</div>

                       

                                            <!-- *********PROFILE PAGE POPUP******** -->

<div data-role=page id="profile">
  <div data-role=header>
    
  </div>

  <div data-role=content>
    

    
    
    <span> Last name </span>
    <input type=text id="lname">
    <span> First name </span>
    <input type=text id="fname">
    <span> Child</span>
    <input type=text id="child">
    <span> Email</span>
    <input type=text id="email">
    <span> Username</span>
    <input type=text id="uname">
    <span> Password</span>
    <input type=password id="pword">
<br>
    <a href="#pageone"><button id="addProfile" onclick="addProfile()">Create Profile</button></a>

  </div>
</div>




</body>
</html>

                           



