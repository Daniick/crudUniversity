<?php

use Models\Asig;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Asig.php';

$a = new Asig;
$b = $a->clases();
$q = new Asig;
$k = $q->traerMaestro();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Bootstrap con Paginación y Búsqueda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<style>
    .table {
        width: 95%;
        margin: 20px auto;
        padding: 0;
    }

    .table td {
        border-right: 1px solid #C0C0C0;
        /* Establece el estilo y color de la línea divisoria */
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
                <h2 class="titulo">Lista de Clases</h2>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <!-- <button href="../index.php?controller=AuthController&action=create" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nuevo Usuario
                </button> -->
                <button type="button" class="btn btn-primary float-end mr-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Agregar Clase
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Clase</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="../index.php?controller=AsigController&action=store" method="post">
                            <div class="mb-3">
                                <label for="asignatura"><strong>Nombre de la Materia</strong></label>
                                <input type="text" name="asignatura" class="form-control" placeholder="Ingresa Nueva Materia">
                            </div>

                            <div class="mb-3">
                                <label for="asignatura_id"><strong>Maestros disponible para las clases</strong></label>
                                <select class="form-select" name="nombre" id="selectProfesores">
                                    <!-- Aquí se pueden agregar opciones de profesores -->
                                    <option value="" selected><strong>Seleccionar Profesor</strong></option>
                                    <?php foreach ($k as $maestros) : ?>

                                        <option value="<?= $maestros['profesor'] ?>"><?= $maestros['nombre'] ?> <?= $maestros['apellido'] ?></option>
                                    <?php endforeach; ?>
                                    <!-- Agregar más opciones según sea necesario -->
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


    <div class="row ml-5 mr-5 tabla">
        <div class="col-12">
            <table id="datatable_users" class="table table-striped ">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Clase</th>
                        <th>Maestro</th>
                        <!-- <th>Alumnos Inscritos</th> -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($b as $asignaturas) : ?>
                        <tr>
                            <td><?= $asignaturas['id'] ?></td>
                            <td><?= $asignaturas['asignatura']  ?></td>
                            <td><?= $asignaturas['nombre']  ?><?= $asignaturas['profesor_id'] ?> <?= $asignaturas['apellido']  ?></td>
                            <!-- <td>No hay alumnos</td> -->
                            <td>
                                <!-- Agregar enlaces a Bootstrap y jQuery si no están incluidos -->
                                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                <!-- Botón con icono para activar el modal -->
                                <a href="../index.php?controller=AsigController&action=update&id=<?= $asignaturas['id'] ?>" class="fa-regular fa-pen-to-square" data-toggle="modal" data-target="#actualizarMateriaModal_<?= $asignaturas['id'] ?>" style="color: green;"></a>



                                <!-- Modal para actualizar la materia -->
                                <div class="modal fade" id="actualizarMateriaModal_<?= $asignaturas['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="actualizarMateriaModalLabel_<?= $asignaturas['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="actualizarMateriaModalLabel">Actualizar Materia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../index.php?controller=AsigController&action=update&id=<?= $asignaturas['id'] ?> " method="POST">
                                                    <div class="mb-3">
                                                        <label for="name">Nombre de la Materia</label>

                                                        <input type="text" name="asignatura" class="form-control" placeholder="Ingresa Materia" value="<?= $asignaturas['asignatura'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selectProfesores">Maestro Asignado</label>

                                                        <!-- SELECT * FROM usuarios WHERE asignatura_id IS NULL AND rol_id = 2; -->

                                                        <select class="form-select" name="profesor_id" id="selectProfesores">
                                                            <!-- Aquí se pueden agregar opciones de profesores -->
                                                            <option value="" selected>Seleccione una opcion</option>
                                                            <?php foreach ($k as $maestros) : ?>

                                                                <option value="<?= $maestros['profesor'] ?>"> <?= $maestros['nombre'] ?> <?= $maestros['apellido'] ?></option>
                                                            <?php endforeach; ?>
                                                            <!-- Agregar más opciones según sea necesario -->
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../index.php?controller=AsigController&action=destroy&id=<?= $asignaturas['id'] ?>" class="fa-solid fa-trash-can " style="color: rgb(170, 11, 11);;"></a>
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