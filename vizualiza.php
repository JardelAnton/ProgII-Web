<?php
	require "conexao.php";
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Eventos</title>
		<link rel="stylesheet" type="text/css" href="style.css" />	
		<meta http-equiv="refresh" content="5;URL=http://www.portaldaprogramacao.com"/> 
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
					elseif (isset($_COOKIE['nome'])) {
						echo'<li><a href="config.php">'.$_SESSION['nome'].'</a></li>';
						echo '<li><a href="logout.php?in=1"> Sair</a></li>';
						}
					else echo '<li><a href="login.html">Entrar</a></li>';
					if(isset($_SESSION['adm'])){
						echo '<li><a href="foto.php">Criar Eventos</a></li>';
					}
				?>		
			</ul>
		</nav>
		
		<div id="log_shop">			
			<?php
				if (isset($_COOKIE["nome"]) || isset($_SESSION['nome'])) {//verifica se existe Session ou Cookie pelos quais o usuário esteja logado.
					/*mostra o form para login ou link para cadastro*/
					echo '
						<form id="carrinho" action"carrinho.php" method="POST">
							<fieldset><legend>Seu Carrinho:</legend>
								<input type="checkbox" name="$fotp"/>
								<input type="checkbox" name="$fotp"/>
								<input type="checkbox" name="$fotp"/>
								<input type="checkbox" name="$fotp"/>
								<input type="checkbox" name="$fotp"/>
								<input type="checkbox" name="$fotp"/>
							</fieldset>
						</form>
					';
				}else{/*mostra o que está dentro do carrinho */
					echo '
						<form nome="Cadastro" action="login.php" method="post">
						  	<fieldset>
							    <legend> LOGIN   </legend>				
								E-mail:<input type = "text" name = "email" onblur="javascript:verifica_email()"/><br /> 
								Senha:  <input type = "password" name= "senha" />	<br />
								<a href="cadastro.html">Não tenho cadastro</a>
								<input type = "submit" name= "submit" value = "Entrar" /><br>
								<br>
								Manter Conectado<input type="checkbox" name="lembrar" />
								<br /><br />
								Entrar com:
								<div id="acesso" weidht="10px" height="10px">
									<a href="">facebook</a> <a href="">Twiter</a> <a href="">gmail</a>
								</div>
						  	</fieldset>
						</form>
					';
				}
			?>			
		</div>

		<div id="cadastro">
			
				
					<?php 

						$pasta=$_GET['past'];
						$foto=$_GET['no'];
						$bla=$_GET['bl'];					
						if(isset($_GET['co'])){
							$com=$_GET['co'];							
							if($com==1){
								$x=$_SESSION['email'];
								$busca= "SELECT * FROM `users` WHERE `email`='$x'";
								$resultado = mysql_query($busca,$conexao);
								$linha = mysql_fetch_array($resultado);
								$d1=$linha['id'];

								$photo=$foto.' ('.$bla.').jpg';
								$busca= "SELECT * FROM `upload` where `url`='$pasta' AND `nome`='$photo'";
								$resultado = mysql_query($busca,$conexao);
								$tupla = mysql_fetch_array($resultado);
								$id= $tupla['id'];
								echo $id;
								if(isset($_SESSION['carrinho'][$id])){
									echo 'ja existe';
									echo "removido";															
										$remove="DELETE FROM `carrinho` WHERE `id_upload`='$id' AND `id_usuario`='$d1'";
										mysql_query($remove) or die("Nao removido.");		
								}else{								
									$busca= "SELECT * FROM `carrinho` where `id_usuario`='$d1' AND `id_upload`='$id'";
									$resultado = mysql_query($busca,$conexao);
									$ex = mysql_num_rows($resultado);
									if(!$ex){											
										$_SESSION['carrinho'][$id] = 1;
										$insere="INSERT INTO `carrinho`(`id_usuario`, `id_upload`) VALUES ('$d1','$id')"; 
										mysql_query($insere) or die("Nao inserido.");		
									}
								}
							}
						}

						$busca= "SELECT * FROM `upload` where `url`='$pasta'";
						$resultado = mysql_query($busca,$conexao);
						$i = mysql_num_rows($resultado);
						$linha = mysql_fetch_array($resultado);
						$buscas= "SELECT * FROM `eventos` where `url`='$pasta'";
						$resultados = mysql_query($buscas,$conexao);
						$is = mysql_num_rows($resultados);
						$linhas = mysql_fetch_array($resultados);
						
						if($i==0){
							echo '<p>Ainda não há fotos, aguarde...</p>';
						}else{
							echo '<img src="'.$pasta.$foto.' ('.$bla.').jpg" height="400px" weidht="300px"></img>';							
							$bla1=$bla+1;
							$bla0=$bla-1;
							$x=($linhas['url'].$linhas['nome'].' ('.$bla0.').jpg');
							if(!file_exists($x)){
								$bla0=$i;
							}
							echo'<a href="visualiza.php?past='.$linha['url'].'&no='.$linhas['nome'].'&bl='.$bla0.'&co=0" alt='.$linha['nome'].'><img src="'.$linhas['url'].$linhas['nome'].' ('.$bla0.').jpg"height="50px" weidht="50px"></img></a>';
							echo'<a href="visualiza.php?past='.$linha['url'].'&no='.$linhas['nome'].'&bl='.$bla.'&co=1" align="right">Comprar</a>';
							$x=($linhas['url'].$linhas['nome'].' ('.$bla1.').jpg');
							if(!file_exists($x)){
								$bla1=1;
							}

							echo'<a href="visualiza.php?past='.$linha['url'].'&no='.$linhas['nome'].'&bl='.$bla1.'&co=0" alt='.$linha['nome'].'><img src="'.$linhas['url'].$linhas['nome'].' ('.$bla1.').jpg"height="50px" weidht="50px"></img></a>';
							echo '<br><br>';
							for($b=1;$b<=$i;$b++){	
								echo'<a href="visualiza.php?past='.$linhas['url'].'&no='.$linhas['nome'].'&bl='.$b.'" alt='.$linha['nome'].'><img src="'.$linhas['url'].$linhas['nome'].' ('.$b.').jpg"height="50px" weidht="50px"></img></a>';
							}								
						}
					?>					
					
		</div>

		<?php echo $_COOKIE["login"]; 
		echo '<br>'.$_SESSION['nome'].'<br>';
		echo $_SESSION['email'];?>
	</body>	
</html>