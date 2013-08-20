<?php include_once("xajax_pais.php");?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
	<link href="../css/style.css" rel="stylesheet">

<!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	 <?php
	 		  	$xajax->printJavascript();
	 ?>
 
</head>
 <body onLoad="inicio()">
 <div class="grid">
 <div class="c6">
   <div id="divoperaciones">
    <button type="button" onClick="vNuevo_pais()">Nuevo</button>
    <!-- <button type="button" onClick="veliminar()">Eliminar</button> -->
</div>
 </div>
 <div class="c6 text-right">
    <form id="frmBuscar"  name="frmBuscar" action="" class="form-search" method="post" > 
    <label for="">Buscar</label>
    <input type="search" id="PaisNombre_" name="PaisNombre_" onKeyUp="vListar_pais()">  
    <button type="button" onclick="vListar_pais()" class="btn"><i class="icon-search"></i>Buscar</button> 
    </form> 
 </div>
 
<div id="divformulario"><?php include_once("Registrar_pais.php");?></div>
 <div id="divlistar"></div>
</div>
     <script>
         function vListar_pais(){
          <?php $flistar->printScript();?> ;  
          console.log("mLISTARRRRRRRRRRR ");

         } 
         function vNuevo_pais(){
          <?php $fnuevo->printScript();?> ; 
          console.log("metodo nuevo pais ");
         }
         function editar(id){
          <?php $feditar->printScript();?>
         }
         function Registrar(id){
          <?php $fregistrar_pais->printScript();?>
         }         
         function mostrar()
         {
          <?php $fmostrar->printScript();?>
         }
         function ocultar()
         {
          <?php $focultar->printScript();?>
         }
         function eliminar(id){
          var eliminar = confirm("Esta seguro de Eliminar el Registro?")
          if(eliminar){
            <?php $feliminar->printScript();?>;
          // console.log("Eliminar : "+ id);
          }

         }
       function inicio(){
          <?php $focultar->printScript();?>;         
          <?php $flistar->printScript();?>;         
         }
         
      </script>
</body>
</html>