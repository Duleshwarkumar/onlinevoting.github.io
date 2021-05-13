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
       		
       	<div class="col-sm-6">
          <h4>add new election</h4>
          <form method="POST">
            <div class="form-group">
              <label>Add Election name</label>
              <input type="text" name="elections_name" class="form-control">
            </div>

            <div class="form-group">
              <label>Election Start Date</label>
              <input type="date" name="elections_start_date" class="form-control">
            </div>

            <div class="form-group">
              <label>Election End Date</label>
              <input type="date" name="elections_end_date" class="form-control">
            </div>
            <input type="submit" name="add_elections" class="btn btn-success">
             
          </form>
        </div>
      </div>
    </body>
    </html> 
    <?php
$conn=new mysqli("localhost","root","","votingsystem_db"); 
if(isset($_POST['add_elections'])){
   $elections_name=$_POST['elections_name'];
   $elections_start_date=$_POST['elections_start_date'];
   $elections_end_date=$_POST['elections_end_date'];

    $insert ="insert into elections_tbl(elections_name,elections_start_date,elections_end_date)values('$elections_name','$elections_start_date','$elections_end_date')";
    $run=$conn->query($insert);
    if($run)
    {
      echo "success";
}
else
{
  echo"error";
}
}

    ?>