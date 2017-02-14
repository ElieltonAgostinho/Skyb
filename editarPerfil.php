<html lang="en">



  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
    <meta name="author" content="Carlos Alvarez - Alvarez.is - blacktie.co">
    <link rel="shortcut icon" href="imgs/logoSky.png" >

    <title> Skyblue </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link href="assets/css/animate-custom.css" rel="stylesheet">


    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">


  <?php
  //INICIO A SESSÃO
  session_start();
   $_SESSION["email"];
  //Verifico se o usuário está logado no sistema
  if (!isset($_SESSION["email"]) ) {
      header("Location: index.html");
  }else{
    $logado = $_SESSION["email"];
  }
  ?>

  <?php 
      include 'assets/php/conexao.php';
      $sql = @mysql_query("SELECT * FROM user WHERE email = '$logado'");

      while ($row = @mysql_fetch_assoc($sql)) {

          $m = $row["email"];

      }
  ?>

  
  
  	<div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href=""><p class = "h1" id = "h1_nav">Skyblue</p></span></a>
        </div>
        <div class="navbar-collapse collapse" id = "menu_home">
          <ul class="nav navbar-nav">
      			<li><p class="smoothScroll"><input type="text" style = "" class="form-control" name = "pesquisa" id="pesquisa" placeholder="Search Your Friends"></p></li>
      			<li> <a href="#" class="smoothScroll" > Configurações</a></li>
      			<li> <a href="assets/php/logout.php" class="smoothScroll"> Sair</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div><br/><br/>
    
    <div class="container" id="contact" name="contact">
      <div class="row">
        <form method = "POST" action = "assets/php/updateData.php" class="form-horizontal" role="form">
            <br>
              <h1 class="centered">Complete Your Profile</h1>
              <hr>
              <br>
              <br>
              <div class="col-lg-4">
                <h3>Contact Information</h3><br/>
                <p><span class="icon icon-home"></span><input type="text" class="form-control" id="addifor" name = "pais" placeholder="Seu País"><br/>
                    <span class="icon icon-home"></span><input type="text" class="form-control" id="addifor" name = "estado" placeholder="Seu Estado"><br/>
                    <span class="icon icon-home"></span><input type="text" class="form-control" id="addifor" name = "cidade" placeholder="Sua Cidade"><br/>
                    <span class="icon icon-home"></span><input type="text" class="form-control" id="addifor" name = "bairro" placeholder="Seu Bairro"><br/>
                    
                </p>
              </div><!-- col -->
              
              <div class="col-lg-4">
                <h3>Profile</h3>
                <br/>
                <p><span class="icon icon-envelop"></span><input type="text" class="form-control" id="addifor" name = "nome" placeholder="Seu Nome"><br/>
                    <span class="icon icon-envelop"></span><input type="text" class="form-control" id="addifor" name = "sobren" placeholder="Seu Sobre nome"><br/>
                    <span class="icon icon-mobile"></span><input type="text" class="form-control" id="addifor" name = "contato" placeholder="Contato"><br/>
                    <span class="icon icon-envelop"></span> <a href="#"> <?php echo $m; ?></a> <br/>

                </p>
              </div><!-- col -->
              
              <div class="col-lg-4">
                <h3>Support Us</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              </div><!-- col -->
            <button type="submit" class="btn btn-success">Save Data</button>
          </form>
      </div><!-- row -->
    
    </div><!-- container -->

	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
  </body>
</html>
