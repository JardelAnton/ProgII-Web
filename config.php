<?php

/*--mostra-*/


require "conexao.php";
session_start();
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
		<?php $a=rand(0,2);
		echo'<div id="log_shop" style="background-image: url(Duan'.$a.'.jpg);widht:200px; height=100%">';
		?>
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
				echo '<form nome="Cadastro" action="login.php" method="post">
			  	<fieldset>
				    <legend> LOGIN   </legend>				
					E-mail:<input type = "text" name = "email" onblur="javascript:verifica_email()"/><br /> 
					Senha:<input type = "password" name= "senha" />	<br />
					<a href="cadastro.html">Não tenho cadastro</a>
					<input type = "submit" name= "submit" value = "Entrar" />
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

		<div id="events_bar" >
			<ul>
				<li>
						<form action="manu.php" method="POST"  >
						Nome: <input type="text" name="nome" value="<?php echo $_SESSION['nome'];?>" size="50" /><br><br>
						E-mail:<input type="text" name="email" value="<?php echo $_SESSION['email'];?>" size="50"/><br><br>
						Nova Senha: <input type="password" name="senha" size="20"/><br><br>
						Senha Atual:<input type="password" name="senha1" size="20"/><br><br>
						<script type="text/javascript">
						 var comfirm=prompt("Confirme sua Senha:");
						</script>
						$confirma="<script>document.write(confirm)</script>";
						<input type="submit" name="alterar" value="Salvar Alterações"/> 
						</form>
					</table>
				</li>	
		</div>

	</body>	
</html>
