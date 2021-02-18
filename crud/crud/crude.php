<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>crud</title>

</head>
<body>
	<?php  include('from.php') ; ?>
	<?php include ('db.php') ; ?>
    <?php 
     if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
     <?php
     echo $_SESSION['message'];
     //unset($_SESSION['message']);
     ?>
     <?php
 endif?>
</div>
    <div class="container">
    <?php
     $connect = mysqli_connect($serveur_name,$db_username,$db_password,$db_name);
     $result = $connect -> query("SELECT * FROM data") or die($connect->error);
    ?>
    <div class="row justify-content-center">
    	<table class="table">
    		<thead>
    			<tr>
    				<th>Title</th>
    				<th>Author</th>
    				<th>Image</th>
    				<th>PublishedAt</th>
            <th>quantité</th>
              <th>prix</th>
    				<th colspan="2">Action</ th>
    			</tr>
    		</thead>
    	<?php
        while ($row = $result->fetch_assoc()): ?>
          <tr>
          	<td><?php echo $row['title'] ?></td>
          	<td><?php echo $row['author'] ?></td>
          	<td><img src="images/<?php echo $row['image']; ?>"width="100" height="90"></td>
          	<td><?php echo $row['pub'] ?></td>
            <td><?php echo $row['quantité'] ?></td>
            <td><?php echo $row['prix'] ?></td>
          	<td>
          		<a href="crude.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
          		<a href="from.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
          	</td>
          </tr>
      <?php endwhile; ?>
    	</table>
    </div>
    <?php
     function pre_r($array){
     	echo '<pre>';
     	print_r($array );
     	echo '<pre>';
     }
    ?>


	<div class="row justify-content-center">
<form action="from.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="form-group">
	<label>Title</label>
	<input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="entre the title">
	</div>
	<div class="form-group">
	<label>Author</label>
	<input type="text" name="author" class="form-control" value="<?php echo $author; ?>" placeholder="entre author">
	</div>
	<div class="form-group">
	<label>Image</label>
	<input type="file" name="image" class="form-control" value="<?php echo $image; ?>" placeholder="insert the image">
	</div>
	<div class="form-group">
	<label>Published At</label>
	<input type="text" name="pub" class="form-control" value="<?php echo $date; ?>" placeholder="entre the date">
	</div>
  <div class="form-group">
  <label>Quantité</label>
  <input type="text" name="quantité" class="form-control" value="<?php echo $quantite; ?>" placeholder="insert the quantité">
  </div>
  <div class="form-group">
  <label>Prix</label>
  <input type="text" name="prix" class="form-control" value="<?php echo $prix; ?>" placeholder="insert the prix">
  </div>
	<div class="form-group">
    <?php
    if ($update == true):
    ?>
  <button type="submit" class="btn btn-primary" name="update">Update</button>
<?php else: ?>
	<button type="submit" class="btn btn-primary" name="add">Add</button>
<?php endif; ?>

</div>
</form>
</div>
</div>
</body>
</html>