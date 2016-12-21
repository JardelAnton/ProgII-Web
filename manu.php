<?php
	require "conexao.php";
	session_start();
	$manutem=$_POST['senha1'];
	if($manutem==$_SESSION['password']){


	if(isset($_POST['nome'])){
		$nome=$_POST['nome'];
	}
	if(isset($_POST['email'])){
		$email=$_POST['email'];
	}
	if(isset($_POST['senha'])){
		if($_SESSION['password']==$post['senha1']){
			$senha=$_POST['senha'];
		}else $senha=$_SESSION['password'];
	}
	$name=$_SESSION['nome'];
	$e_mail=$_SESSION['email'];
	$pass=$_SESSION['password'];


	$query = "SELECT * FROM `users` WHERE email = '$e_mail' AND senha ='$pass'";
	$resultado = mysql_query($query,$conexao); 
	$linha = mysql_fetch_array($resultado);

	$id=$linha['id'];
	$query=("UPDATE `users` SET `nome`='$nome',`senha`='$senha',`email`='$email' WHERE id='$id'");
	$resultado = mysql_query($query,$conexao); 
	echo $linha['id'];

		$_SESSION['nome'] = $nome;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $senha;
	header("Location: config.php");
}
else{
		header("Location: manu.php");
}
?>