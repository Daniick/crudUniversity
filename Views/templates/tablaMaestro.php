<?php

if (isset($_SESSION['traerAsignatura']) && !empty($_SESSION['traerAsignatura'])) {
    $asignatura = $_SESSION['traerAsignatura'];;
}

$info = $_SESSION['userData'];


// print_r($info);
// if (isset($_SESSION['userData'])) {
//     foreach ($_SESSION['userData'] as $key => $value) {
//         echo $key . ": " . $value . "<br>";
//     }
// } else {
//     echo "No hay datos de usuario en la sesión.";
// }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Bootstrap con Paginación y Búsqueda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<style>
    .table {
        width: 95%;
        margin: 20px auto;
        padding: 0;
    }

    .nav {
        background-color: #007bff;
        border: 1px solid gray;
        height: 40px;
        text-align: left;
    }

    .rol {
        padding: 5px;
        border-radius: 10px;

    }


    /* Estilos adicionales... */
</style>

<body>



    <div class="container my-10 ml-10">
        <div class="row">
            <div class="col-14">
                <h2 class="titulo">Maestro <?= $info['nombre'] ?> <?= $info['apellido'] ?> Clase: <?= $asignatura['asignatura'] ?></h2>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <!-- <button href="../index.php?controller=AuthController&action=create" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nuevo Usuario
                </button> -->
                <button type="button" class="btn btn-secondary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nuevo Usuario
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="../index.php?controller=AuthController&action=store" method="POST">
                            <div class="mb-3">
                                <label for="email"><strong>Correo Electronico</strong></label>
                                <input type="text" name="email" class="form-control" placeholder="Ingresa email">
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="nombre"><strong>Nombre(s)</strong></label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingresa nombre(s) ">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="apellido"><strong>Apellido(s)</strong></label>
                                <input type="text" name="apellido" class="form-control" placeholder="Ingresa apellido(s)">
                            </div>
                            <div class="mb-3">
                                <label for="password"><strong>Contraseña</strong></label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="direccion"><strong>Direccion</strong></label>
                                <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                            </div>
                            <div class="mb-3">
                                <label for="fechaNacimiento"><strong>Fecha de Nacimiento</strong></label>
                                <input type="date" name='nacimiento' class="form-control" id="nacimiento">
                            </div>
                            <div class="mb-3">
                                <select name="rol" class="form-select">
                                    <option value="" disabled selected><strong>Seleccionar Rol</strong></option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Maestro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name=" asignatura_id" id="asignatura_id">
                                    <option value="" disabled selected><strong>Seleccionar Asignatura</strong></option>
                                    <?php foreach ($b as $asignaturas) : ?>
                                        <option value="<?= $asignaturas['id'] ?>"><?= $asignaturas['asignatura']  ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!--  <div class="mb-3">
                                <label for="fechaNacimiento"><strong>asignatura</strong></label>
                                <input type="text" name='asignatura_id' class="form-control" id="asignatura_id">
                            </div> -->

                    </div>

                    <div class="text-center pb-4"> <!-- Contenedor para centrar el botón -->
                        <button type="submit" class="btn btn-secondary">Enviar</button>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="col-12">
            <div class="table-responsive">
                <table id="datatable_users" class="table table-striped ">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th class="text-center">#</th>

                            <th>Email / Usuario</th>
                            <th>Direccion</th>
                            <th>Fecha Nacimiento</th>

                            <th>Asignatura</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td><?= $info['id'] ?></td>
                            <td><?= $info['email'] ?></td>
                            <td><?= $info['direccion'] ?></td>
                            <td><?= $info['nacimiento'] ?> </td>
                            <td><?php
                                if (empty($asignatura['asignatura'])) {
                                    echo '<div style="display: inline-block; background-color: yellow; padding: 5px;  border-radius: 5px">Asignatura no registrada</div>';
                                } else {
                                    echo $asignatura['asignatura'];
                                }
                                ?></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Scripts JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>

<!-- <a href="../index.php?controller=AuthController&action=create" class="btn btn-secondary">Nuevo Usuario</a> -->


<!-- <td> <?php foreach ($b as $asignaturas) : ?>
                                    <?= $asignaturas['asignatura'] ?></td>
                        <?php endforeach; ?> -->