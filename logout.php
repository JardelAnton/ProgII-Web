<?php

/*--oculto
	é o botão sair.
-*/


session_start();
if(isset($_SESSION['nome'])){
	unset($_SESSION['nome']);
	unset($_SESSION['email']);
	unset($_SESSION['password']);
}
if(isset($_COOKIE["nome"])){
	setcookie("nome",'',time()-3600);
	setcookie("login",'',time()-3600);
	setcookie("password",'',time()-3600);
}
unset($_SESSION['carrinho']);
header("Location: login.php");
?>