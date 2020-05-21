<?php 
  require_once "conexao.php";

	$nome = mysqli_escape_string($conect, $_POST['nome']);
	$senha = mysqli_escape_string($conect, $_POST['senha']);
	$login = mysqli_escape_string($conect, $_POST['login']);

	$id = mysqli_escape_string($conect, $_POST['id']);

	$senha = md5($senha);
	$sql = "UPDATE usuarios SET nome = '$nome', login = '$login', senha = '$senha'  WHERE id = '$id'";

	if(mysqli_query($conect, $sql)):
		header('location:usuarios.php');
	endif;
 ?>