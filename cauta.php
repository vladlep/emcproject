<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Cauta anunt</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet"  href="css1.css" type="text/css"> 
<!-- InstanceBeginEditable name="head" -->
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
	<?php require_once("conection.php"); 	?>
	<table cellspacing="0" cellpadding="0" border="0" >
<tbody>
<tr>
<td width="400" >
	<form method="post" action="cauta.php?actiune=cauta" id="table" >
	<div align="left">
	Tip oferta :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select name="tip_oferta">
			<option value="Vanzare" selected >Vanzare</option>
			<option value="Cumparare">Cumparare</option>
			<option value="Inchirieri">Inchirieri</option>
	</select>
	<br><br>
	Tipul imobilului : &nbsp;&nbsp;
	<select name="tip_imobil" >
			<option value="Casa">Casa</option>
			<option value="Apartament" selected>Apartament</option>
			<option value="Spatiu Comercial">Spatiu comercial</option>
	</select>
	<br><br>
	Pret maxim :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="pret" type="text" value="500000"/>
	</div>
	<br><br>
	<input type="submit" value="cauta"/>
	<input type="reset"/>
	</form><br>
</td>
<td><a><img id="pict" border="2px" style="color:#F19836;margin-top:10px; margin-bottom:0px;" src="photo/case/3.jpg" alt="Deveniti client" height="240" width="320"></a><br>
<br></td>
</tr>
</tbody>
</table>
<hr  color="#F19836" style="height:5px" >
<?php  
	if(strcmp($_GET["actiune"],"cauta")==0)
	{
		$tip_oferta=$_POST["tip_oferta"];
		$tip_imobil=$_POST["tip_imobil"];
		$pret=$_POST["pret"];
		?>
		<div >
		
		<?php
	  //slelect din baza de date where parinte=0
		 $ref1=mysql_query("SELECT * FROM `anunt` JOIN `proprietar` WHERE `tip_oferta`='$tip_oferta' AND `tip_imobil`='$tip_imobil' AND `pret`<='$pret' AND `id_proprietar`=`proprietar`.`id`");
		//print_r("aa".$ref1);
		//AND `anunt.id_proprietar`=`proprietar.id`
	 $i=1;
	 	    while(($item=mysql_fetch_array($ref1)) && ($i <= 5) )
                        {
                        //print_r($item);
                        ?>
                        <div>
                        <?php 
						$i++;
						//print_r($item);
						if($item['poza'])
                        { ?>
                        <img src='thumbs/<?=$item['poza']?>' onClick="schimba('<?=$item['poza']?>')" />
                        <?php
                        }else
                        {?>
                        <img  src='thumbs/default.jpg' />
                        <?php } ?>      
                                <label ><b> Detalii anunt </style></b>:<b>Tip oferta </b>: <?=$item['tip_oferta']."  "?><b>Tip imobil </b>: <?=$item['tip_imobil']." "?><b>pretul </b>: <?=$item['pret']?><b> confort :</b><?=$item['confort']?> <b> zona </b>: <?=$item['zona']?> <b>suprafata </b>:<?=$item['supragata']?> <b>etaj</b>:<?=$item['etaj']?> <b>numar camere : </b> <?=$item['nr_camere']?> <b>numar bai : </b><?=$item['nr_bai']?> <b>Detalii </b>: <?=$item['detalii']?></label>
								<br>
								<br>
							<label> <b>Contact proprietar </b>: tel.<?=$item['telefon']?> <b>email </b>:<?=$item['email']?></label>
							<br>
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
