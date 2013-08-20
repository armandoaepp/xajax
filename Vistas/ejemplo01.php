<?php
/**
 * 1.- Incluimos nuestra libreria.
 * 2.- Instanciamos un nuevo objeto XAJAX.
 * 3.- Registramos nuestra función login().
 * 4.- Procesamos el registro.
 * 5.- Especificamos la ruta de nuestra libreria JS
 **/

@include_once 'xajax/xajax_core/xajax.inc.php';

$xajax = new xajax();

$xajax->register(XAJAX_FUNCTION, 'login');

$xajax->processRequest();

$xajax->configure('javascript URI','xajax/');


/**
 *Xajax utiliza funciones y/o métodos PHP para crear las respuestas.
 *Creamos una función llamada login($post).
 *Xajax enviará los datos del formulario dentro de nuestro parámetro   
 *$post, claro pueden llamar el parámetro como ustedes quieran.
 **/

function login($post)
 {
 // Debemos crear una respuesta a XAJAX para nuestra función de la siguiente manera.
 
 $output = new xajaxResponse();
    
 // Recibimos los datos de nuestros inputs, de la misma forma que lo hariamos con un $_POST[].
 // Cabe destacar que estamos filtrando el contenido de los datos enviados por el usuario.
 // No queremos inyecciones de codigo verdad =).
 $user = htmlentities($post['user']);
 $pass = htmlentities($post['pass']);
 
 // Verificamos si los datos corresponden con nuestra "base de datos".
 $login = getLoginStatus($user,$pass); 
 
 // Creamos el mensaje de respuesta
 
 if($login)
   {
   $msg = "Haz ingresado exitosamente";   
   }
   else
   {
   $msg = "Tus datos son incorrectos"; 
   }
   
 // Enviamos nuestra respuesta a el DIV con ID "message" con xajax.
 
 $output->assign("message","innerHTML",$msg);
 
 // Y para finalizar debemos retornar nuestra salida XAJAX.
 
 return $output;
 }
 
 
function getLoginStatus($user,$pass)
 { 
 // No quiero entrar en detalles de conexion con bases de datos ya que ese no es el tema.
 // Para simplificar, vamos a utilizar 2 variables con 1 usuario y 1 contraseña solo 
 // para fines ilustrativos.
 // Para crear una conexion de base de datos se haría de la misma forma como siempre lo hemos hecho.
 // Si tienes dudas acerca de como crear una conexion de bases de datos en internet hay muchos tutoriales para ello.
 
 $testUser = "admin";
 $testPass = "0123456";
 
 // Si los datos ingresados en el formulario corresponden con nuestra "Base de datos" retornamos cierto.
 
 if($user == $testUser && $pass == $testPass)
   {
   return true;   
   } 
   else
   {
   return false;
   }
 }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ejemplo de formulario con XAJAX</title>
<?php
$xajax->printJavascript("xajax/");
?>
<style>
.container {
width:300px;
color:#FFF;
font-size:12px;
font-family:Verdana, Geneva, Sans-serif;
}
.top {
padding:5px;
background-color:#066;
}
.content{
padding:5px;
background-color:#079;
}
.message{
padding:5px;
font-weight:bold;
background-color:#000;
}
</style>
</head>
<body>
<div class="container">
  <div class="top">
    Ejemplo de formulario con XAJAX
  </div>
  <div class="content">
    <form id="formId">
      <p>
        Usuario: <input type="text" name="user" />
      </p>
      <p>
        Contrase&ntilde;a: <input type="text" name="pass" />
      </p>
      <input type="button" value="Enviar" onclick="xajax_login(xajax.getFormValues('formId'))" />
    </form>
  </div>
  <div id="message"  class="message">
  &nbsp;
  </div>
</div>
</body>
</html> 