<?php 
  include "scrap.php";
  $km = (float) $_POST['km'];
  $color = $_POST['color'];
  $gas = $_POST['gasolina'];
  $cilindraje = $_POST['cilindros'];
  $camino = $_POST['camino'];

  $Array = imprimir("http://www.gasolinamx.com/estado/jalisco/guadalajara","table.table.table-bordered.col-md-8 tbody tr td");
  if(strcmp("M", $gas) == 0){
  	$precioGas = (String) $Array[1];
  }elseif (strcmp("P", $gas) == 0) {
  	$precioGas = (String) $Array[3];
  } 
  if(strcmp("4", $cilindraje) == 0){
  	$km_l = 13;
  }elseif (strcmp("6", $cilindraje) == 0) {
  	$km_l = 10;
  }else{

  }
  if(strcmp("ciudad", $camino) == 0){
  	$km_l;
  }elseif (strcmp("carretera", $camino) == 0) {
  	$km_l += 4; 
  }else{

  }  
  $lts_requeridos = round($km/$km_l,2); 
  $precioTotal = $lts_requeridos * (float)$precioGas;
  //echo $km."-".$color."-".$gas."-".$cilindraje."-".$camino;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gasapp</title>
	<link rel="stylesheet" href="stylesheet.css" type="text/css">
	<meta name="keywords" content="">
  	<meta charset="utf-8">
</head>
<body>
	<h1>GASAPP</h1>
	<P>"Lorem Ipsum"</P>
	<div class="result">
		<div class="cont_prin">
			<ul>
				<li>Distancia:</li>
				<p><?php echo $km; ?> Km</p>
				<li>Litros Requeridos:</li>
				<p><?php echo $lts_requeridos;?> Lts</p>
				<li>Costo por Litro:</li>
				<p>$<?php echo $precioGas; ?></p>
				<li>Costo Total:</li>
				<p class="total">$ <?php echo $precioTotal;?></p>
			</ul>
		</div>
	</div>
	<a href="index.html">Regresar</a>
	<script type="text/javascript" src="javascript.js">	</script>
</body>
</html>