

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Photography</title>
    <link rel="shortcut icon" href="img/team/5.png">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
        <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                <h4><font color='red'><img src="img/team/5.png" style="float:left; margin-right: 10px; margin-top: -10px" width="40" higth="40" /> PHOTOGRAPHY</font></span></h4>
                
                </a>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php?#about">Eventos</a></li>
               	<li><a href="carrinho.html">Carrinho</a></li>
                <li><a href="logout.php">Sair</a></li>
                </li>
              </ul>
            </div>
            </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
		
			<h2><span class="text_color"><font color='red'>PHOTOGRAPHY</font></span> </h2>
		</div>
		
		
	
			
		</div id="formperfil">
		<div>
			<form>
				<?php
				echo 'Nome:  <input type="text" size="20" maxlength="80" value="'.$_COOKIE['nome'].'"/><br />';
				//placeholder="Digite seu nome"*/
				echo 'E-mail: <input type="text" size="20" maxlength="80" value="'.$_COOKIE['login'].'"/><br />';
				//placeholder="Digite seu e-mail" 
				echo'Senha:<input type = "password" placeholder="Digite sua senha" name= "senha1" >	<br />';
				echo '<h5 text-color="red">Para alterar algum dado é obrigatório a inserção da senha.</h5><br />';
				echo'Senha: <input type = "password" placeholder="Sua nova senha" name= "senha" >	<br /><br />';

				?>
			</form>
		</div>
		</div>
		
    </section>
	<!-- /Section: intro -->

	
    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>

</body>

</html>
