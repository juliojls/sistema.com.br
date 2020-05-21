<?php 
	include_once 'conexao.php';
	session_start();

	if (!isset($_SESSION['logado'])):
		header('location:login.php');
	endif;

	$id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = mysqli_query($conect, $sql);
	$dados = mysqli_fetch_array($resultado);
	
?>
    <!DOCTYPE html>
 <html>

    <head>
    	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="estilohome.css" <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com.br/docs/4.1/examples/dashboard/dashboard.css" rel="stylesheet">
        <title> teste </title>
    </head>

    <body>
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark top">
                <div class="col-md-1 btn-braco">Olá
                    <?php echo $dados['nome']; ?>
                </div>
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
                                <span data-feather="home"></span> Home <span class="sr-only nav-link active">(atual)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span> Pedidos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span> Produtos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios.php">
                                <span data-feather="bar-chart-2"></span> Usuários
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span> Contas a Pagar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span> Contas a Receber
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php 
                $id = mysqli_escape_string($conect, $_GET['id']);
                $sql = "SELECT * FROM usuarios WHERE id = '$id'";
                $resultado = mysqli_query($conect, $sql);
                $dados = mysqli_fetch_array($resultado);

            ?>
            <div class="col-md-9  top">
            	<h2>Editar Usuários</h2>
            	<form action="update.php" method="POST">
                    <div class="form-row">
                         <div class="form-group col-md-6">
                              <label for="inputEmail4">Nome:</label>
                              <input type="text" class="form-control" id="inputEmail4" placeholder="Digite seu Nome" name="nome" value="<?php echo $dados['nome']?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Senha</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Digite a sua Senha" name="senha" value="<?php echo $dados['senha']?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Login</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Seu login de acesso" name="login"value="<?php echo $dados['login']?>">
                        </div>
                         <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" id="inputAddress" placeholder="" name="id" value="<?php echo $dados['id']?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info" value="btn-cadastrar">Salvar</button>
                        <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>   
    </body>
</html>