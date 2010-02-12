<?php
 
	  class RSS 
	  { 
	    public function RSS() 
	    { 
	        require_once ('connection.php'); 
	    } 
	 
	    public function GetFeed() 
	    { 
	        return $this->getDetails() . $this->getItems(); 
	    } 
 
    private function dbConnect() 
	    { 
    	    DEFINE ('LINK', mysql_connect ('localhost', 'localhost','')); 
    	} 
	 
	    private function getDetails() 
	    { 
	        $detailsTable = "anunt"; 
	        $this->dbConnect($detailsTable); 
	        $query = "SELECT * FROM ". $detailsTable; 
	        $result = mysql_db_query ('imobiliare', $query, LINK); 
	 
	        while($row = mysql_fetch_array($result)) 
	        { 
	            $details = '<?xml version="1.0" encoding="ISO-8859-1" ?>' 
	                <rss version="2.0"> 
	                    <channel> 
	                        <title>". Brand new offer ."</title> 
	                        <link>'. cauta.php .'</link> 
	                        <description>'.$row['tip_oferta']." ".$row['tip_imobil']." ".$row['pret']  .'</description> 
	                        <language>'. tralala .'</language> 
	                        
	        } 
	        return $details; 
	    } 
	 
	    private function getItems() 
	    { 
	        $itemsTable = "anunt"; 
	        $this->dbConnect($itemsTable); 
	        $query = "SELECT * FROM ". $itemsTable; 
	        $result = mysql_db_query (DB_NAME, $query, LINK); 
	        $items = ''; 
	        while($row = mysql_fetch_array($result)) 
	        { 
	            $items .= '<item> 
	                <title>". Brand new offer title."</title> 
	                <link>'.  cauta.php .'</link> 
	                <description><![CDATA['.$row['tip_oferta']." ".$row['tip_imobil']." ".$row['pret']  .']]></description> 
	            </item>'; 
	        } 
	        $items .= '</channel> 
	                </rss>'; 
	        return $items; 
	    } 
	 
	} 
	 
	?> 