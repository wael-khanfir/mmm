<?php
include "../entities/vol.php";
include "../core/volC.php";
	?>
<html>
<head>
	<title>CRUD VOL</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script src="bootstrap.min.js"></script>
	<script src="bootstrap.js"></script>
</head>
<body>
  <?php

  if(isset($_SESSION["message"]));
  ?>
  <div class="alert alert-<?=$_SESSION["msg_type"]?>">
    <?php 
    echo$_SESSION["message"];
    unset($_SESSION["message"]);
    ?>
  </div>

	<div class="container">
	<?php
	
	$vol_affiche=new volC();
	$result=$vol_affiche->affichervols();
	//pre_r($result);
    ?>
    <div class="row justify-content-center" >
    	<table class="table">
    		<thead>
    			<tr>
    				<th>id</th>
    				<th>airline</th>
    				<th>lieu_a</th>
    				<th>lieu_d</th>
    				<th>date d</th>
    				<th>date a</th>
    				<th>heure d </th>
    				<th>heure r</th>
    				<th colspan="2">Action</th>
    			</tr>
    		</thead>
    		<?php
    		foreach($result as $row){
        ?>
        <tr>
            <td><?PHP echo $row['idVol']; ?></td>
            <td><?PHP echo $row['airline']; ?></td>
            <td><?PHP echo $row['lieu_a']; ?></td>
            <td><?PHP echo $row['lieu_d']; ?></td>
            <td><?PHP echo $row['date_d']; ?></td>
             <td><?PHP echo $row['date_r']; ?></td>
              <td><?PHP echo $row['heure_d']; ?></td>
               <td><?PHP echo $row['heure_r']; ?></td>
               <td>
               	<a href="modifier.php?edit=<?php echo $row['idVol'];?>"class="btn btn-info">Edit
               	</a>
               	<a href="supprimer.php?delete=<?php echo $row['idVol'];?>"class="btn btn-danger">Delete</a>
               </td>
           <?php 
       }?>

    		</tr>
    	</table>
</div>
    	<?php
    function pre_r($array){
    	echo '<pre>';
    	print_r($array);
    	echo '<pre>';
    }
  
	?>
	<div class="row justify-content-center" >
<form action="ajoutervol.php" method="POST">
	<div class="form-group">
	<label>id vol</label>
	<input type="text" name="idVol" class="form-control" placeholder="id" value="">
</div>
<div class="form-group">
	<label>airline</label>
	<input type="text" name="airline" class="form-control" placeholder="airline name" value="">
</div>
<div class="form-group">
	<label>Country name</label>
	<input type="text" name="lieu_a" class="form-control" placeholder="Country name" value="">
</div>
<div class="form-group">
	<label>lieu de depart</label>
	<input type="text" name="lieu_d" class="form-control" placeholder=" lieu de depart" value="">
</div>
<div class="form-group">
	<label>date de depart</label>
	<input type="date" name="date_d" class="form-control" placeholder="" value="">
</div>
<div class="form-group">
	<label>date arrive</label>
	<input type="date" name="date_r" class="form-control" placeholder="" value="">
</div>
<div class="form-group">
	<label>heure depart</label>
	<input type="number" name="heure_d" class="form-control" placeholder="" value="">
</div>
<div class="form-group">
	<label>heure arrive</label>
	<input type="number" name="heure_r" class="form-control" placeholder="" value="">
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary" name="save">Save</button>
</div>

</form>
</div>
</body>
</div>
</html>
