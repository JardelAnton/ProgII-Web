<?php

/*-mostra-*/


	session_start();
	require "conexao.php";

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
				<li><a href="carrinho.php"> Carrinho </a></li>
				<li><a href="#">Links</a></li>
				<li><a href="contact.php">Contato</a></li>
				<?php 
					if(isset($_SESSION['nome'])){
						echo'<li><a href="config.php">'.$_SESSION['nome'].'</a></li>';
						echo '<li><a href="logout.php?in=1"> Sair</a></li>';
					}
					else echo '<li><a href="login.html">Entrar</a></li>';
					if(isset($_SESSION['adm'])){
						echo '<li><a href="foto.php">Criar Eventos</a></li>';
					}
				?>		
			</ul>
		</nav>		<div id="events_bar">
			<form action="upload.php" enctype="multipart/form-data" method="POST" text-align="justify"> <br>
				<?php
				/*
  
	    setcookie('day',$,time()+3600);
	    setcookie('mounth',$c,time()+3600);
	    setcookie('year',$d,time()+3600);
	    setcookie('descr',$e,time()+3600);
	    setcookie('vlr',$f,time()+3600);

				*/
				
				echo'Titulo para o Evento: 
					<br>
					<input type="text" name="titulo"  size="20" ';
					if(isset($_COOKIE['titulo'])){
						echo 'value="'.$_COOKIE['titulo'].'"/>';
					}else echo 'value=""/>';
					if($_GET['er']==1){
						echo'Título não disponível, já existe esse titulo para essa Data';
					}
					echo '<br><br>
				
				Data do evento:
					<br />
					<input type="text" name="dia" size="2" maxlength="2"';
						if(isset($_COOKIE['day'])){
						echo 'value="'.$_COOKIE['day'].'">';
						}else echo 'value="dd">';
					echo'<input type="text" name="mes" size="2" maxlength="2" ';
					if(isset($_COOKIE['mounth'])){
						echo 'value="'.$_COOKIE['mounth'].'">';
					}else echo 'value="mm">';
					echo'<input type="text" name="ano" size="4" maxlength="4"'; 
					if(isset($_COOKIE['year'])){
						echo 'value="'.$_COOKIE['year'].'">';
					}else echo 'value="aaaa">';
					
					if($_GET['er']==2){
						echo'Insira uma data válida';
					}
				echo '				
					<br><br>
				Descrição:
					<br>
					<textarea name="descricao">';
					if(isset($_COOKIE['descr'])){
						echo $_COOKIE['descr'].'';
					}
					echo'
					</textarea>
					<br><br>
				Valor padrão para cada foto:
					<br />
					R$<input type="text" name="valor"';
					if(isset($_COOKIE['vlr'])){
						echo'value="'.$_COOKIE['vlr'].'"/>';
					}else echo' value="01,00"/>';
					echo'
					<br /><br />
					Enviar o arquivo:
					<br><input name="arquivos[]" type=file multiple />
					
					<br><br>
				<input type="submit" value="Criar Evento"/>';
				 	setcookie('titulo',"",time()-1);
				    setcookie('day',"",time()-1);
				    setcookie('mounth',"",time()-1);
				    setcookie('year',"",time()-1);
				    setcookie('descr',"",time()-1);
				    setcookie('vlr',"",time()-1);
				?>
			</form>
		</div>
</body>
</html>
