<?php

use Models\Asig;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Asig.php';

$a = new Asig;
$b = $a->all();

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

    /* Estilos adicionales... */
</style>

<body>
    <div class="container my-10 ml-10">
        <div class="row">
            <div class="col-14">
                <h2 class="titulo">Lista de Maestros</h2>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <!-- <button href="../index.php?controller=AuthController&action=create" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nuevo Usuario
                </button> -->
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

                        <form action="../index.php?controller=AuthController&action=store" method="post">
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


    <div class="row">
        <div class="col-12">
            <table id="datatable_users" class="table table-striped ">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Fec. de Nacimiento</th>
                        <th>Clase Asignada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $usuario) : ?>
                        <tr>
                            <td><?= $usuario['id'] ?></td>
                            <td><?= $usuario['nombre'] ?> <?= $usuario['apellido'] ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td><?= $usuario['direccion'] ?></td>
                            <td><?= $usuario['nacimiento'] ?></td>
                            <td><?= $usuario['asignatura'] ?></td>

                            <td>

                                <!-- <a href="../index.php?controller=UserController&action=updateView&id=<?= $usuario['id'] ?>" class="fa-regular fa-pen-to-square" style="color: green;"></a>
 -->
                                <!-- CSS de Bootstrap -->
                                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

                                <!-- JavaScript de Bootstrap (requiere jQuery) -->
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


                                <!-- <a href="#" data-toggle="modal" data-target="#actualizarUsuario" class="fa-regular fa-pen-to-square" style="color: green;"></a> -->
                                <a href="#" data-toggle="modal" data-target="#actualizarUsuario<?= $usuario['id'] ?>" class="fa-regular fa-pen-to-square" style="color: green;"></a>


                                <!-- <div class="modal fade" id="actualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="actualizarUsuarioLabel" aria-hidden="true"> -->
                                <div class="modal fade" id="actualizarUsuario<?= $usuario['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="actualizarUsuarioLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="actualizarUsuarioLabel">Actualizar Usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- <form action="../index.php?controller=UserController&action=update&id=<?= $usuario['id'] ?> " method="POST"> -->
                                                <form action="../index.php?controller=UserController&action=update&id=<?= $usuario['id'] ?> " method="POST">
                                                    <div class="mb-3">
                                                        <label for="email">Correo Electronico</label>
                                                        <!-- <input type="text" name="email" class="form-control" placeholder="Ingresa email" value="<?= $usuario['email'] ?>"> -->
                                                        <input type="text" name="email" class="form-control" placeholder="Ingresa email" value="<?= $usuario['email'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="mb-3">
                                                            <label for="nombre">Nombre(s)</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Ingresa nombre(s) ">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="apellido">Apellidos(s)</label>
                                                        <input type="text" name="apellido" class="form-control" placeholder="Ingresa apellido(s)">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password">Contraseña</label>
                                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="direccion">Direccion</label>
                                                        <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="fechaNacimiento"><strong>Fecha de Nacimiento</strong></label>
                                                        <input type="date" name='nacimiento' class="form-control" id="nacimiento">
                                                    </div>
                                                    <div class="mb-3">
                                                        <select name="rol" class="form-select">
                                                            <option value="" disabled selected>Select Rol</option>
                                                            <option value="1">Administrador</option>
                                                            <option value="2">Maestro</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" name=" asignatura_id" id="asignatura_id">
                                                            <option value="" disabled selected>Seleccionar Asignatura</option>
                                                            <?php foreach ($b as $asignaturas) : ?>
                                                                <option value="<?= $asignaturas['id'] ?>"><?= $asignaturas['asignatura']  ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../index.php?controller=UserController&action=destroy&id=<?= $usuario['id'] ?>" class="fa-solid fa-trash-can " style="color: rgb(170, 11, 11);;"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Scripts JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable_users').DataTable({
                lengthMenu: [5, 10, 15, 20],
                searching: true,
                pageLength: 10
            });
        });
    </script>
</body>

</html>

<!-- <a href="../index.php?controller=AuthController&action=create" class="btn btn-secondary">Nuevo Usuario</a> -->


<!-- <td> <?php foreach ($b as $asignaturas) : ?>
                                    <?= $asignaturas['asignatura'] ?></td>
                        <?php endforeach; ?> -->