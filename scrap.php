<?php 
 	require_once "support/web_browser.php";
	require_once "support/tag_filter.php";
	function imprimir($url,$busqueda){
		$htmloptions = TagFilter::GetHTMLOptions();
		$web = new WebBrowser();
		$result = $web->Process($url);

		///////// Verificaciones
		if (!$result["success"])
		{
			echo "Error retrieving URL.  " . $result["error"] . "\n";
			exit();
		}
		if ($result["response"]["code"] != 200)
		{
			echo "Error retrieving URL.  Server returned:  " . $result["response"]["code"] . " " . $result["response"]["meaning"] . "\n";
			exit();
		}
		////////////////////

		// Get the final URL after redirects.
		$baseurl = $result["url"];
		// Use TagFilter to parse the content.
		$html = TagFilter::Explode($result["body"], $htmloptions);
		// Retrieve a pointer object to the root node.
		$root = $html->Get();
		// Find all anchor tags.
		$Arreglo = array();
		$rows = $root->Find($busqueda);
		/*
		foreach ($imgs as $img){
			$Arreglo[$i]['Imagen'] = $img->src;
			//echo $img->src."<br>";
			$Arreglo[$i]['Titulo'] = $img->alt;
			//echo $img->alt."<br>";
			$i++;
		}
		*/
		$i=0;
		foreach ($rows as $row){
			$Arreglo[$i] = $row;
			$i++;
		}		
		return $Arreglo;
	}
?>