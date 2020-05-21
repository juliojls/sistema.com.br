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
            <div class="col-md-9  top">
            	<h2>Cadasto de Usuários</h2>
            	<table class="table">
					<thead class="bg-info">
						<tr>
						 <th scope="col">Nome</th>
      					 <th scope="col">Usuario</th>
      				     <th scope="col"> Açoes </th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
            				$sql="SELECT * FROM usuarios";
            				$resultado = mysqli_query($conect, $sql);
            				if (mysqli_num_rows($resultado) > 0):  
            				while($dados = mysqli_fetch_array($resultado)):
             			?>
    					<tr>
     						<td><?php echo $dados['nome'];?></td>
     						<td><?php echo $dados['login'];?></td>
      						<td><a href="editar.php?id=<?php echo $dados['id'];?>"<i class="fas fa-pencil-alt"></i></a><a href="excluir.php?id=<?php echo $dados['id'];?>">    
      							         <i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php
                            endwhile; 
                            else:  
                        ?> 
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                         endif;
                        ?>                                     
                     </tbody>
                </table>
                <a href="incluir.php" class="btn btn-info">Cadastrar Usuários</a>
            </div>
        </div>   
    </body>
</html>