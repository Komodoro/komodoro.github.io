<?php 
include 'dbc.php';
page_protect();


?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sporto - Minha Conta</title>
    <meta name="description" content="Empresa de Eventos Desportivos">
    <meta name="keywords" content="sporto, eventos, desporto, corrida, trail, running,">
    <meta name="author" content="Pedro Pereira, sporto.com">
    <meta property="og:image" content="" />
	<meta property="og:description" content="Website da Empresa Sporto. Sporto é a página de Eventos Desportivos para Si" />
	<meta property="og:url"content="" />
	<meta property="og:title" content="Sporto" />

    
    <!-- Favicons
    ================================================== -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.2.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">


    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="js/modernizr.custom.js"></script>
  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a  href="../" class="navbar-brand">Sporto</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
		            <li><a href="#home" class="page-scroll">Home</a></li>
		            
			     
				    <li><a href="#eventos" class="page-scroll">Eventos</a></li>
					<?php if (isset($_SESSION['id'])) {?>
					<li class='page-scroll'>
						   <!--<a href='#' data-toggle='dropdown'><?php// echo $_SESSION['username'];?></a>
							    <ul class='dropdown-menu'>
							      	<li><a href='myaccount.php'>Área do Utilizador</a></li>
					          		<li><a href='mysettings.php'>Definições Pessoais</a></li>
									
									<li><a href='logout.php'>Logout</a></li>
							    </ul> -->
								<li><a href='myaccount.php' class="page-scroll">Área do <?php echo $_SESSION['username'];?></a></li>
					          	<li><a href='mysettings.php' class="page-scroll">Definições Pessoais</a></li>
								<li><a href='logout.php'>Logout</a></li>
								
								
								<?php 
								
								}
								
								?>
									
									<?php 
										if (checkAdmin()) {
										
										?>
										<li><a href='admin.php' class="page-scroll">Only Admin can see</a></li>
									<?php } ?>
		            </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>					
	<div id="">
        <div class="container text-center">
            <div class="section-title">
                <h4 style="color:black">Página Pessoal de <?php echo $_SESSION['username'];?> </h4>
                <hr>
            </div>
        </div>
    </div>					

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="160" valign="top">
<?php 
/*********************** MYACCOUNT MENU ****************************
This code shows my account menu only to logged in users. 
Copy this code till END and place it in a new html or php where
you want to show myaccount options. This is only visible to logged in users
*******************************************************************/
if (isset($_SESSION['user_id'])) {?>
<div class="myaccount">
  <p><strong>My Account</strong></p>
  <a href="myaccount.php">My Account</a><br>
  <a href="mysettings.php">Settings</a><br>
    <a href="logout.php">Logout </a>
	
  <p>You can add more links here for users</p></div>
<?php }?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Welcome <?php echo $_SESSION['username'];?></h3>  
	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	  
	  ?>
      <p>This is the my account page</p>

	 
      </td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

</body>
</html>
