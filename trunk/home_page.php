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

</div >
<div  id="content" >
<!-- InstanceBeginEditable name="region1" -->
<p>jhkh</p></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
