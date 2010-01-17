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
	     
		
		for($i=0; $i<3; $i++){
		
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
