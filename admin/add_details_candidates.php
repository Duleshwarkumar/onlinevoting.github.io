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
          <form method="POST">
            <?php
            $conn=new mysqli("localhost","root","","votingsystem_db");
            $elections_name=$_GET['elections_name'];
            $total_candidates=$_GET['total_candidates'];

        ?>
  <label>Election name</label>
<input type="text" name="elections_name" value="<?php echo $elections_name;?>"class="form-control" readonly="readonly">
  <?php
             for ($i=1; $i<=$total_candidates ; $i++) { 
               ?>

               <div class="form-group">
                 <label>Candidate Name <?php echo $i;?></label>
                 <input type="text" name="candidates_name<?php echo $i;?>" class="form-control">
               </div>

               <?php
             }

            ?>
<input type="submit" name="add_detail_candidate" class="btn btn-success">
             
          </form>
        </div>
      </div>
    </body>
    </html> 
    <?php

if(isset($_POST['add_detail_candidate'])){
    $total_candidates=$_GET['total_candidates'];
    $elections_name=$_POST['elections_name'];
   for ($i=1; $i<=$total_candidates; $i++) { 
      $candidates_name[]=$_POST['candidates_name'.$i];
   }
   
       for ($i=0; $i<$total_candidates ; $i++) { 
         $insert="INSERT into candidates_tbl(candidates_name,elections_name) values('$candidates_name[$i]','$elections_name')";

         $run=$conn->query($insert);

       }
      if($run){
        echo "success";
      }   
    else
    {
      echo "error";
    }
  
 
}
    ?>