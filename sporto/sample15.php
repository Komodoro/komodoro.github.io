
<?php /*
Copyright (c) 2007, Gurú Sistemas and/or Gustavo Adolfo Arcila Trujillo
All rights reserved.
www.gurusistemas.com

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer
	  in the documentation and/or other materials provided with the distribution.
    * Neither the name of the Gurú Sistemas Intl nor Gustavo Adolfo Arcila Trujillo nor the names of its contributors may be used to
	  endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS  "AS IS"  AND ANY EXPRESS  OR  IMPLIED WARRANTIES, INCLUDING, 
BUT NOT LIMITED TO,  THE IMPLIED WARRANTIES  OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.  IN NO EVENT
SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,  INDIRECT,  INCIDENTAL, SPECIAL, EXEMPLARY,  OR CONSEQUENTIAL 
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF  USE, DATA, OR PROFITS;  OR BUSINESS 
INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE 
OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. 

Please remember donating is one way to show your support, copy and paste in your internet browser the following link to make your donation
https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=tavoarcila%40gmail%2ecom&item_name=phpMyDataGrid%202007&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8

For more info, samples, tips, screenshots, help, contact, forum, please visit phpMyDataGrid site  
http://www.gurusistemas.com/indexdatagrid.php

For contact author: tavoarcila at gmail dot com or info at gurusistemas dot com
*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	
<?php

if (!isset($_REQUEST["DG_ajaxid"]))
	{ // If we intercept an AJAX request from page 
									 // then do not display data below	
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.
		 '<html xmlns="http://www.w3.org/1999/xhtml">'.
		 '<head>'.
		 //'<meta http-equiv="Content-Type" content="text/html; charset=$charset" />'.
		 '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'.
		 //'<meta http-equiv="Content-Type" content="text/html; charset=iso-10646" />'.
		 '<meta http-equiv="Content-Type" content="text/html; charset=iso-8879" />'.
		 //'<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.
		 '<meta name="description" content="Site description" />'.
		 '<meta name="revisit-after" content="8 days" />'.
		 '<meta name="keywords" content="keywords for site" />'.
		 '<meta http-equiv="Pragma" content="no-cache" />'.
		 '<meta name="robots" content="all" />'.
		 '<link rel="shortcut icon" href="images/guru.ico" />'.
		 '<meta http-equiv="Content-Script-Type" content="type" />'.
		 '<link type="text/css" rel="stylesheet" href="../css/styles.css" />'.
		 '</head>'.
		 '<title>phpMyDataGrid Test script</title>';

echo '<body>'.
	'<div id="content">';
	// echo myheader(); // print or insert your own header
	echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
	  '<tr>'.
		'<td colspan="5">&nbsp;</td>'.
	  '</tr>'.
	  '<tr>'.
		'<td colspan="5">'.
		'<div id="masthead">'.
			'<div id="logodiv">'.
				'á é í ó ü $ % ª º ~~~^^'.
				'<img src="http://www.gurusistemas.com/images/logo.jpg" alt="phpMyDataGrid Logo" />'.
			'</div>'.
		'</div>'.
		'This is the header of page. here goes a menu or wherever you want</td>'.
	  '</tr>'.
	  '<tr>'.
		'<td style="width:5%">&nbsp;</td>'.
		'<td style="width:42.5%">&nbsp;</td>'.
		'<td style="width:5%">&nbsp;</td>'.
		'<td style="width:42.5%" align="right">É í ó ú $ lolo Employees</td>'.
		'<td style="width:5%">&nbsp;</td>'.
	  '</tr>'.
	  '<tr>'.
		'<td style="width:5%">&nbsp;</td>'.
		'<td colspan="3" align="center"><br />';
	}
	
	
	

include ("phpmydatagrid.class.php");
//$link = mysql_connect("127.0.0.1", "root", "", "si");
$objGrid = new datagrid;
$objGrid->closeTags(true);  
$objGrid->friendlyHTML();  
$objGrid->methodForm("get"); 
//$objGrid -> conectadb("127.0.0.1", "root", "", "si");
$objGrid -> conectadb("127.0.0.1", "root", "", "si");
$objGrid->salt("Myc0defor5tr0ng3r-Pro3EctiOn");
$objGrid->language("en");
$objGrid->buttons(true,false,true,false);
//$objGrid -> decimalDigits(3);
//$objGrid -> decimalPoint(".");
//$objGrid -> preg_match('/\A(?:^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$)\Z/im');

$objGrid->form('employee', true);
$objGrid->searchby("name,lastname");
$objGrid->tabla ("serverporto");
$objGrid->keyfield("Hostname");
$objGrid->datarows(30);
$objGrid->orderby("Hostname", "ASC");
//$objGrid->charset("charset=utf-8");
//mysql_set_charset('utf8', $link);


//Save the expression in a variable.
//$correct_ip_format = ('/(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)/');
//$ip = 'IP';

/* Define fields to show */
	$objGrid -> FormatColumn("Hostname", "Hostname", 5, 5, 1, "150", "left", "text");
	//$valid = filter_var($ip, FILTER_VALIDATE_IP);
	//$objGrid -> FormatColumn("IP", "IP Address", 30, 30, 0, "170", "center", "integer:/\A(?:^([0-2]?[0-5]?[0-5]?|[0-2]?[0-5]?[0-5]?|[0-2]?[0-5]?[0-5]?)\.([0-2]?[0-5]?[0-5]?|[0-2]?[0-5]?[0-5]?|[0-2]?[0-5]?[0-5]?)\.([[0-2]?[0-5]?[0-5]?|[0-2]?[0-5]?[0-5]?|[0-2]?[0-5]?[0-5]?)\.([0-2]?[0-5]?[0-5]?|[0-2]?[0-5]?[0-5]?|[0-2]?[0-5]?[0-5]?)$)\Z/im");
	//$objGrid -> FormatColumn("IP", "IP Address", 30, 30, 0, "170", "center", "integer:/\A(?:^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$)\Z/im");
	//$objGrid -> FormatColumn("IP", "IP Address", 30, 30, 0, "170", "center", "text:/\A(?:^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$)\Z/im" );
	//$objGrid -> FormatColumn("IP", "IP Address", 30, 30, 0, "170", "center", "float:/\A(?:^([1-9]|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])$)\Z/im" );
	//$objGrid -> FormatColumn ("preg_match($correct_ip_format, $ip)", );
	$objGrid -> FormatColumn("IP", "IP Address", 30, 30, 0, "170", "center", "text" );
	//$valid = filter_var($ip, FILTER_VALIDATE_IP);
	//$objGrid -> FormatColumn("IP", "IP Address", 30, 30, 0, "170", "center", "text:." );
	$objGrid -> FormatColumn("Marca", "Marca", 30, 30, 0, "90", "left", "text");
	$objGrid -> FormatColumn("Modelo", "Modelo", 5, 5, 0, "155", "center", "text");
	$objGrid -> FormatColumn("OS", "OS", 10, 10, 0, "100", "center", "text");
	$objGrid -> FormatColumn("Chaves", "Key", 5, 5, 0, "60", "left", "text");
	$objGrid -> FormatColumn("Processor", "Processor", 30, 30, 0,"250", "center", "textarea");
	$objGrid -> FormatColumn("Memoria", "Memoria", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("Hard", "Hard Drives", 5, 2, 0, "130", "right", "text");
	$objGrid -> FormatColumn("MainBoard", "Main Board", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("SN", "Serial Number", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("PN", "Part Number", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("IDIndra", "ID Indra", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("Bios", "Bios", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("MacAddress", "Mac Address", 10, 10, 0, "180", "right", "text");
	$objGrid -> FormatColumn("LogicalVolumes", "Logical Volumes", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("Local", "Local", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("Funcao", "Função", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("Tipo", "Tipo", 10, 10, 0, "130", "right", "text");
	$objGrid -> FormatColumn("Responsabilidade", "Responsabilidade", 10, 10, 0, "130", "right", "textarea");
	$objGrid -> FormatColumn("Observacoes", "Observações", 10, 10, 0, "130", "right", "textarea");
	$objGrid->checkable();
	$objGrid -> setHeader();

	
	
	
	
	
	
	
	
	
	
	
	// if (!isset($_REQUEST["DG_ajaxid"])) end interception, until here, script wont be processed when DG_ajaxid is set
		$objGrid -> ajax('silent');
		$objGrid -> grid();
		$objGrid -> desconectar();

		echo'</td>'.
		'<td style="width:5%">&nbsp;</td>'.
	  '</tr>'.
	'</table><br />'.
	'</div>'.
'</body>';
 // echo myfooter(); // print or insert your own footer ?>

</html>