<?php 
Include("includes/header.php"); 
?>
<?php 
require("includes/db.php"); 
$emailError="";
$accountSuccess="";
if(isset($_POST['register'])){
	
	 $user_name=$_POST['fullname'];
	 $user_email=$_POST['email']; 
	 $user_gender=$_POST[ 'gender']; 
	 $user_province=$_POST['province'];
	 $user_password=$_POST['password'];

	 $select="select * from users_db where user_email='$user_email'";
	$exe=$conn->query($select);
	
	if($exe->num_rows>0) 
	{ $emailError= "<p class='text text-center text-danger'> Email already registered</p>";
}


else{
		
	$insert="insert into users_db(user_name,user_email,user_gender,user_province,user_password)values
	('$user_name','$user_email','$user_gender','$user_province','$user_password')";
		$run=$conn->query($insert);
	if($run){
	$accountSuccess="<p class='text text-center text-success'>account created successfully</p>";
	
	}
	else
{ echo "error";
}


}

}
?>
<br> 
<hr> 
<div class="container">
   <div class="row">
   <div class="col-sm-8 col-Sm-offset-2 bg-info" style="box-shadow:2px 2px 2px 2px gray;">
   <h3 class="text text-center alert bg-primary">User Register</h3>
   <h5 class="text text-center text-danger">
  

<?php
   if($emailError!="")
   {
	   echo $emailError;
   }
   if($accountSuccess!="")
   {
	   echo $accountSuccess;
   }
   ?>








   <form method="post">
   

 <div class="form-group" >
 <label for="exampleInputEmail1">Full name</label>
 <input type="text" class="form-control" name="fullname" id="exampleinputEmail1" placeholder="Enter Full name" 
 required> 
 </div>
 
 
 
 <div class="form-group" >
 <label for="exampleInputEmail1">Email address</label>
 <input type="email" class="form-control" name="email" id="exampleinputEmail1" placeholder="Enter email" 
 required> 
 </div>
 
 <div class="form-group">
 <label for="gender">Gender</label> 
 <select name="gender" class="form-control"> 
 <option value="">Select</option> 
 <option value="Male">Male</option> 
 <option value="Female">Female</option> 
 </select>
 </div> 

 <div class="form-group">
 <label for="province">Province</label> 
 <select name="province" class="form-control">
 <option value="">Select</option>
 <option value="punjab">Punjab </option>
 <option value="Bihar">Bihar </option>
 <option value="Chandigarh">Chandigarh </option>
 </select>
 </div>

 <div class="form-group">
 <label for="password">password</label>
 <input type="password" name="password" class="form-control">
 </div>

 <div class="form-group">
 <button type="submit" class="btn btn-success btn-block" name="register">register</button>

 </div>
 </form>
 </br>
 </div>
 </div>
 </div>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 </body>
 </html>
 
 
 