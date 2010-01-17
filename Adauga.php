<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
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

<?php require_once("conection.php"); 
function resize($nume_poza){

      $imagine_mare =  "photo/".$nume_poza; //poza.jpg
      $imagine_mica = "thumbs/".$nume_poza;  

      $image_original = imagecreatefromjpeg($imagine_mare); //incarc in memorie fisieruul
      $image_resized = imagecreatetruecolor(320, 240); // redim pt poza mare
      $original_size = getimagesize($imagine_mare); // preiau vechile dim ale pozei
      $original_width = $original_size[0];
      $original_height= $original_size[1];      
      imagecopyresampled($image_resized, $image_original, 0, 0, 0, 0, 320, 240, $original_width, $original_height);
      imagejpeg($image_resized, $imagine_mare, 100); 
	  
	  
	  $image_original = imagecreatefromjpeg($imagine_mica);
      $image_resized = imagecreatetruecolor(80, 60); //redim pt poza mica
      $original_size = getimagesize($imagine_mica);
      $original_width = $original_size[0];
      $original_height= $original_size[1];      
      imagecopyresampled($image_resized, $image_original, 0, 0, 0, 0, 80, 60, $original_width, $original_height);
      imagejpeg($image_resized, $imagine_mica, 100); 
	  
	       
}
	?>
	
	

	<form method="post" action="adauga.php?actiune=adauga" enctype="multipart/form-data">
		<h2> Date proprietar</h2> <br>
		Nume <span class="style2">(*)</span> :
		<input type="text" name="nume"	/>
		<br>
		Telefon <span class="style2">(*)</span> :
		<input type="text" name="telefon" />
		<br>
		E-mail : 	
		<input type="text" name="email" />
		<br>
		<strong><h2> Date anunt</h2> <br>
		</strong>
		Tipul ofertei <span class="style2">(*)</span> :
		<select name="tip_oferta" >
			<option value="Vanzare">Vanzare</option>
			<option value="Cumparare">Cumparare</option>
			<option value="Inchirieri">Inchirieri</option>
		</select>
		<br>
		Tipul imobilului <span class="style2">(*)</span>: 
		<select name="tip_imobil" >
			<option value="Casa">Casa</option>
			<option value="Apartament">Apartament</option>
			<option value="Spatiu Comercial">Spatiu comercial</option>
		</select>
		<br>
		Pret <span class="style2">(*)</span> :
		<input type="text" name="pret"/> Euro
		<br>
		Confort :
		<select name="confort">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select> 
		<br>
		Zona <span class="style2">(*)</span> : 
		<input type="text" name="zona"/>
		<br>
		Suprafata : <input type="text" name="suprafata"/> mp
		<br>
		Etaj : <input type="text"  name="etaj" />
		<br>
		Poza : <input type="file" name="poza" />
		<br>
		Detalii : <textarea name="detalii"></textarea>
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

		//memoram proprietarul
		mysql_query("INSERT INTO  `imobiliare`.`proprietar` (`id` ,`nume` ,`telefon` ,`email`)VALUES (NULL ,  '$nume',  '$telefon',  '$email');");
		
		//luam ultimul id de proprietar pt a-l pune in tabela anunt
		$id_proprietar = mysql_query("SELECT @@IDENTITY FROM  `imobiliare`.`proprietar`"); 
		$last_id= mysql_fetch_array($id_proprietar);
		$id_p =$last_id['0'];
		
		
		$tip_oferta =$_POST["tip_oferta"];
		$tip_imobil = $_POST["tip_imobil"];
		$pret = $_POST["pret"];
		$confort = $_POST["confort"];
		$zona =$_POST["zona"];
		$suprafata=$_POST["suprafata"];
		$etaj = $_POST["etaj"];
		$poza =$_FILES['poza']['name'];
		$detalii = $_POST['detalii'];
		/* poza nu se va salva in baza de date , doar numele ei. Pt ca numele sa fie unicat in compunem din data la care a fost adaugata poza 
		Poza o salvam cu noul nume pe server intr-un folder poze. Creem in plus si un folder thumbs ca incarcarea pozelor sa fie mai rapida.
		*/
		//print_r($poza." are numele ala");  daca decomentezi va afisa un mesaj cu numele pozei

		if($poza!='')
		{
			$nr=strtotime(date('y-m-d h:i:s'));
			$fis=explode('.',$poza); // imparte in 2 array : 1. pana la punct , 2.dupa punct
			$ext=$fis[1];  //luam extensia pozei din al 2-lea array
			$nume_fisier='pic'.$nr.'.'.$ext; 
			$dir='photo/'.$nume_fisier;
			
			$temp=$_FILES['poza']['tmp_name'];
			copy($temp,$dir);
			$dir2='thumbs/'.$nume_fisier;
			copy($temp,$dir2);
			resize($nume_fisier);		
		}
		
		mysql_query("INSERT INTO `imobiliare`.`anunt` (`id`, `id_proprietar`, `tip_oferta`, `tip_imobil`, `pret`, `confort`, `zona`, `suprafata`, `etaj`, `poza`, `nr_camere`, `nr_bai`, `an_constructie`, `data_anunt`, `Detalii`)
		 VALUES (NULL, '$id_p', '$tip_oferta', '$tip_imobil', '$pret', '$confort', '$zona', '$suprafata', '$etaj', '$nume_fisier', '3', '3', '1999', '2010-01-15', '$detalii');");


				
		}
	?>

<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>