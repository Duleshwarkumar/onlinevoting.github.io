
<!DOCTYPE html> 
<html>
 <head>
  <title>Online Voting System</title>
   <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="mystyle.css" /> 
    <link rel="stylesheet" href="css/fonts.css" /> 
    <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/bootstrap.js"></script>
      </head>
       <body> 
       	<div class="container">
       	 <nav class="navbar navbar-default"> 
       	 	<div class="container-fluid">
       	 	 <div class="navbar-header">
       	 	  <a href="" class="navbar-brand">Online Voting System</a> 
       	 	</div>

       	 	 <ul class="nav navbar-nav">
       	 	 	<li><a href="">HOME</a></li>
       	 	 	
            <li><a href="idgenerate.php">ID Generate</a></li>
       	 	 	<li><a href="elections.php">Election</a></li>
       	 	 	<li><a href="results.php">Results</a></li>
       	 	 	<li><a href="vote.php">Votes</a></li>
       	 	 	<li><a href="logout.php">Logout</a></li>
            <li><a href=""><?php echo $_SESSION['user_name'];?></a></li>

       	 	 	

       	 	 </ul>
       	 	 </div> 
       	 	</nav>
       	 	 </div> 
                  <div class="container">
                  	
                  		
                  	<div class="col-sm-8 col-sm-offset-2 img-thumbnail" style="background-color: gray; ">
                    <img src="img/vote.jpg" class="img img-thumbnail img-responsive">
                  </div>

                </div>

       	 	</body>  

  </html>