<?php
session_start();

require_once "conexao.php";

	$nome = mysqli_escape_string($conect, $_POST['nome']);
	$senha = mysqli_escape_string($conect, $_POST['senha']);
	$login = mysqli_escape_string($conect, $_POST['login']);

	$senha = md5($senha);
	$sql="INSERT INTO usuarios (nome, login, senha) VALUES('$nome', '$login', '$senha')";
	if(mysqli_query($conect, $sql)):
		header('location:usuarios.php');
	endif;

 ?>