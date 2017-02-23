<?php 
/********************** MYSETTINGS.PHP**************************
This updates user settings and password
************************************************************/
include 'dbc.php';
page_protect();

$err = array();
$msg = array();

if (isset($_POST['doUpdate']) == 'Update')  
{


$rs_password = mysql_query("select password from users where id='$_SESSION[user_id]'");
list($old) = mysql_fetch_row($rs_password);
$old_salt = substr($old,0,9);

//check for old password in md5 format
	if($old === passwordHash($_POST['password_old'],$old_salt))
	{
	$newsha1 = passwordHash($_POST['password_new']);
	mysql_query("update users set password='$newsha1' where id='$_SESSION[user_id]'");
	$msg[] = "Your new password is updated";
	//header("Location: mysettings.php?msg=Your new password is updated");
	} else
	{
	 $err[] = "Your old password is invalid";
	 //header("Location: mysettings.php?msg=Your old password is invalid");
	}

}

if (isset($_POST['doSave']) == 'Save')  
{
// Filter POST data for harmful code (sanitize)
foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}


mysql_query("UPDATE users SET
			`name` = '$data[name]',
			`address` = '$data[address]',
			`tel` = '$data[tel]',
			`fax` = '$data[fax]',
			`country` = '$data[country]',
			`website` = '$data[web]'
			 WHERE id='$_SESSION[user_id]'
			") or die(mysql_error());

//header("Location: mysettings.php?msg=Profile Sucessfully saved");
$msg[] = "Profile Sucessfully saved";
 }
 
$rs_settings = mysql_query("select * from users where id='$_SESSION[user_id]'"); 
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sporto - Definições do Utilizador</title>
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
    $("#myform").validate();
	 $("#pform").validate();
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
                
                <a  href="index.php" class="navbar-brand">Sporto</a>
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
                <h4 style="color:black">Página Definições de <?php echo $_SESSION['username'];?> </h4>
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
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top">
<h3 class="titlehdr">Definições de conta</h3>
      <p> 
        <?php	
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* Error - $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }
	  ?>
      </p>
      <p>Here you can make changes to your profile. Please note that you will 
        not be able to change your email which has been already registered.</p>
	  <?php while ($row_settings = mysql_fetch_array($rs_settings)) {?>
      <form action="mysettings.php" method="post" name="myform" id="myform">
        <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3" class="forms">
          <tr> 
            <td colspan="2"> Nome<br> <input name="name" type="text" id="name"  class="required" value="<?php echo $row_settings['name']; ?>" size="50"> 
              <span class="example">Nome</span></td>
          </tr>
          <tr> 
            <td colspan="2">Morada <span class="example">(Morada Completa com Codigo Postal)</span><br> 
              <textarea name="address" cols="40" rows="4" class="required" id="address"><?php echo $row_settings['address']; ?></textarea> 
            </td>
          </tr>
          <tr> 
            <td>País</td>
            <td><input name="country" type="text" id="country" value="<?php echo $row_settings['country']; ?>" ></td>
          </tr>
          <tr> 
            <td width="27%">Telefone</td>
            <td width="73%"><input name="tel" type="text" id="tel" class="required" value="<?php echo $row_settings['tel']; ?>"></td>
          </tr>
          <tr> 
            <!--<td>Fax</td>
            <td><input name="fax" type="text" id="fax" placeholder="First name goes here" value="<?php// echo $row_settings['fax']; ?>"></td>
          </tr>-->
          <tr> 
            <td>Website</td>
            <td><input name="web" type="text" id="web" placeholder="First name goes here" value="<?php echo $row_settings['website']; ?>" <!--class="optional defaultInvalid url"--> 
              <span class="example">Example: http://www.domain.com</span></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>User Name</td>
            <td><input name="username" type="text" id="web2" value="<?php echo $row_settings['username']; ?>" disabled></td>
          </tr>
          <tr> 
            <td>Email</td>
            <td><input name="email" type="text" id="web3"  value="<?php echo $row_settings['email']; ?>" disabled></td>
          </tr>
        </table>
        <p align="center"> 
          <input name="doSave" type="submit" id="doSave" value="Save">
        </p>
      </form>
	  <?php } ?>
      <h3 class="titlehdr">Change Password</h3>
      <p>If you want to change your password, please input your old and new password 
        to make changes.</p>
      <form name="pform" id="pform" method="post" action="">
        <table width="80%" border="0" align="center" cellpadding="3" cellspacing="3" class="forms">
          <tr> 
            <td width="31%">Old Password</td>
            <td width="69%"><input name="password_old" type="password" class="required password"  id="password_old"></td>
          </tr>
          <tr> 
            <td>New Password</td>
            <td><input name="password_new" type="password" id="password_new" class="required password"  ></td>
          </tr>
        </table>
        <p align="center"> 
          <input name="doUpdate" type="submit" id="doUpdate" value="Update">
        </p>
        <p>&nbsp; </p>
      </form>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
	   
      <p align="right">&nbsp; </p></td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

</body>
</html>
