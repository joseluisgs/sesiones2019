<?php
    // Iniciamos sesion para capturar las variables
    session_start();
    
    // Preparamos las distintas opciones para los combos. Poniéndolos en un array
    // será fácil modificar el número de elementos
    $idioma=Array("Español","Inglés", "Frances", "Chino");
    $perfil=Array("Sí","No");
    $zona=Array("GMT -2","GMT -1","GMT","GMT +1","GMT +2");
    
    // Comprobamos si se han recibido los datos del formulario
    if (isset($_POST['enviar'])) {
        // Se cargan en la sesion los datos recibidos del formulario por post
        $_SESSION['preferencias']['idioma'] = $_POST['idio'];
        $_SESSION['preferencias']['perfil'] = $_POST['perf'];
        $_SESSION['preferencias']['zona'] = $_POST['zon'];
        // Se le da valor al texto que nos avisará que ya se han cargado los datos de la sesion
        $texto="Informaci&oacute;n guardada en la sesi&oacute;n";
        // Se cargan las variables que usaremos en el formulario con los datos almacenados en la sesion
        $idio=$_SESSION['preferencias']['idioma'];
        $perf=$_SESSION['preferencias']['perfil'];
        $zon=$_SESSION['preferencias']['zona'];
    }
    // Si se reciben datos de la sesión, se almacenan en sus correspondientes variables
    if(isset($_SESSION['preferencias'])){
        $idio=$_SESSION['preferencias']['idioma'];
        $perf=$_SESSION['preferencias']['perfil'];
        $zon=$_SESSION['preferencias']['zona'];
    // Si no se han enviado datos de la sesión, se inicializan los valores de los 
    // combos y los datos de sesión
    }else{
        $idio = $_SESSION['preferencias']['idioma'] = $idioma[0];
        $perf = $_SESSION['preferencias']['perfil'] = $perfil[0];
        $zon = $_SESSION['preferencias']['zona'] = $zona[0];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <!-- El contenido será una página html con caracteres utf-8 -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Ponemos el título de la página -->
        <title>Sesiones DWES 1.0</title>
        <!-- Incluimos la página que contiene los estilos a usar -->
        <link rel="stylesheet" type="text/css" href="estilos.css" />
    </head>
    <body>
        <!-- Iniciamos el formulario que nos llevará de nuevo a esta página -->
        <form id='datos' action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
        <?php
        // Agrupamos todos los elementos del formulario con el estilo definido para ello en el fichero dwes.css
        echo"<fieldset>";
        // Ponemos el título para la agrupación creada con fieldset
        echo"   <legend>Preferencias</legend>";
        // se prepara el lugar para el mensaje que pondremos cuando tengamos guardada la sesion
        echo"   <span class='mensaje'>";
        // Comprobamos si se ha cargado el texto avisándonos que los datos están almacenados en la sesion
        if(isset($texto)) echo $texto;
        echo"   </span>";
        // comenzamos con los datos del idioma
        echo"   <div class='campo'>";
        // Ponemos la etiqueta del primer campo
        echo"       <label class='etiqueta'>Idioma:</label>";
        // Comenzamos con el select que recogerá su valor
        echo"           <select name='idio'>";
        // Ponemos tantos elementos como tengamos en el array de idiomas
        foreach($idioma as $i=>$value){
            echo"           <option value='".$idioma[$i]."' ";
            // Comprobamos (si hemos recibido valores por post) si coincide el valor
            // presentado con el valor recibido, en cuyo caso lo seleccionamos
            if($idioma[$i]==$idio) echo "selected";
            echo">".$idioma[$i]."</option>";
        }
        echo"           </select>
                    </div>";
        // comenzamos con los datos del perfil
        echo"       <div class='campo'>";
        // Ponemos la etiqueta del segundo campo
        echo"           <label class='etiqueta'>Perfil p&uacute;blico:</label>";
        // Comenzamos el select que recogerá su valor
        echo"           <select name='perf'>";
        // Ponemos tantos elementos como tengamos en el array de Perfil
        foreach($perfil as $i=>$value){
            echo"<option value='".$perfil[$i]."' ";
            // Comprobamos si coincide el valor presentado con el valor recibido,
            // si se han recibido datos por post, y entonces lo seleccionamos
            if($perfil[$i]==$perf) echo "selected";
            echo">".$perfil[$i]."</option>";
        }
        echo"           </select>
                    </div>";
        // comenzamos con los datos de la zona 
        echo"       <div class='campo'>";
        // Ponemos la etiqueta del tercer campo
        echo"           <label class='etiqueta'>Zona horaria:</label>";
        // Comenzamos el select que recogerá su valor
        echo"           <select name='zon'>";
        // Ponemos tantos elementos como tengamos en el array de zona
        foreach($zona as $i=>$value){
            echo"<option value='".$zona[$i]."' ";
            // Comprobamos si el valor recibido por post es igual al valor presentado
            // en cuyo caso lo seleccionamos
            if($zona[$i]==$zon) echo "selected";
            echo">".$zona[$i]."</option>";
        }
        echo"           </select>
                    </div>";
        // Ponemos el botón de envío de datos para reenviarnos la información seleccionada
        echo"       <input type='submit' value='Establecer preferencias' name='enviar' />";
        // Preparamos el lugar donde irá el enlace a la siguiente página (mostrar.php)
        echo"       <div class='campo'>
                        <a href='mostrar.php'>Mostrar preferencias</a>
                    </div>
                </fieldset";
        echo"</form>";
        ?>
    </body>
</html>
