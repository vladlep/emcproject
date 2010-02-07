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

<div id="description" > &nbsp;&nbsp; 
  <p><img  src="photo/case/1.jpg" name="poza" width="408" height="263" border="2" align="left" id="poza" style="margin-right:10px;"/>
    Imobiliare Timisoara-vanzari apartamente, case, terenuri, vile, la cele mai mici preturi. FIABILITATE - PRICEPERE - PROFESIONALISM IN SERVICIUL DUMNEAVOASTRA Oferta ACTUAL acopera atat piata imobilelor vechi cat si a constructiilor noi, extinzandu-se pana la terenuri, spatii si constructii comerciale. Agentia noastra deserveste atat cererea interna, cat si investitorii straini. Noi - ca intotdeauna - va vom oferi servicii impecabile, pentru a va satisface cerintele legate de piata imobiliara, si suntem siguri ca veti fi multumit de nivelul serviciilor noastre. Cunoasterea pietei aduce cu sine cresterea nivelului serviciilor oferite. Suntem in permanenta colaborare cu numeroase banci - cunoscand programele de creditare actuale - astfel suntem in masura sa raspundem la intrebarile clientilor nostri legate de posibilitatile de creditare.  </p>
</div>
<br>
<br>
<br>
<div id="news">
	   <?php
		require_once ('rss/rss_fetch.inc');
		
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
