<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet"  href="css1.css" type="text/css"> 
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body >

<div id="meniu">
<div align="center"> 
<a id="linkuri" href="home_page.php">Home</a>
<a id="linkuri" href="adauga.php">Adauga</a>
<a id="linkuri" href="cauta.php">Cauta</a>
<a id="linkuri" href="contact.php">Contact</a>
</div>
</div>

<div  id="content" >
<!-- InstanceBeginEditable name="region1" -->
	<?php require_once("conection.php"); 	?>
	<form method="post" action="cauta.php?actiune=cauta" >
	<div align="left">
	Tip oferta :
	<select name="tip_oferta">
			<option value="Vanzare" selected >Vanzare</option>
			<option value="Cumparare">Cumparare</option>
			<option value="Inchirieri">Inchirieri</option>
	</select>
	<br>
	Tipul imobilului : 
	<select name="tip_imobil" >
			<option value="Casa">Casa</option>
			<option value="Apartament" selected>Apartament</option>
			<option value="Spatiu Comercial">Spatiu comercial</option>
	</select>
	<br>
	Pret : <input name="pret" type="text" value="500000"/>
	</div>
	
	<input type="submit" value="cauta"/>
	<input type="reset"/>
	</form>
<hr>
<?php  
	if(strcmp($_GET["actiune"],"cauta")==0)
	{
		$tip_oferta=$_POST["tip_oferta"];
		$tip_imobil=$_POST["tip_imobil"];
		$pret=$_POST["pret"];
		?>
		<div >
		<img id="pict" src='photo/default.jpg' />
		<?php
	  //slelect din baza de date where parinte=0
		 $ref1=mysql_query("SELECT * FROM `imobiliare`.`anunt` WHERE `tip_oferta`='$tip_oferta' AND `tip_imobil`='$tip_imobil' AND `pret`<='$pret'");
		//print_r("aa".$ref1);
	 
	 	 while($item=mysql_fetch_array($ref1) )
		 	{
			//print_r($item);
			?>
			<div>
			<?php if($item['poza'])
			{ ?>
			<img src='thumbs/<?=$item['poza']?>' onClick="schimba('<?=$item['poza']?>')" />
			<?php
			}else
			{?>
			<img  src='thumbs/default.jpg' />
			<?php } ?>	
				<label ><?=$item['tip_oferta']."  ".$item['tip_imobil']." ".$item['pret']?></label>

			</div>
			<?php
		
			}
	
	}
?>


<script>
function schimba(poza)
{
	var elem=document.getElementById('pict');
	elem.src='photo/'+poza;
	
}

</script>
<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
