<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Home</title>
<link rel="stylesheet"  href="../css_home.css" type="text/css"> 
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet"  href="css1.css" type="text/css"> 
<!-- InstanceBeginEditable name="head" -->
<link href="css_home.css" rel="stylesheet" type="text/css">
<!-- InstanceEndEditable -->
</head>

<body onLoad="javascript:schimba('1.jpg');" >
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

<!-- informatii pagina principala-->

<div id="description" > &nbsp;&nbsp; 
  <p><img  src="photo/case/1.jpg" name="poza" width="408" height="263" border="2" align="left" id="poza" style="margin-right:10px;"/>
    Imobiliare Timisoara-vanzari apartamente, case, terenuri, vile, la cele mai mici preturi. FIABILITATE - PRICEPERE - PROFESIONALISM IN SERVICIUL DUMNEAVOASTRA Oferta ACTUAL acopera atat piata imobilelor vechi cat si a constructiilor noi, extinzandu-se pana la terenuri, spatii si constructii comerciale. Agentia noastra deserveste atat cererea interna, cat si investitorii straini. Noi - ca intotdeauna - va vom oferi servicii impecabile, pentru a va satisface cerintele legate de piata imobiliara, si suntem siguri ca veti fi multumit de nivelul serviciilor noastre. Cunoasterea pietei aduce cu sine cresterea nivelului serviciilor oferite. Suntem in permanenta colaborare cu numeroase banci - cunoscand programele de creditare actuale - astfel suntem in masura sa raspundem la intrebarile clientilor nostri legate de posibilitatile de creditare.  </p>
</div>
<br>
<br>
<br>

<div id="news">
   	 <?php
	/*	require_once ('rss/rss_fetch.inc');
		//conectarea la site pentru rss
		//$url = 'http://feeds2.feedburner.com/Stirirolro-Auto';
		$url= 'http://www.vreaucredit.ro/rss-credite-30.xml';
		$rss = fetch_rss($url);
		$source = $rss->channel['title'];	
	     
		
		for($i=0; $i<4; $i++){
		
			$title=$rss->items[$i]['title'];
			$url=$rss->items[$i]['link'];
			$content= $rss->items[$i]['summary'];
				echo '<a href='.$url.'>'.$title.'</a><br />'.$content.'<hr />';		
		}
		
		?>
		<div align="right"><a href="http://www.vreaucredit.ro//" target="_blank"> <strong>Vreau</strong><strong>Credite</strong> - <?=$source?></a></div>
  </div>
  
<?php require_once("conection.php"); 	?>
  <div id="info">
		
<?php
          $order = 'poza';
		  
	     //fac join la cele 2 tabele din baza de date
		 $ref1=mysql_query("SELECT * FROM `anunt` JOIN `proprietar` WHERE `id_proprietar`=`proprietar`.`id` ORDER BY $order DESC");
		  //print_r("aa".$ref1);
		

$numrows = mysql_num_rows($ref1);
//print_r($numrows);
if ($numrows == 0) {
    echo "No data to display!";
    exit;
}
   
		 for( $i=$numrows; $i>$numrows-3; $i--)
		 { 
		  
		   if($item=mysql_fetch_array($ref1))
                 {
                    ?>
                        <div >
                    <?php 
						//$i++;
						//print_r($item);
						//on click pe poza aceasta se va afisa la o dimensiune mai mare 
					     if($item['poza']){
				    ?>
						&nbsp;&nbsp;&nbsp;
                        <img src='thumbs/<?=$item['poza']?>' />
                    <?php
                        }else{
				    ?>
                        <img  src='thumbs/default.jpg' />
                    <?php } 
						//afisarea detaliilor despre anunt si informatii proprietar
						?>      
                                <label ><b> Detalii anunt </style></b>:<b>Tip oferta </b>: <?=$item['tip_oferta']."  "?><b>Tip imobil </b>: <?=$item['tip_imobil']." "?><b>pretul </b>: <?=$item['pret']?><b> confort :</b><?=$item['confort']?> <b> zona </b>: <?=$item['zona']?> <b><br>&nbsp;&nbsp;&nbsp;&nbsp;suprafata </b>:<?=$item['supragata']?> <b>etaj</b>:<?=$item['etaj']?> <b>numar camere : </b> <?=$item['nr_camere']?> <b>numar bai : </b><?=$item['nr_bai']?> <b>Detalii </b>: <?=$item['detalii']?></label>
								<br>
								<br>
							<label> <b>&nbsp;&nbsp;&nbsp;&nbsp;Contact proprietar </b>: tel.<?=$item['telefon']?> <b>email </b>:<?=$item['email']?></label>
							<br><br>
                        </div >
                        <?php
		
			}
			
		}
	
*/?>
<?php require_once("conection.php"); 
 $order = 'poza';
 
 $ref1=mysql_query("SELECT * FROM `anunt` JOIN `proprietar` WHERE `id_proprietar`=`proprietar`.`id` ORDER BY $order DESC");
 //print_r("aa".$ref1);
 $numrows = mysql_num_rows($ref1);
 // print_r($numrows);
  if ($numrows == 0) {
    echo "No data to display!";
    exit;
 }	?>

 <?php
    // open a file pointer to an RSS file
    $fp = fopen ("rss.xml", "w");

    // Now write the header information
    fwrite ($fp, "<?xml version='1.0'?><rss version='2.0'><channel>\n");

    fwrite ($fp, "<title>Imobiliare</title>\n");

    fwrite ($fp, "<link>http://www.google.com/</link>\n");

    fwrite ($fp, "<description>Apartamente si case de vanzare - ia de aici </description>\n");

    fwrite ($fp, "<language>en-us</language>\n");

    fwrite ($fp, "<docs>http://www.google.com/rss.xml</docs>\n");

        while ($content_rec = mysql_fetch_row($ref1)) {
        fwrite ($fp, "<item>");

        $headline = $content_rec[3];
        $content_1 = substr($content_rec[4], 0, 250);
        $content = strip_tags($content_1);
        if (strlen($content_rec[4]) > 250) {
            $content = $content . "....";
           }
        fwrite ($fp, "<tip_imobil>$headline</tip_imobil>\n");
        fwrite ($fp, "<pret>$content</pret>\n");
        $item_link = "http://www.google.com/index.php?d=$content_rec[3]";
        fwrite ($fp, "<link>$item_link</link>");

        fwrite ($fp, "</item>\n");
    }
    fwrite ($fp, "</channel></rss>\n");
    fclose ($fp);

    ?>
	 <?php
	
     $xml = new DomDocument('1.0');
    $xml->load('rss.xml');
   $i=0;
   foreach($xml->getElementsBytagName('item') as $item){
            /* find the title */
            $imobil = $item->getElementsByTagName('tip_imobil')->item(0)->firstChild->nodeValue;

            /* find the author - for simplicity we assume there is only one */
            $pret = $item->getElementsByTagName('pret')->item(0)->firstChild->nodeValue;
    if($i<3){
          ?>  
            
        <div>
            <h2><?php echo($imobil); ?></h2>
            <p><b>imobil:</b>: <?php echo($pret);}
			 $i++;}?></p>
        </div>    
         
  <!--functia care schimba automat poze -->
  <script>
function schimba(poza,i)
{
	
	//alert(poza);
	var elem=document.getElementById('poza');
	//alert(elem.src);
	elem.src='photo/case/'+poza;
	if(i==0)
	{
	setTimeout("schimba('2.jpg',1)",2500);
	
	}
	else
	if(i==1)
	{
	setTimeout("schimba('1.jpg',2)",2500);
	
	}
	else
		setTimeout("schimba('3.jpg',0)",2500);
	
}

</script>

<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
