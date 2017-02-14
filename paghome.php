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
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">

     <link href="assets/css/alertify.core.css" rel="stylesheet">
     <link href="assets/css/alertify.default.css" rel="stylesheet">
     <link href="assets/css/alertify.bootstrap.css" rel="stylesheet">


    
   <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'> -->
    
    
    
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
   
  //Verifico se o usuário está logado no sistema
  if (!isset($_SESSION["email"]) ) {
      header("Location: index.html");
  }else{
    $logado = $_SESSION["email"];

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

      

      <?php 
      include 'assets/php/conexao.php';
      $sql = @mysql_query("SELECT * FROM user WHERE email = '$logado' LIMIT 1");

      while ($row = @mysql_fetch_assoc($sql)) {

          $nome = $row["nome"];
          $sob = $row["sobrenome"];
          $foto = $row["foto"];
          $meuId = $row["id"];

          if($foto == ""){

            echo '<li>
                <a href="perfil.php" class="smoothScroll" id = "item_menu">
                  <img src = "assets/img/1447049816_user21.png" class = "fotoPerfil"></a>
              </li>
                  <li><a href="perfil.php" class="smoothScroll">'.$nome.' '.$sob.'
                </a>
              </li>';

          }else{

            echo '<li>
                <a href="perfil.php" class="smoothScroll" id = "item_menu">
                  <img src = "users/'.$logado.'/Fotos/Perfil/'.$foto.'" class = "fotoPerfil"></a>
              </li>
                  <li><a href="perfil.php" class="smoothScroll">'.$nome.' '.$sob.'
                </a>
              </li>';

          }

      }
      ?>

			<li> <a href="#" class="smoothScroll" > Configurações</a></li>
			<li> <a href="assets/php/logout.php" class="smoothScroll"> Sair</a></li>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div><br/>

    <!-- session lado esquerdo-->
    
    <br/>
    <section id = "corpo">
     
       <section id = "menu">

            <ul>
            <li>
              <img src="imgs/1475525276_Feed.png" class = "menuImg"> <a href="paghome.php" class = "menuA">Feed de Notícias</a>
            </li>
            <li>
              <img src="imgs/1475525823_sign-up.png" class = "menuImg"> <a href="perfil.php" class = "menuA">Seu Perfil</a>
            </li>
          </ul>

       </section>
       
       <section id = "feed">
               
            <div id = "pub">
              
              <ul id = "nav-bar"> 
                <li><a href="#t1">Publicar Status</a></li> 
                <li><a href="#t2">Publicar Foto</a></li> 
                <li><a href="#t3">Publicar Arquivo</a></li> 
              </ul> 
              <div id="t1" class = "aba">
                <?php 
                include 'assets/php/conexao.php';
                $sql = @mysql_query("SELECT * FROM user WHERE email = '$logado' LIMIT 1");

                while ($row = @mysql_fetch_assoc($sql)) {
                    $foto = $row["foto"];
                    $idUs = $row["id"];

                    if($foto == ""){

                      echo '<img src = "assets/img/1447049816_user21.png" class = "fotoPerfil">';

                    }else{

                      echo '<img src = "users/'.$logado.'/Fotos/Perfil/'.$foto.'" class = "fotoPerfil">';

                    }

                }
                ?>
                <input type="text" name = "WhatsNewEm" class = "WhatsNewEm" value = "<?php echo $logado; ?>" Style = "display:none;">
                <input type="text" id = "" name = "texto" style = "" class = "WhatsNew" placeholder="What's New?" alt = "Quais as novidades">
                
              </div> 
              <div id="t2" class = "aba">

                <form id="upload" action="assets/php/uploadPOSTFOTO.php" method="post" enctype="multipart/form-data">
                    <label>*Somente Fotos com extensão '.jpg'</label> <span id="status" style="display: none;"><img src="image/loader.gif" alt="Enviando..." /></span> <br />
                    <center><input type="file" name="arquivo" id="arquivo" class = "btn"/></center>
                    <input type = "submit" class = "btn">
                </form>

              </div> 
              <div id="t3" class = "aba">

                <form id="upload" action="assets/php/uploadPOSTARQUIVO.php" method="post" enctype="multipart/form-data">
                     <label>*Somente Arquivos com extensão '.doc, .txt, .pdf, .docx'</label> <span id="status" style="display: none;"><img src="image/loader.gif" alt="Enviando..." /></span> <br />
                    <center><input type="file" name="arquivo" id="arquivo" class = "btn"/></center>
                    <input type = "submit" class = "btn">
                </form>

              </div>
           </div>
           <br/>
           <?php 
                        include 'assets/php/conexao.php';
                        $sql = @mysql_query("SELECT * FROM postagens WHERE Iduser != '' ORDER BY id DESC");

                        while ($row = @mysql_fetch_assoc($sql)) {

                            $user_post = $row["Iduser"];
                            $texto = $row["texto"];
                            $foto = $row["foto"];
                            $arq = $row["arquivo"];

                           
                        ?>
           <div id = "publicacoes">

              <div id = "fed">
                  
                  <div id = "topo">

                     <?php 
                        include 'assets/php/conexao.php';
                        $sqll = @mysql_query("SELECT * FROM user WHERE email = '$user_post'");

                        while ($roww = @mysql_fetch_assoc($sqll)) {

                            $nome = $roww["nome"];
                            $sob = $roww["sobrenome"];
                            $UserFoto = $roww["foto"];
                            $meuId = $roww["id"];
                            $emailUser = $roww["email"];

                            if($UserFoto == ""){

                              echo '
                                  <a href="#" class="smoothScroll" id = "item_menu">
                                    <img src = "assets/img/1447049816_user21.png" class = "fotoPerfil"></a>
                                
                                    <a href="#" class="smoothScroll">'.$nome.' '.$sob.'
                                  </a>
                                ';

                            }else{

                              echo '
                                  <a href="#" class="smoothScroll" id = "item_menu">
                                    <img src = "users/'.$emailUser.'/Fotos/Perfil/'.$UserFoto.'" class = "fotoPerfil"></a>
                                
                                    <a href="#" class="smoothScroll">'.$nome.' '.$sob.'
                                  </a>
                                ';

                            }

                        }
                        ?>

                  </div>
                  <div id = "body">
                    
                     <?php

                        if($texto == "" && $foto == ""){
                            echo '<iframe src  = "users/'.$emailUser.'/Fotos/Postagens/'.$arq.'" width="100%" height="500" style = "border:0;"></iframe>';
                        }else{
                          if($arq == "" && $foto == ""){
                            echo $texto;
                          }else{
                            if($texto == "" && $arq == ""){
                                echo '<img src = "users/'.$emailUser.'/Fotos/Postagens/'.$foto.'" height = "500px">';
                            }
                          }

                        }

                     ?>
                  </div>
                  <div id = "rodape">

                    <button class = "btn" style = "margin-left: -590px;">Curtir</button>
                    <button class = "btn">Comentar</button>

                  </div>
                  
              </div>

           </div>
           <?php echo "<br/>";} ?>
       </section>
        <span class = "user_online" id = "<?php echo $meuId; ?>"></span>
       <section id = "batepapo">
        
          <ul>
            <?php 
              include 'assets/php/conexao.php';
              $sql = @mysql_query("SELECT * FROM user WHERE id != '$meuId' ");

              while ($row = @mysql_fetch_assoc($sql)) { 
            ?>
            <li id = "<?php echo $row['id']; ?>">
              <div class = "imgSmall">
                <?php 

                    if($row['foto'] == ""){
                      $urlfoto = "assets/img/1447049816_user21.png";
                    }else{
                      $urlfoto = "users/".$row['email']."/Fotos/Perfil/".$row['foto']."";
                    }

                 ?>
                <img src = "<?php echo $urlfoto; ?>" border ="0">
              </div>
              <a href="#" id = "<?php echo $meuId; ?>:<?php echo $row['id']; ?>" class = "comecar"><?php echo $row['nome']." ".$row["sobrenome"]; ?></a>
              <span id ="<?php echo $row['id']; ?>" class = "status <?php echo $row['visibilidade']; ?>"></span>
            </li>
          <?php }  ?>
          </ul>

       </section>

  </section>

  <aside id = "chats"></aside>

    <!-- session lado esquerdo-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		
    <script src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
  
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
  <script type="text/javascript" src="assets/js/js.js"></script>
  </body>
</html>