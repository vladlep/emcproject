<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Adauga anunt</title>
<link rel="stylesheet"  href="../css_adauga.css" type="text/css"> 
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet"  href="css1.css" type="text/css"> 
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
<link href="css_adauga.css" rel="stylesheet" type="text/css">
<!-- InstanceEndEditable -->
</head>

<body >
<div id="header" align="center" ><img src="photo/header.jpg" width="800" height="133" ></div>
<div id="meniu" align="center">
<div  id="menu_content" align="center" > 
  	   <br>
  	     <a id="linkuri" href="home_page.php">Home | </a>
  	     <a id="linkuri" href="adauga.php">Adauga | </a>
  	     <a id="linkuri" href="cauta.php">Cauta | </a>
  	     <a id="linkuri" href="contact.php">Contact </a>
  </div>
</div>

<div  id="content" >
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
	
	//validarea propriettilor introduse in  campurile paginii de adaugare
	function valid_prop($nume,$telefon,$email)
	{
	if(strcmp($nume,"")==0)    //verific numele introdus
	{
	return "Nu ati introdus nici un nume";
	}
	if(strcmp($telefon,"")==0 && ! preg_match('/^0\d{9}$/', $telefon ))    //verific numarul de telefon
	return "Nu ati introdus nici un numar de telefon";
	//pt email
	if( strcmp($email,"")!=0 && eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)!=1)
	return "Ati introdus un email invalid";

	return "";
	}	       

    //afisare mesaje in cazul in care campurile obligatorii nu au fost completate
	function val_anunt($pret,$zona,$nr_camere,$nr_bai)
	{
	if(strcmp($pret,"")==0)
	return "Va rugam introduceti pretul solicitat.";
	if(strcmp($zona,"")==0)
	return "Va rugam intoduceti zona in care este localizat imobilul";
	if(strcmp($nr_camere,"")==0)
	return "Va rugam introduceti numarul de incaperi pe care le are spatiul";
	if(strcmp($nr_bai,"")==0)
	return "Va rugam introduceti numarul de bai pe care le are spatiul";
	return "";
	}
	?>
	
	

	<form method="post" action="adauga.php?actiune=adauga" enctype="multipart/form-data"  id="table">
		<h2 id="st1">&nbsp;&nbsp;Date proprietar</h2> <br>
		<span  class="style2" >Nume (*) :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nume"	/></span><br><br>
		<span  class="style2" >Telefon (*) :&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="telefon"	/></span><br><br>
		<span  class="style2" >Email (*) :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email"	/></span><br><br>
		
		<h2 id="st1">&nbsp;&nbsp;Date anunt</h2> <br>
		
		<span  class="style2" > Tipul ofertei:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="tip_oferta" >
			<option value="Vanzare">Vanzare</option>
			<option value="Cumparare">Cumparare</option>
			<option value="Inchirieri">Inchirieri</option>
		</select></span><br><br>
		
		<span  class="style2" >Tipul imobilului(*):&nbsp;&nbsp;</span>
		<select name="tip_imobil" >
			<option value="Casa">Casa</option>
			<option value="Apartament">Apartament</option>
			<option value="Spatiu Comercial">Spatiu comercial</option>
		</select><br><br>
		
		<span class="style2">Pret(*) :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<input type="text" name="pret"/> Euro<br><br>
		
		<span class="style2">Zona(*) :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<input type="text" name="zona"/><br><br>
		
		<span class="style2">Numar de incaperi(*) :</span>
        <input type="text"  size="5px" name="nr_camere" /><br><br>
		
		<span class="style2">Numar de bai(*) :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
		<input type="text" size="5px" name="nr_bai" /><br><br>
		
		<span class="style2">Confort :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
		<select name="confort">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select> 
		<br><br>
		<span class="style2">Suprafata :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
		<input type="text"  size="5px" name="suprafata"/> mp
		<br><br>
		<span class="style2">Etaj :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
		<input type="text" size="5px"  name="etaj" />
		<br><br>
		<span class="style2">Poza :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
		<input type="file" name="poza" />
		<br><br>	
		Detalii : <br><br><textarea name="detalii" style="width:300px"></textarea> 
		<br><br><br>
		<input type="submit" value="adauga"  />
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
		$mess_val = valid_prop($nume,$telefon,$email);
		if ( strcmp($mess_val,"")==0 )
		{
		
		//memoram informatii despre proprietar - id ,nume,telefon, email
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
		/* poza nu se va salva in baza de date , doar numele ei. 
		//Pt ca numele sa fie unicat in compunem din data la care a fost adaugata poza 
		Poza o salvam cu noul nume pe server intr-un folder poze. 
		Creem in plus si un folder thumbs ca incarcarea pozelor sa fie mai rapida.
		*/
		//print_r($poza." are numele ala");  daca decomentezi va afisa un mesaj cu numele pozei

		if($poza!='')
		{
			$nr=strtotime(date('y-m-d h:i:s'));
			$fis=explode('.',$poza);   // imparte in 2 array : 1. pana la punct , 2.dupa punct
			$ext=$fis[1];              //luam extensia pozei din al 2-lea array
			$nume_fisier='pic'.$nr.'.'.$ext; 
			$dir='photo/'.$nume_fisier; 
			
			$temp=$_FILES['poza']['tmp_name'];
			copy($temp,$dir);    
			$dir2='thumbs/'.$nume_fisier;
			copy($temp,$dir2);          //save in thumbs        
			resize($nume_fisier);		
		}
		$nr_camere = $_POST['nr_camere'];
		$nr_bai = $_POST['nr_bai'];
		$data = date('y-m-d');
		$mess_val = val_anunt($pret,$zona,$nr_camere,$nr_bai);
		if( strcmp($mess_val,"")==0)
		{
		//inserez in baza de date
		mysql_query("INSERT INTO `imobiliare`.`anunt` (`id`, `id_proprietar`, `tip_oferta`, `tip_imobil`, `pret`, `confort`, `zona`, `suprafata`, `etaj`, `poza`, `nr_camere`, `nr_bai`, `data_anunt`, `Detalii`)
		 VALUES (NULL, '$id_p', '$tip_oferta', '$tip_imobil', '$pret', '$confort', '$zona', '$suprafata', '$etaj', '$nume_fisier', '$nr_camere', '$nr_bai', '$data', '$detalii');");
		$mess_val= "Anuntul a fost adaugat cu succes";
		}		
		}//primul if de la validarea proprietarului
		
	
	?>
	  <script type="text/javascript">
    alert("<?php echo $mess_val; ?> ");
    </script>

	 	<?php
	}//if  ce verifica daca actiunea e de adaugare
	
	?>

<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
