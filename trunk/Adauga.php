<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div>
<div ali align="center"> 
<a href="home_page.php">Home</a>
<a href="adauga.php">Adauga</a>
<a href="cauta.php">Cauta</a>
<a href="contact.php">Contact</a>
</div>

</div >
<div align="center">
<!-- InstanceBeginEditable name="region1" -->

<?php require_once("conection.php");?>
	<form method="post" action="adauga.php?actiune=adauga">
		<h2> Date proprietar</h2> <br>
		Nume :
		<input type="text" name="nume"	/>
		<br>
		Telefon :
		<input type="text" name="telefon" />
		<br>
		E-mail : 	
		<input type="text" name="email" />
		<br>
		<strong><h2> Date anunt</h2> <br></strong>
		Tipul ofertei
		<select name="tip_oferta" >
			<option value="Vanzare">Vanzare</option>
			<option value="Cumparare">Cumparare</option>
			<option value="Inchirieri">Inchirieri</option>
		</select>
		<br>
		Tipul imobilului : 
		<select name="tip_imobil" >
			<option value="Casa">Casa</option>
			<option value="Apartament">Apartament</option>
			<option value="Spatiu Comercial">Spatiu comercial</option>
		</select>
		<br>
		Pret :<input type="text" name="tip_oferta"/> Euro
		<br>
		Confort :
		<select name="confort">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select> 
		<br>
		Zona : <input type="text" name="zona"/>
		<br>
		Suprafata : <input type="text" name="suprafata"/> mp
		<br>
		Etaj : <input type="text"  name="etaj" />
		<br>
		Poza : <input type="file" name="poza" />
		<br>
		
		
		<input type="submit" value="adauga" />
		<input type="reset">
	</form>	
	 <?php
 	$actiune = $_GET['actiune'];
	if(strcmp($actiune,"adauga" )== 0) 
 		{
		$nume = $_POST["nume"];
		$telefon = $_POST["telefon"];
		$email = $_POST["email"];
		// facem ceva validare
		mysql_query("INSERT INTO  `imobiliare`.`proprietar` (`id` ,`nume` ,`telefon` ,`email`)VALUES (NULL ,  '$nume',  '$telefon',  '$email');");
		$id_proprietar = mysql_query("SELECT MAX(id) FROM `imobiliare`.`proprietar`;"); 
		
		$tip_oferta =$_POST["tip_oferta"];
		$tip_imobil = $_POST["tip_imobil"];
		$pret = $_POST["pret"];
		$confort = $_POST["confort"];
		$zona =$_POST["zona"];
		$suprafata=$_POST["suprafata"];
		$etaj = $_POST["etaj"];
		$poza =$_FILES["poza"];
		
		mysql_query("INSERT INTO `imobiliare`.`anunt` (`id`, `id_proprietar`, `tip_oferta`, `tip_imobil`, `pret`, `confort`, `zona`, `suprafata`, `etaj`, `poza`, `nr_camere`, `nr_bai`, `an_constructie`, `data_anunt`, `Detalii`)
		 VALUES (NULL, '$id_proprietar', '$tip_oferta', '$tip_imobil', '$pret', '$confort', '$zona', '$suprafata', '$etaj', '$poza', '3', '3', '1999', '2010-01-15', 'E frumos');");


				echo "id_proprietar ".$id_proprietar;
		}
	?>

<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
