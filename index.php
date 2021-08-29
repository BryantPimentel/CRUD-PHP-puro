<?php include('db.php'); ?>

    <?php include('includes/header.php'); ?>

        <main class="container p-4">
            <div class="row">

                <div class="col-md-4">

                    <?php if(isset ($_SESSION['message'])) {?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?=$_SESSION['message'] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <!--mensaje de alerta con bootstrap-->
                        <?php session_unset(); } ?>
                            <!--cierra el mesaje de alerta al refrescar la página-->

                            <div class="card card-body">

                                <form action="save.php" method="POST">

                                    <div class="form-group">

                                        <p>
                                            <input type="text" name="nombres" class="form-control" placeholder="Nombre" autofocus>
                                        </p>
                                        <p>
                                            <input type="text" name="apellidos" class="form-control" placeholder="Apellido" autofocus>
                                        </p>
                                        <p>
                                            <input type="text" name="direccion" class="form-control" placeholder="Dirección" autofocus>
                                        </p>
                                        <p>
                                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" autofocus>
                                        </p>
                                        <p>
                                            <select class="form-control" name="puesto" placeholder="Puesto" autofocus>
                                            <option value=0>--- Puesto ---</option>
                                            <?php
                                                $query = "SELECT id_puesto as id , puesto FROM puesto";
                                                $result_usuario = mysqli_query($conn, $query);
                                                while($fila = $result_usuario->fetch_assoc()){
                                                    echo "<option value=".$fila['id'].">".$fila['puesto']."</option>";
                                                }
                                            ?>
                                            </select>
                                        </p>
                                        <p>
                                            <input type="date" name="fecha" class="form-control" placeholder="Fecha_Nacimiento" autofocus>
                                        </p>

                                    </div>
                                    <input type="submit" class="btn btn-success btn block" name='save' value="Enviar">
                                </form>
                            </div>
                </div>

                <div class="col-md-8">

                    <table class="table table-border">

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Puesto</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                        $query = "SELECT *  FROM empleado";
                        $result_usuario = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result_usuario)){ ?>
                                <!--recorro mi tabla usuario-->
                                <tr>
                                    <td>
                                        <?php echo $row['nombres']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['apellidos']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['direccion']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['telefono']; ?>
                                    </td>
                                    <td>
                                        
                                        <?php echo $row['id_puesto']; 
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['fecha_nacimiento']; ?>
                                    </td>
                                    <td><a href="edit.php?id_empleados=<?php echo $row['id_empleados'] ?>">Editar</a>
                                        <a href="delete.php?id_empleados=<?php echo $row['id_empleados'] ?>">Eliminar</a>
                                    </td>
                                </tr>
                                
                                <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

        <?php include('includes/footer.php'); ?>
