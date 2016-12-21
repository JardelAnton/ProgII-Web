<?php
	require "conexao.php";
	session_start();
	
	    $a=$_POST["titulo"];
	    $b=$_POST["dia"];
	    $c=$_POST["mes"];
	    $d=$_POST["ano"];
	    $e=$_POST["descricao"];
	    $f=$_POST['valor'];
	    $x=('Amostras/'.$a.'-'.$b.'-'.$c.'-'.$d);

	    setcookie('titulo',$a,time()+3600);
	    setcookie('day',$b,time()+3600);
	    setcookie('mounth',$c,time()+3600);
	    setcookie('year',$d,time()+3600);
	    setcookie('descr',$e,time()+3600);
	    setcookie('vlr',$f,time()+3600);

	    if(file_exists($x)){
	    	header("Location: foto.php?er=1");
	    	echo 'titulo não disponivel';
		}elseif ($b=='dd'||$c=='mm'||$d=='aaaa') {
			header("Location: foto.php?er=2");
		}else{
			if(mkdir('Amostras/'.$a.'-'.$b.'-'.$c.'-'.$d)){
	    	echo 'pasta criada';
			}
		$dest = ('Amostras/'.$a.'-'.$b.'-'.$c.'-'.$d.'/');
		echo $dest;
		$i = 0;
		 	$x=$_SESSION['adm'];
		$insere = "INSERT INTO `eventos`(`id_usuario`, `ano`, `mes`,`dia`,`url`,`nome`,`descricao`) VALUES ('$x','$d','$c','$b','$dest','$a','$e')";
		mysql_query($insere) or die("Nao inserido."); 
		
		$busca= "SELECT * FROM `eventos` WHERE `id_usuario`='$x' AND `nome`='$a'";
		$resultado = mysql_query($busca,$conexao);
		$linha = mysql_fetch_array($resultado);
		echo'<br>';
		$x=$linha['id'];
		echo $x;
		foreach ($_FILES["arquivos"]["error"] as $key => $error) {
	    	$destino = $dest. $_FILES["arquivos"]["name"][$i];
	    	$a_nome=$_FILES["arquivos"]["name"][$i];
	    	if(move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i], $destino )){
	    		echo $a_nome;
	    		$insere = "INSERT INTO `upload`(`id_eventos`,`url`, `nome`, `descricao`, `valor`) VALUES ('$x','$dest','$a_nome','$e','$f')";
				mysql_query($insere) or die("Nao inserido."); 
	    		echo "<br>	Arquivo Enviado";
	    		echo'<br>';
	    	}
	    	else echo "Arquivo não Enviado";
	    	$i++;
	    }
	    foreach ($_FILES["arquivos"]["error"] as $key => $error) {
	    	$destino = $dest. $_FILES["arquivos"]["name"][$i];
	    	$a_nome=$_FILES["arquivos"]["name"][$i];
	    	if(move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i], $destino )){
	    		echo $a_nome;
	    		$insere = "INSERT INTO `upload`(`id_eventos`,`url`, `nome`, `descricao`, `valor`) VALUES ('$x','$dest','$a_nome','$e','$f')";
				mysql_query($insere) or die("Nao inserido."); 
	    		echo "<br>	Arquivo Enviado";
	    		echo'<br>';
	    	}
	    	else echo "Arquivo não Enviado";
	    	$i++;
	    }
	
	
	
	
	header("Location: index.php");
}

?>



<?php 
	$path = "arquivos/";
 	$diretorio = dir($path);
  	echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
   	while($arquivo = $diretorio -> read()){
    	echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
    }
    $diretorio -> close(); 
?>	