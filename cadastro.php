<?php

/*--oculto*/


	require "conexao.php";
	session_start();

	$_nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha1"];
	if(isset($_POST["code"])){
		$adm=$_POST["code"];
		if($adm == 1234){
			$adm=1;
		}else $adm=0;
	}else $adm=0;

	//$conexao = mysql_connect($host,$user,$pass) or die(mysql_error());
	//mysql_select_db($bd,$conexao);

	$insere = "INSERT INTO `users`(`nome`, `senha`, `email`,`code`) VALUES ('$_nome','$senha','$email','$adm')";
	mysql_query($insere) or die("Nao inserido."); 
	
		$_SESSION['nome'] = $_nome;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $senha;

	header("Location: login.html");
?>