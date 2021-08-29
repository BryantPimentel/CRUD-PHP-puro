<?php
    include('db.php');

    if (isset($_GET['id_empleados'])) {
        $id = $_GET['id_empleados'];
        $query = "DELETE FROM empleado WHERE id_empleados = $id"; //eliminar lo que esté almacenado en el id que me da la variable
        $result = mysqli_query($conn, $query);


        if (!$result) {

            die("Fail"); //si no existe resultado mostrar mensaje fail
        }
            // si si existe mostar un mensaje y volver a la pàgina principal

        $_SESSION['message'] = 'Los datos se eliminaron satisfactoriamente.';
        $_SESSION['message_type'] = 'danger'; //color del mensaje
        header('Location: index.php');  
    }

?>

