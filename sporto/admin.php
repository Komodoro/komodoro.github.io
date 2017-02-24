<?php 
include 'dbc.php';
page_protect();

if(!checkAdmin()) {
header("Location: login.php");
exit();
}

$page_limit = 10; 


$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$login_path = @ereg_replace('admin','',dirname($_SERVER['PHP_SELF']));
$path   = rtrim($login_path, '/\\');

// filter GET values
foreach($_GET as $key => $value) {
	$get[$key] = filter($value);
}

foreach($_POST as $key => $value) {
	$post[$key] = filter($value);
}

if (isset($post['doBan']) == 'Ban') {

if(!empty($_POST['u'])) {
	foreach ($_POST['u'] as $uid) {
		$id = filter($uid);
		mysql_query("update users set banned='1' where id='$id' and `username` <> 'admin'");
	}
 }
 $ret = $_SERVER['PHP_SELF'] . '?'.$_POST['query_str'];;
 
 header("Location: $ret");
 exit();
}

if (isset($_POST['doUnban']) == 'Unban') {

if(!empty($_POST['u'])) {
	foreach ($_POST['u'] as $uid) {
		$id = filter($uid);
		mysql_query("update users set banned='0' where id='$id'");
	}
 }
 $ret = $_SERVER['PHP_SELF'] . '?'.$_POST['query_str'];;
 
 header("Location: $ret");
 exit();
}

if (isset($_POST['doDelete']) == 'Delete') {

if(!empty($_POST['u'])) {
	foreach ($_POST['u'] as $uid) {
		$id = filter($uid);
		mysql_query("delete from users where id='$id' and `username` <> 'admin'");
	}
 }
 $ret = $_SERVER['PHP_SELF'] . '?'.$_POST['query_str'];;
 
 header("Location: $ret");
 exit();
}

if (isset($_POST['doApprove']) == 'Approve') {

if(!empty($_POST['u'])) {
	foreach ($_POST['u'] as $uid) {
		$id = filter($uid);
		mysql_query("update users set approved='1' where id='$id'");
		
	list($to_email) = mysql_fetch_row(mysql_query("select email from users where id='$uid'"));	
 
$message = 
"Hello,\n
Thank you for registering with us. Your account has been activated...\n

*****LOGIN LINK*****\n
http://$host$path/login.php

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

@mail($to_email, "User Activation", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion()); 
	 
	}
 }
 
 $ret = $_SERVER['PHP_SELF'] . '?'.$_POST['query_str'];	 
 header("Location: $ret");
 exit();
}

$rs_all = mysql_query("select count(*) as total_all from users") or die(mysql_error());
$rs_active = mysql_query("select count(*) as total_active from users where approved='1'") or die(mysql_error());
$rs_total_pending = mysql_query("select count(*) as tot from users where approved='0'");						   

list($total_pending) = mysql_fetch_row($rs_total_pending);
list($all) = mysql_fetch_row($rs_all);
list($active) = mysql_fetch_row($rs_active);


?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sporto - Página de Administrador</title>
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
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

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
                <h4 style="color:black">Painel de Administrador: <?php echo $_SESSION['username'];?> </h4>
                <hr>
            </div>
        </div>
    </div>	



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="14%" valign="top">
    <td width="74%" valign="top" style="padding: 10px;"><h2><font color="#FF0000">Página de Administrador</font></h2>
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="myaccount">
        <tr>
          <td>Total users: <?php echo $all;?></td>
          <td>Active users: <?php echo $active; ?></td>
          <td>Pending users: <?php echo $total_pending; ?></td>
        </tr>
      </table>
      <p><?php 
	  if(!empty($msg)) {
	  echo $msg[0];
	  }
	  ?></p>
      <table width="80%" border="0" align="center" cellpadding="10" cellspacing="0" style="background-color: #E4F8FA;padding: 2px 5px;border: 1px solid #CAE4FF;" >
        <tr>
          <td><form name="form1" method="get" action="admin.php">
              <p align="center">Search 
                <input name="q" type="text" id="q" size="40">
                <br>
                [Type email or user name] </p>
              <p align="center"> 
                <input type="radio" name="qoption" value="pending">
                Pending users 
                <input type="radio" name="qoption" value="recent">
                Recently registered 
                <input type="radio" name="qoption" value="banned">
                Banned users <br>
                <br>
                [You can leave search blank to if you use above options]</p>
              <p align="center"> 
                <input name="doSearch" type="submit" id="doSearch2" value="Search">
              </p>
              </form></td>
        </tr>
      </table>
      <p>
        <?php if (isset($get['doSearch']) == 'Search') {
	  $cond = '';
	  if (isset($get['qoption']) == 'pending') {
	  $cond = "where `approved`='0' order by date desc";
	  }
	  if (isset($get['qoption']) == 'recent') {
	  $cond = "order by date desc";
	  }
	  if (isset($get['qoption']) == 'banned') {
	  $cond = "where `banned`='1' order by date desc";
	  }
	  
	  if($get['q'] == '') { 
	  $sql = "select * from users $cond"; 
	  } 
	  else { 
	  $sql = "select * from users where `email` = '$_REQUEST[q]' or `username`='$_REQUEST[q]' ";
	  }

	  
	  $rs_total = mysql_query($sql) or die(mysql_error());
	  $total = mysql_num_rows($rs_total);
	  
	  if (!isset($_GET['page']) )
		{ $start=0; } else
		{ $start = ($_GET['page'] - 1) * $page_limit; }
	  
	  $rs_results = mysql_query($sql . " limit $start,$page_limit") or die(mysql_error());
	  $total_pages = ceil($total/$page_limit);
	  
	  ?>
      <p>Approve -&gt; A notification email will be sent to user notifying activation.<br>
        Ban -&gt; No notification email will be sent to the user. 
      <p><strong>*Note: </strong>Once the user is banned, he/she will never be 
        able to register new account with same email address. 
      <p align="right"> 
        <?php 
	  
	  // outputting the pages
		if ($total > $page_limit)
		{
		echo "<div><strong>Pages:</strong> ";
		$i = 0;
		while ($i < $page_limit)
		{
		
		
		$page_no = $i+1;
		$qstr = ereg_replace("&page=[0-9]+","",$_SERVER['QUERY_STRING']);
		echo "<a href=\"admin.php?$qstr&page=$page_no\">$page_no</a> ";
		$i++;
		}
		echo "</div>";
		}  ?>
		</p>
		<form name "searchform" action="admin.php" method="post">
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
          <tr bgcolor="#E6F3F9"> 
            <td width="4%"><strong>ID</strong></td>
            <td> <strong>Date</strong></td>
            <td><div align="center"><strong>User Name</strong></div></td>
            <td width="24%"><strong>Email</strong></td>
            <td width="10%"><strong>Approval</strong></td>
            <td width="10%"> <strong>Banned</strong></td>
            <td width="25%">&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td width="10%">&nbsp;</td>
            <td width="17%"><div align="center"></div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php while ($rrows = mysql_fetch_array($rs_results)) {?>
          <tr> 
            <td><input name="u[]" type="checkbox" value="<?php echo $rrows['id']; ?>" id="u[]"></td>
            <td><?php echo $rrows['date']; ?></td>
            <td> <div align="center"><?php echo $rrows['username'];?></div></td>
            <td><?php echo $rrows['email']; ?></td>
            <td> <span id="approve<?php echo $rrows['id']; ?>"> 
              <?php if(!$rrows['approved']) { echo "Pending"; } else {echo "Active"; }?>
              </span> </td>
            <td><span id="ban<?php echo $rrows['id']; ?>"> 
              <?php if(!$rrows['banned']) { echo "no"; } else {echo "yes"; }?>
              </span> </td>
            <td> <font size="2"><a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "approve", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#approve<?php echo $rrows['id']; ?>").html(data); });'>Approve</a> 
              <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "ban", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#ban<?php echo $rrows['id']; ?>").html(data); });'>Ban</a> 
              <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "unban", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#ban<?php echo $rrows['id']; ?>").html(data); });'>Unban</a> 
              <a href="javascript:void(0);" onclick='$("#edit<?php echo $rrows['id'];?>").show("slow");'>Edit</a> 
              </font> </td>
          </tr>
          <tr> 
            <td colspan="7">
			
			<div style="display:none;font: normal 11px arial; padding:10px; background: #e6f3f9" id="edit<?php echo $rrows['id']; ?>">
			
			<input type="hidden" name="id<?php echo $rrows['id']; ?>" id="id<?php echo $rrows['id']; ?>" value="<?php echo $rrows['id']; ?>">
			User Name: <input name="username<?php echo $rrows['id']; ?>" id="username<?php echo $rrows['id']; ?>" type="text" size="10" value="<?php echo $rrows['username']; ?>" >
			User Email:<input id="email<?php echo $rrows['id']; ?>" name="email<?php echo $rrows['id']; ?>" type="text" size="20" value="<?php echo $rrows['email']; ?>" >
			Level: <input id="group_id<?php echo $rrows['id']; ?>" name="group_id<?php echo $rrows['id']; ?>" type="text" size="5" value="<?php echo $rrows['group_id']; ?>" > 1->user,5->admin
			<br><br>New Password: <input id="pass<?php echo $rrows['id']; ?>" name="pass<?php echo $rrows['id']; ?>" type="text" size="20" value="" > (leave blank)
			<input name="doSave" type="button" id="doSave" value="Save" 
			onclick='$.get("do.php",{ cmd: "edit", pass:$("input#pass<?php echo $rrows['id']; ?>").val(),group_id:$("input#group_id<?php echo $rrows['id']; ?>").val(),email:$("input#email<?php echo $rrows['id']; ?>").val(),username: $("input#username<?php echo $rrows['id']; ?>").val(),id: $("input#id<?php echo $rrows['id']; ?>").val() } ,function(data){ $("#msg<?php echo $rrows['id']; ?>").html(data); });'> 
			<a  onclick='$("#edit<?php echo $rrows['id'];?>").hide();' href="javascript:void(0);">close</a>
		 
		  <div style="color:red" id="msg<?php echo $rrows['id']; ?>" name="msg<?php echo $rrows['id']; ?>"></div>
		  </div>
		  
		  </td>
          </tr>
          <?php } ?>
        </table>
	    <p><br>
          <input name="doApprove" type="submit" id="doApprove" value="Approve">
          <input name="doBan" type="submit" id="doBan" value="Ban">
          <input name="doUnban" type="submit" id="doUnban" value="Unban">
          <input name="doDelete" type="submit" id="doDelete" value="Delete">
          <input name="query_str" type="hidden" id="query_str" value="<?php echo $_SERVER['QUERY_STRING']; ?>">
          <strong>Note:</strong> If you delete the user can register again, instead 
          ban the user. </p>
        <p><strong>Edit Users:</strong> To change email, user name or password, 
          you have to delete user first and create new one with same email and 
          user name.</p>
      </form>
	  
	  <?php } ?>
      &nbsp;</p>
	  <?php
	  if (isset($_POST['doSubmit']) == 'Create')
{
$rs_dup = mysql_query("select count(*) as total from users where username='$post[username]' OR email='$post[email]'") or die(mysql_error());
list($dups) = mysql_fetch_row($rs_dup);

if($dups > 0) {
	die("The user name or email already exists in the system");
	}

if(!empty($_POST['password'])) {
  $password = $post['password'];	
  $hash = passwordHash($post['password']);
 }  
 else
 {
  $password = Genpassword();
  $hash = passwordHash($password);
  
 }
 
mysql_query("INSERT INTO users (`username`,`email`,`password`,`approved`,`date`,`group_id`)
			 VALUES ('$post[username]','$post[email]','$hash','1',now(),'$post[group_id]')
			 ") or die(mysql_error()); 



$message = 
"Thank you for registering with us. Here are your login details...\n
User Email: $post[email] \n
Passwd: $password \n

*****LOGIN LINK*****\n
http://$host$path/login.php

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

if($_POST['send'] == '1') {

	mail($post['email'], "Login Details", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion()); 
 }
echo "<div class=\"msg\">User created with password $password....done.</div>"; 
}

	  ?>
	  
      <h2><font color="#FF0000">Create New User</font></h2>
      <table width="80%" border="0" cellpadding="5" cellspacing="2" class="myaccount">
        <tr>
          <td><form name="form1" method="post" action="admin.php">
              <p>User ID 
                <input name="username" type="text" id="username">
                (Type the username)</p>
              <p>Email 
                <input name="email" type="text" id="email">
              </p>
              <p>User Level 
                <select name="group_id" id="group_id">
                  <option value="1">User</option>
                  <option value="5">Admin</option>
                </select>
              </p>
              <p>Password 
                <input name="password" type="text" id="password">
                (if empty a password will be auto generated)</p>
              <p> 
                <input name="send" type="checkbox" id="send" value="1" checked>
                Send Email</p>
              <p> 
                <input name="doSubmit" type="submit" id="doSubmit" value="Create">
              </p>
            </form>
            <p>**All created users will be approved by default.</p></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="12%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
