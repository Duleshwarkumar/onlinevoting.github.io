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
          <h4>Add candidates</h4>
          <form method="GET" action="add_details_candidates.php">
            <div class="form-group">
              <label>Add Election name</label>
                <select class="form-control" name="elections_name">
      <option value="" selected="selected">Select Election</option>
    <?php
    $conn=new mysqli("localhost","root","","votingsystem_db"); 
$select="select * from elections_tbl";
$run=$conn->query($select);
if($run->num_rows>0){
  while($row=$run->fetch_array()){

  ?>
  <option value="<?php echo $row['elections_name'];?>"><?php echo $row['elections_name'];?></option>
  <?php
}

}
    ?>
   </select>
            </div>
<div class="form-group">
   <label>No of cadidates</label>
   <input type="text" name="total_candidates" class="form-control">
</div>
           
            <input type="submit" name="add_elections" class="btn btn-success">
             
          </form>
        </div>
      </div>
    </body>
    </html> 
    