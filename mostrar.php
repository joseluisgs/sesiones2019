<?php
    // Comenzamos la sesión para tratar las variables de sesión usadas
    session_start();
    // Si se ha pulsado el botón de borrar
    if(isset($_POST['borrar'])){
        // Preparamos el mensaje que nos avisará que los datos de sesión han sido eliminados
        $texto="Informaci&oacute;n de la sesi&oacute;n eliminada";
        // Eliminamos los valores de las variables utilizadas
        $idioma=$perfil=$zona=null;
        // Eliminamos las variables de sesion
        unset($_SESSION['preferencias']);
        // Hemos eliminado sólo la variable de sesión 'preferencias' pero como es la
        // única que existe (Por eso la he puesto como array) podríamos haber utilizado
        // la orden session_unset(); que elimina todas las variables de sesión

    // Comprobamos si se han recibido los datos de sesión (si venimos de la página index.html)
    }else if (isset($_SESSION['preferencias'])) {
        // Inicializamos las variables con los valores de sesión
        $idioma = $_SESSION['preferencias']['idioma'];
        $perfil = $_SESSION['preferencias']['perfil'];
        $zona = $_SESSION['preferencias']['zona'];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Preferencias sesiones DWES 1.0</title>
        <link rel="stylesheet" type="text/css" href="tarea.css" />
    </head>
    <body>
        <!-- Si pulsamos el botón del formulario nos reenviará aquí -->
        <form id='datos' action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
        <?php
        // Comenzamos con el bloque de mensajes informativos
        echo"<fieldset>";
        // Ponemos una leyenda para al bloque 
        echo"   <legend>Preferencias</legend>";
        // Imprimimos el mensaje de datos borrados en el caso que hayamos pulsado su botón
        echo"   <span class='mensaje'>";
        if(isset($texto)) echo $texto;
        echo"   </span>";
        // Imprimimos el primer bloque informativo (idioma)
        echo"   <div class='campo'>
                    <label class='etiqueta'>Idioma:</label>
                    <br /><label class='texto'>".$idioma."</label>
                </div>";
        // Imprimimos el segundo bloque informativo (perfil)
        echo"   <div class='campo'>
                    <label class='etiqueta'>Perfil p&uacute;blico:</label>
                    <br /><label class='texto'>".$perfil."</label>
                </div>";
        // Imprimimos el tercer bloque informativo (zona)
        echo"   <div class='campo'>
                    <label class='etiqueta'>Zona horaria:</label>
                    <br /><label class='texto'>".$zona."</label>
                </div>";
        // Ponemos el botón de borrar
        echo"   <input type='submit' value='Borrar preferencias' name='borrar' />";
        // Ponemos el enlace que nos llevaría de nuevo a index.php
        echo"   <div class='campo'>
                    <a href='preferencias.php'>Establecer preferencias</a>
                </div>";
        echo"</fieldset";
        ?>
        </form>
    </body>
</html>
