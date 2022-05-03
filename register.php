<?php
include("config.php");


$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$foto = '';
if(file_exists($_FILES['imagen']['tmp_name']) || is_uploaded_file($_FILES['imagen']['tmp_name'])){
	$file = $_FILES["imagen"];
	$nombre = $file["name"];
	$tipo = $file["type"];
	$rutap = $file["tmp_name"];
	$size = $file["size"];
	$dimension = getimagesize($rutap);
	$carpeta = "imagenes/";
	if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'png')  ))){
		echo '<script language="javascript">';
		echo 'window.alert("Solo se acepta imagenes gif, jpeg, webhp, png");';
		echo 'window.history.back();';
		echo '</script>';
	}else if($size > 3*1024*1024){
		echo '<script language="javascript">';
		echo 'window.alert("Solo se acepta imagenes menor a 3MB");';
		echo 'window.history.back();';
		echo '</script>';
	}else{
	$src = $carpeta.$nombre;
	move_uploaded_file($rutap, $src);
	$foto = "imagenes/".$nombre;
	$sql= mysqli_query($mysqli,"SELECT COUNT(*) AS total FROM users WHERE firstname='$firstname'");
	$row=mysqli_fetch_object($sql);
	if($row->total == 0){
	$sql = "INSERT INTO users(firstname, imagen, middlename, lastname, birthdate) 
	VALUES('$firstname', '$foto' , '$middlename', '$lastname', '$birthdate')";
	mysqli_query($mysqli, $sql);
    echo '<script language="javascript">';
	echo 'alert("Nuevo producto agregado");';
	echo 'window.location="users.php";';
	echo '</script>';
	} else {
	echo '<script language="javascript">';
	echo 'alert("ID de  Producto duplicado, intente con otro");';
	echo 'window.location="registration.php";';
	echo 'window.history.back();';
	echo '</script>';
	}
	}
}else{
	echo '<script language="javascript">';
	echo 'window.alert("No ha cargado una imagen");';
	echo 'window.history.back();';
	echo '</script>';
}
?>