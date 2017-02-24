<?php 

/***********************************************************/
include 'dbc.php';

$err = array();

foreach($_GET as $key => $value) {
	$get[$key] = filter($value); //get variables are filtered.
}

if (isset($_POST['doLogin']) =='Login')
{

foreach($_POST as $key => $value) {
	$data[$key] = filter($value); // post variables are filtered
}


$email = $data['usr_email'];
$pass = $data['password'];


if (strpos($email,'@') === false) {
    $user_cond = "username='$email'";
} else {
      $user_cond = "email='$email'";
    
}

	
$result = mysql_query("SELECT `id`,`password`,`name`,`approved`,`group_id` FROM users WHERE 
           $user_cond
			AND `banned` = '0'
			") or die (mysql_error()); 
$num = mysql_num_rows($result);

  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num > 0 ) { 
	
	list($id,$password,$name,$approved,$group_id) = mysql_fetch_row($result);
	
	if(!$approved) {
	//$msg = urlencode("Account not activated. Please check your email for activation code");
	$err[] = "Account not activated. Please check your email for activation code";
	
	//header("Location: login.php?msg=$msg");
	 //exit();
	 }
	 
		//check against salt
	if ($password === passwordHash($pass,substr($password,0,9))) { 
	if(empty($err)){			

     // this sets session and logs user in  
       session_start();
	   session_regenerate_id (true); //prevent against session fixation attacks.

	   // this sets variables in the session 
		$_SESSION['id']= $id;  
		$_SESSION['username'] = $name;
		$_SESSION['group_id'] = $group_id;
		$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
		
		//update the timestamp and key for cookie
		$stamp = time();
		$ckey = GenKey();
		mysql_query("update users set `ctime`='$stamp', `ckey` = '$ckey' where id='$id'") or die(mysql_error());
		
		//set a cookie 
		
	   if(isset($_POST['remember'])){
				  setcookie("id", $_SESSION['id'], time()+60*60*24*COOKIE_TIME_OUT, "/");
				  setcookie("user_key", sha1($ckey), time()+60*60*24*COOKIE_TIME_OUT, "/");
				  setcookie("username",$_SESSION['username'], time()+60*60*24*COOKIE_TIME_OUT, "/");
				   }
		  header("Location: myaccount.php");
		 }
		}
		else
		{
		//$msg = urlencode("Invalid Login. Please try again with correct user email and password. ");
		$err[] = "Invalid Login. Please try again with correct user email and password.";
		//header("Location: login.php?msg=$msg");
		}
	} else {
		$err[] = "Error - Invalid login. No such user exists";
	  }		
}
					 
					 

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sporto - Login</title>
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
    $("#logForm").validate();
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
				<h2>Login</h2>
				<hr>
			</div>
			
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main center">
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="160" valign="top"><p>&nbsp;</p>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Login Users 
      </h3>  
	  <p>
	  <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	  if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "$e <br>";
	    }
	  echo "</div>";	
	   }
	  /******************************* END ********************************/	  
	  ?></p>
      <form action="login.php" method="post" name="logForm" id="logForm" class="center" >
        <table width="65%" border="0" cellpadding="4" cellspacing="4" class="loginform text-center">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="28%">Username / Email</td>
            <td width="72%"><input name="usr_email" type="text" class="required" id="txtbox" size="25"></td>
          </tr>
          <tr> 
            <td>Password</td>
            <td><input name="password" type="password" class="required password" id="txtbox" size="25"></td>
          </tr>
          <tr> 
            <td colspan="2"><div align="center">
                <input name="remember" type="checkbox" id="remember" value="1">
                Remember me</div></td>
          </tr>
          <tr> 
            <td colspan="2"> <div align="center"> 
                <p> 
                  <input name="doLogin" type="submit" id="doLogin3" value="Login">
                </p>
                <p><a href="register.php">Register Free</a><font color="#FF6600"> 
                  |</font> <a href="forgot.php">Forgot Password</a> <font color="#FF6600"> 
                  </font></p>
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
