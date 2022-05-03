<?php
	include("session.php");
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
  <a href="users.php"><i class="fas fa-dolly-flatbed"></i></a> 
  <a class="active" href="registration.php"><i class="fas fa-tshirt"></i></a>
  <a href="print_all.php" target="_blank"><i class="fa fa-print"></i></a>
  <!--a href=><i class="fa fa-power-off"></i></a--> 
</div>

<h2 class= nombre>&nbsp;&nbsp;Registro de Producto</h2>
<hr/>
<form action="register.php" method="POST" enctype="multipart/form-data">
  <div class="container">
	  <input type="number" min="100" max="7000" placeholder="ID del producto" name="firstname" required>
    <label><input type="file" name="imagen" required/></label>
    <input type="text" placeholder="Nombre del Producto" name="middlename" required>
    <input type="number" min="1" max="999999999" placeholder="Cantidad" name="lastname" required>
  	<label>Fecha de Registro</label>
    <input type="date" name="birthdate" required>
    <div class="clearfix">
    <button type="submit" class="signupbtn">Registrar</button>
	  <button type="reset" class="cancelbtn">Cancelar</button>
    </div>
  </div>
</form>