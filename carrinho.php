<?php

/*--mostra-*/


	require "conexao.php";
	session_start();
/*
	$busca= "SELECT * FROM `carrinho` WHERE `id_usuario`='$d1'";
	$resultado = mysql_query($busca,$conexao);
	$i = mysql_num_rows($resultado);
	$linha = mysql_fetch_array($resultado);*/

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Eventos</title>
		<link rel="stylesheet" type="text/css" href="style.css" />	
	</head>
	<body>
		<nav id="top_bar">
			<ul>
				<li><a href="index.php"> Eventos </a></li>
					<?php 
					if(isset($_SESSION['carrinho'])){
						$x=$_SESSION['email'];
						$busca= "SELECT * FROM `users` WHERE `email`='$x'";
								$resultado = mysql_query($busca,$conexao);
								$linha = mysql_fetch_array($resultado);
								$d1=$linha['id'];
								$busca= "SELECT * FROM `carrinho` WHERE `id_usuario`='$d1'";
								$resultado = mysql_query($busca,$conexao);
								$i = mysql_num_rows($resultado);
						echo'<li><a href="carrinho.php"> Carrinho('.$i.') </a></li>';			
					}
					else echo '<li><a href="carrinho.php"> Carrinho(0) </a></li>';
				?>
				
				<li><a href="#">Links</a></li>
				<li><a href="contact.php">Contato</a></li>
				<?php 
					if(isset($_SESSION['nome'])){
						echo'<li><a href="config.php">'.$_SESSION['nome'].'</a></li>';
						echo '<li><a href="logout.php?in=1"> Sair</a></li>';
					}
					elseif (isset($_COOKIE['nome'])) {
						echo'<li><a href="config.php">'.$_SESSION['nome'].'</a></li>';
						echo '<li><a href="logout.php?in=1"> Sair</a></li>';
						}
					else echo '<li><a href="login.html">Entrar</a></li>';
					if(isset($_SESSION['adm'])){
						echo '<li><a href="foto.html">Criar Eventos</a></li>';
					}
				?>		
			</ul>
		</nav>
		<div id="events_bar" >
			<ul>
				<?php
				if(isset($_GET['r'])){
					$x=$_SESSION['email'];
								$busca= "SELECT * FROM `users` WHERE `email`='$x'";
								$resultado = mysql_query($busca,$conexao);
								$linha = mysql_fetch_array($resultado);
								$d1=$linha['id'];

					$id=$_GET['r'];
					unset($_SESSION['carrinho'][$id]);
					$remove="DELETE FROM `carrinho` WHERE `id_upload`='$id' AND `id_usuario`='$d1'";
					mysql_query($remove) or die("Nao removido.");
				}

				foreach($_SESSION['carrinho'] as $id => $qtd){
    					$a= $_SESSION['carrinho'][$id];
    					$busca= "SELECT * FROM `upload` where `id`='$id'";
						$resultado = mysql_query($busca,$conexao);
						$linha = mysql_fetch_array($resultado);
						$fid=$linha['id'];
						$i=$linha['url'].$linha['nome'];
						echo '<li><a href="carrinho.php?r='.$fid.'"><img src="'.$i.'"></a></li>';
				}
				?>				
			</ul>
		</div>

		