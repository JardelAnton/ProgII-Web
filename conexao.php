<?php
	$host = "127.0.0.1";
	$bd = "ola";
	$user = "root";
	$pass = "";

	//Dentro do Cloud9, não usar root, usar o nome do usuário que hospeda o projeto:
	$user = "duanps";
	$pass = "";
	
	$conexao = mysql_connect($host,$user,$pass) or die(mysql_error());
	mysql_select_db($bd,$conexao);


	session_start();

	if(isset($_COOKIE['login']) && isset($_COOKIE['password'])){//se existe COOKIE faz login atraves dele e mantem em SESSION enquanto o navegador estiver aberto
		$email = $_COOKIE['login'];
		$senha = $_COOKIE['password'];
		$_SESSION['email'] = $_COOKIE['login'];
		$_SESSION['password'] = $_COOKIE['password'];
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

		$_SESSION['nome'] = $_nome;	
	}

	error_reporting(0);
	ini_set('display_errors', 0 );
?>