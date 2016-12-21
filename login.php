<?php

/*--oculto-*/


	require "conexao.php";
	session_start();
	
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$result = mysql_query("SELECT * FROM `users` WHERE email = '$email' AND senha ='$senha'",$conexao);
	$retorna=mysql_num_rows($result);

	$busca = "SELECT * FROM `users` WHERE email = '$email' AND senha ='$senha'";
	$resultado = mysql_query($busca,$conexao); 
	$linha = mysql_fetch_array($resultado);
	$_nome=$linha['nome'];
	$code = $linha['code'];
	if($code=='1'){
		$_SESSION['adm'] =$linha['id'];
	}else unset($_SESSION['adm']);
	
	
	if($retorna == 1){	
		if(isset($_POST["lembrar"])){
			setcookie("nome",$_nome,time()+3600);
			setcookie("login",$email,time()+3600);
			setcookie("password",$senha,time()+3600);
			
		}

		$_SESSION['nome'] = $_nome;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $senha;
		header("Location: index.php");
	}else{
		echo "Senha ou E-mail incorretos";	
		header("Location: login.html");
	}
?>