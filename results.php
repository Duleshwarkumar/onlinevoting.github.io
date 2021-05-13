<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['user_id_generated'])
{
  header("location:elections.php");
  

}
?>

<br>
 <div class="container">
 <div class="col-sm-6 col-md-offset-3">
  <h3 class="text text-info text-center">Result Portion</h3>
  <p class="text text-danger ">In this  section those elections results display which are closed or expire </p>
  <form method="post" action="">
    <div class="form-group">
      <select class="form-control" name="elections_name">
      <option  selected="selected" value="">select election</option>
      <?php
     $current_ts=time();
      require("includes/db.php");
$select="SELECT * from elections_tbl";
$run=$conn->query($select);
if($run->num_rows>0){
  while($row=$run->fetch_array()){
       $election_name=$row['election_name'];
       $election_start_date=$row['election_start_date'];
       $election_end_date=$row['election_end_date'];
      ?>
 <?php
 $election_end_date_ts=strtotime($election_end_date);
 if($election_end_date_ts<$current_ts){

 
      ?>


<option value="<?php echo $row['elections_name'];?>"><?php echo $row['elections_name'];?></option>

      <?php
}
}
}

      ?>
    </select>
  </div>
      <div class="form-group">
        <input type="submit" name="search_result" class="btn btn-success" value="Search Result">
      </div>
      </form>
      <table class="table table-responsive table-hover table-bordered text-center"  >
     <tr>
       <td>#</td>
       <td>candidates name</td>
       <td>Obtaind votes</td>
       <td>winning status</td>
     </tr>

   <?php
if(isset($_POST['search_result'])){
  $elections_name=$_POST['elections_name'];
 $select="select * from results_tbl where elections_name='$elections_name'";
 $run=$conn->query($select);

 if($run->num_rows>0){
  $total_elections_votes=0;
  while($row=$run->fetch_array()){

    $total_elections_votes=$total_elections_votes+1;
  }
 }

  $select="select * from candidates_tbl where elections_name='$elections_name'";
  $run=$conn->query($select);
 if($run->num_rows>0){
 // $total_elections_votes=0;
  $total=0;
  while($row=$run->fetch_array()){
    $total=$total+1;
    $candidates_name=$row['candidates_name'];
    $total_votes=$row['total_votes'];
    $percentage=(($total_votes/$total_elections_votes)*100);

    ?>
<tr>
  <td><?php echo $total;?></td>
  <td><?php echo $candidates_name;?></td>
  <td><?php echo $total_votes;?></td>
  <td>
    <?php 
if($percentage>50){

  ?>
  <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $percentage;?>"aria-valuemin="0"aria-valuemax="<?php echo $percentage;?>" style="width: <?php echo $percentage;?>%">
      <?php echo $percentage;?>%
      
    </div>
    
  </div>
  <?Php
}
else if($percentage>40)
{ ?>
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $percentage;?>"aria-valuemin="0"aria-valuemax="<?php echo $percentage;?>" style="width: <?php echo $percentage;?>%">
      <?php echo $percentage;?>%
      
    </div>
    
  </div>

  <?php

}
else{
  ?>
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $percentage;?>"aria-valuemin="0"aria-valuemax="<?php echo $percentage;?>" style="width: <?php echo $percentage;?>%">
      <?php echo $percentage;?>%
      
    </div>
    
  </div>
  <?php
}


  ?></td>

</tr>
    <?php

}
?>
<tr>
  <td colspan="2">Total votes</td>
  <td ><?php echo $total_elections_votes;?> </td>
  <td>
    
  </td>
</tr>
<?php

}
else{
  ?>
<tr>
  <td colspan="4">Record Not Found</td>
</tr>
<?php
}

}
   ?>
   </table>
    </div>
   
 
 </div>
</div>