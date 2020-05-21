<?php 

session_start();

require_once 'conexao.php';

$id = mysqli_escape_string($conect, $_GET['id']);

$sql = "DELETE FROM usuarios WHERE id ='$id'";

mysqli_query($conect, $sql);
	header('location:usuarios.php');
?>