<?php
	include("session.php");
	include("config.php");
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mystyle1.css" /> 
  <link rel="stylesheet"  href="css/all.min.css"/>
</head>
<body>
<div class="icon-bar">
  <!--a href="home.php"><i class="fa fa-home"></i></a--> 
  <a class="active" href="users.php"><i class="fas fa-dolly-flatbed"></i></a> 
  <a href="registration.php"><i class="fas fa-tshirt"></i></a>
  <!--a href=""><i class="fa fa-power-off"></i></a--> 
</div>
<h2 class=nombre>&nbsp;&nbsp;Actualizar</h2>
<hr/>

<form action="update.php" method="POST" enctype="multipart/form-data">
  <div class="container">
  <?php
	$result = mysqli_query($mysqli,"SELECT * FROM users WHERE firstname ='$id'");
	while($row = mysqli_fetch_array($result))
	{
    echo"<input type='hidden' name='id' value='{$row['firstname']}' required>";
    echo"<input type='number' min='100' max='7000' readonly='readonly' placeholder='ID del producto' name='firstname' value='{$row['firstname']}' required>";
    echo"<input type='text' placeholder='Nombre del producto' name='middlename' value='{$row['middlename']}' required>";
    echo"<input type='number'  min='1' max='999999999'placeholder='Cantidad' name='lastname' value='{$row['lastname']}' required>";
  	echo"<label><b>Fecha de Actualizacion</b>";
    echo"<input type='date' name='birthdate' value='{$row['birthdate']}'required>";
    echo"<div class='clearfix'>";
    echo"<button type='submit' class='signupbtn'>Actualizar</button>";
    echo "<a href='users.php' class='boton_2'>Cancelar</a>";
	echo"</div>";
	}?>
  </div>
</form>