<?php 

include("db.php");

if(isset($_POST['save'])) { //si existe save, guardar en cada variable los datos ingresados por el usuario
    $nombre=$_POST['nombres'];  //guardo cada dato ingredado
    $apellido=$_POST['apellidos'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono']; 
    $puesto=$_POST['puesto'];
    $fecha=$_POST['fecha'];

    $query="INSERT INTO empleado(nombres, apellidos, direccion, telefono, fecha_nacimiento, id_puesto) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$fecha', '$puesto')"; //guardo cada variable en la tabla usuario de mi base de datos
    $result=mysqli_query($conn, $query); 


    if (!$result) { //si result no es cierto dar un mensaje de fail
        die("Fail");
    }
    

    $_SESSION['message'] = "Guardado con éxito.";
    $_SESSION['message_type'] = 'success';


    header("Location: index.php");
}

?>