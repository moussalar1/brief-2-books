<?php 
	include "header.php";
	?>

      

<div style="margin: 0">
	<h4 style="padding-left: 150px ; padding-top: 35px ; color: #B219B0"> OUR BOOKS :</h4>
</div>
<div class="container py-5" style="padding-top: 40px " >
<div class="row mt-4" style="display: flex ; justify-content: center ; flex-wrap: wrap">


	<?php
	   include('crud/from.php') ;
     include ('crud/db.php') ; 
     $query = "SELECT * FROM data";
     $query_run = mysqli_query($connect, $query);
     $check_book = mysqli_num_rows($query_run) > 0;

     if($check_book){
         while ($row = mysqli_fetch_assoc($query_run)){
         ?>
<div class="col-md-4" >
<div class="card"  style="border-color: black ; border-width: 3px; height: 330px; width: 280px ; margin-top: 60px">
	<img src="crud/images/<?php echo $row['image']; ?>" class="card-image-top" style="max-width :100% ; max-height: 100% "> 
    <div class="card-body"> 
      <h5 class="card-title" style="text-align: center"> <?php echo $row['title'] ?></h5>
      <p class="card-text"></p>
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div>
  </div>



         <?php
         }
     }

    


	
         ?>  
  
</div>
</div>
