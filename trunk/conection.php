<?php 
$link=mysql_connect('localhost','root','') or die("NU s-a conectat");
mysql_select_db("imobiliare",$link) or die('Could not select database.');

//else print_r("NU s-a conectat");
?>