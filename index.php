<!DOCTYPE html>

<?php
	require_once 'conexao.php';

	session_start();


	if(isset($_POST['logar'])):
		$erros = array();
		$login = mysqli_escape_string($conect, $_POST['login']);
		$senha = mysqli_escape_string($conect, $_POST['senha']);

			if(empty($login) or empty($senha)):
				$erros[] = "<li> O campo login/senha não foi preenchido </li>";
			else:
				$sql = " SELECT login FROM usuarios WHERE login = '$login'";
				$resultado = mysqli_query($conect, $sql);

				if(mysqli_num_rows($resultado) > 0):
					$senha = md5($senha);
					$sql = " SELECT * FROM usuarios WHERE login = '$login'  AND senha = '$senha'";
					$resultado = mysqli_query($conect, $sql);

					if (mysqli_num_rows($resultado) == 1 ):
						$dados = mysqli_fetch_array($resultado);
						$_SESSION['logado'] = true;
						$_SESSION['id_usuario'] = $dados['id'];
						header('location:home.php');
						else:
							$erros[] = "<li> Usuario ou senha invalidos </li>";
					endif;				
				else:
					$erros[] ="<li> Usuario não cadastrado no sistema </li>";
				endif;
			endif;
	endif;
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
	<div class="topo">
		<div class="container ">
			<div class="col-md-10">
				<h1>Login</h1>
				<p>Seja bem vindo</p>
			</div>
			<div class="col-md-2 cadeado">
				<img src="img/cadeado.png" class="img-responsive">
			</div>
		</div>
	</div>
	<div class="login">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="login-form">
				<div class="col-md-5 col-md-offset-5">
					<div class="sign-in-htm">
						<div class="group">
							<i class="fas fa-user"></i>
							<input id="email" name="login" type="text" class="input" placeholder="E-mail" 
						</div>
						<div class="group">
							<i class="fas fa-lock"></i>
							<input  id="pass" name="senha" type="password" class="input" data-type="password" placeholder="Senha">
						</div>
						<div class="group">
							<input type="submit" class="btn" name="logar">
						</div>
							<?php 
								if(!empty($erros)):
									foreach ($erros as $erro):
										echo $erro;
									endforeach;
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>