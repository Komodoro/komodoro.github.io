<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'dbc.php';

foreach($_GET as $key => $value) {
	$get[$key] = filter($value);
}

/******** EMAIL ACTIVATION LINK**********************/
if(isset($get['user']) && !empty($get['activ_code']) && !empty($get['user']) && is_numeric($get['activ_code']) ) {

$err = array();
$msg = array();

$user = mysql_real_escape_string($get['user']);
$activ = mysql_real_escape_string($get['activ_code']);

//check if activ code and user is valid
$rs_check = mysql_query("select id from users where md5_id='$user' and activation_code='$activ'") or die (mysql_error()); 
$num = mysql_num_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Desculpe. Não existe essa conta ou codigo de actiação inválido.";
	header("Location: activate.php?msg=$msg");
	exit();
	}

if(empty($err)) {
// set the approved field to 1 to activate the account
$rs_activ = mysql_query("update users set approved='1' WHERE 
						 md5_id='$user' AND activation_code = '$activ' ") or die(mysql_error());
$msg[] = "Obrigado, a sua conta foi activada.";
header("Location: activate.php?done=1&msg=$msg");						 
exit();
 }
}

/******************* ACTIVATION BY FORM**************************/
if ($_POST['doActivate']=='Activate')
{
$err = array();
$msg = array();

$email = mysql_real_escape_string($_POST['email']);
$activ = mysql_real_escape_string($_POST['activ_code']);
//check if activ code and user is valid as precaution
$rs_check = mysql_query("select id from users where email='$email' and activation_code='$activ'") or die (mysql_error()); 
$num = mysql_num_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Desculpe. Não existe essa conta ou codigo de actiação inválido.";
	header("Location: activate.php?msg=$msg");
	exit();
	}
//set approved field to 1 to activate the user
if(empty($err)) {
	$rs_activ = mysql_query("update users set approved='1' WHERE 
						 email='$email' AND activation_code = '$activ' ") or die(mysql_error());
	$msg[] = "Obrigado, a sua conta foi activada.";
 }
header("Location: activate.php?msg=$msg");						 
exit();
}

	

?>
<html>
<head>
<title>User Account Activation</title>

</head>


<!DOCTYPE html>
<html lang="pt">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sporto - Activação de Conta</title>
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
	<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
	  <script>
	  $(document).ready(function(){
		$("#actForm").validate();
	  });
	  </script>
<link href="styles.css" rel="stylesheet" type="text/css">
  
  </head>

<body>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Sporto</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
		            <li><a href="#body" class="page-scroll">Home</a></li>
				    <li><a href="#eventos" class="page-scroll">Eventos</a></li>
				    <li><a href="login.php" class="page-scroll">Login</a></li>
				    <li><a href="register.php" class="page-scroll">Registo</a></li>
				    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
<div id='body' class="container text-center">  
			<div class="section-title">
				<h2>Activação de Conta</h2>
				<hr>
			</div>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="160" valign="top"><p>&nbsp;</p>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top">
<h3 class="titlehdr">Activação de Conta</h3>

      <p> 
        <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }	
	  /******************************* END ********************************/	  
	  ?>
      </p>
      <p>Por favor introduza e codigo de activação que foi enviado por email para activar a conta.
	  Assim que a conta estiver activa poderá fazer
        <a href="login.php">login aqui</a>.</p>
	 
      <form action="activate.php" method="post" name="actForm" id="actForm" >
        <table width="65%" border="0" cellpadding="4" cellspacing="4" class="loginform">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="36%">Your Email</td>
            <td width="64%"><input name="email" type="text" class="required email" id="txtboxn" size="25"></td>
          </tr>
          <tr> 
            <td>Activation code</td>
            <td><input name="activ_code" type="password" class="required" id="txtboxn" size="25"></td>
          </tr>
          <tr> 
            <td colspan="2"> <div align="center"> 
                <p> 
                  <input name="doActivate" type="submit" id="doLogin3" value="Activate">
                </p>
              </div></td>
          </tr>
        </table>
        <div align="center"></div>
        <p align="center">&nbsp; </p>
      </form>
	  
      <p>&nbsp;</p>
	 
      </td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>
