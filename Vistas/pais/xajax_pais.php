<?php 
//Archivo: xajaxPersona.php
@require ('../xajax/xajax_core/xajax.inc.php');
$xajax= new xajax();
$xajax->configure('javascript URI','../xajax/');
$xajax->configure('debug',false);

include_once "../../Modelado/Modelo_pais.php"; 
include_once "../validacion.php"; 
include_once "../cixajax.php"; 

function xListar_pais($formulario){
	// $titulo="Listar pais";

   	$enpais=new Clase_pais();   
	$enpais->setPaisNombre(validar($formulario["PaisNombre_"])) ; 
	$data=$enpais->Listar_pais();

	$cix=new CixAJAX();
  	$Listar_pais=$cix->ImprimeTableF("tablapais",$data,"editar","eliminar","table");
     
    $objResp=new xajaxResponse();
    $objResp->assign("divlistar","innerHTML", $Listar_pais);
    return $objResp;

}
function xNuevo_pais(){	
	$titulo="Nuevo Pais";
	$objResp=new xajaxResponse(); 
	$objResp->assign('accion','value',"Nuevo");	
	$objResp->assign("TituloForm","innerHTML",	$titulo);
	$objResp->script("mostrar()");
	return $objResp;
}
function xEditar_pais($id){	
	$enpais=new Clase_pais();
	$enpais->setPaisId($id);
	$rptamo=$enpais->Buscar_pais();

	$PaisId=$rptamo["cuerpo"][0]["PaisId"];
	$PaisNombre=$rptamo["cuerpo"][0]["PaisNombre"];

	$titulo="Modificar Pais";
	$objResp=new xajaxResponse(); 
	$objResp->assign('accion','value',"Nuevo");		
	$objResp->assign("TituloForm","innerHTML",	$titulo);	
	$objResp->assign("PaisId_","value",	$PaisId);	
	$objResp->assign("PaisNombre_","value",	$PaisNombre);	

	$objResp->script("mostrar()");
	return $objResp;
}
function xRegistrar_pais($formulario){
	$enpais=new Clase_pais();
	$accion=$formulario["accion"];
	$enpais->setPaisNombre(validar($formulario["PaisNombre_"]));	

	$objResp=new xajaxResponse();
	if($accion=="Nuevo"){
		$rpta=$enpais->Insertar_pais();	
		$objResp->alert("Datos registrados correctamente!");		
	}
	else{
		$enpais->setPaisId(validar($formulario["PaisId_"]));
		$rpta=$enpais->Actualizar_pais();
		$objResp->alert("Datos actualizados  correctamente!");
	}
	$objResp->script("ocultar()");
	$objResp->script("vListar_pais()");

	return $objResp;

}

function xEliminar_pais($id){
	$enpais=new Clase_pais();
	$enpais->setPaisId($id);
	$rpta=$enpais->Eliminar_pais();

	$objResp=new xajaxResponse();		

	if($rpta==0){
		$objResp->alert(" Registro Eliminado Correctamente ");		
		$objResp->script("vListar_pais()");
	}else{
	 $objResp->alert("El Registro no se puede Eliminar ");	
	}
	return $objResp;
}

function ver($estado){
	if($estado==0) $valor="none";
	else $valor="";
	$objResp=new xajaxResponse();
	$objResp->assign('divformulario','style.display',$valor);
	return $objResp;
}

$flistar=& $xajax->registerFunction('xListar_pais');
$flistar->setParameter(0,XAJAX_FORM_VALUES,'frmBuscar');


$fnuevo=& $xajax->registerFunction('xNuevo_pais');

$feditar=& $xajax->registerFunction('xEditar_pais');
$feditar->setParameter(0,XAJAX_JS_VALUE,'id');

$fregistrar_pais=& $xajax->registerFunction('xRegistrar_pais');
$fregistrar_pais->setParameter(0,XAJAX_FORM_VALUES,'frmRegistrar_pais');

$feliminar=& $xajax->registerFunction('xEliminar_pais');
$feliminar->setParameter(0,XAJAX_JS_VALUE,'id');

$fmostrar=& $xajax-> registerFunction('ver');
$fmostrar->setParameter(0,XAJAX_JS_VALUE,1);

$focultar=& $xajax-> registerFunction('ver');
$focultar->setParameter(0,XAJAX_JS_VALUE,0);

$xajax->processRequest();


?>

