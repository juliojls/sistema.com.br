<?php 
	require_once 'conexao.php';
	session_start();

	if (!isset($_SESSION['logado'])):
		header('location:login.php');
	endif;

	$id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = mysqli_query($conect, $sql);
	$dados = mysqli_fetch_array($resultado);
	mysqli_close($conect);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilohome.css">
	    <!-- Principal CSS do Bootstrap -->
    <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos customizados para esse template -->
    <link href="https://getbootstrap.com.br/docs/4.1/examples/dashboard/dashboard.css" rel="stylesheet">

    <link href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">

</head>
<body>
	
<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark top">
      	<div class="col-md-1 btn-braco">Olá <?php echo $dados['nome']; ?></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"></div>
  		<div class="col-md-1"><a href="logout.php" class="btn btn-braco">Sair</a></div>
      </nav>
    </header>

<div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="home.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only nav-link active">(atual)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Pedidos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Produtos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Clientes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="usuarios.php">
                  <span data-feather="bar-chart-2"></span>
                  Usuários
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Contas a Pagar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Contas a Receber
                </a>
              </li>
            </ul>
          </div>
        </nav>
</body>
</html>