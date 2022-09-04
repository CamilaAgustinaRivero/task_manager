<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task Manager</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>
    <h1 class="text-center text-uppercase p-4">
        Task Manager
    </h1>
    <div class="mx-5">
        <div class=" mb-4 d-flex justify-content-end">
            <button class="btn btn-success d-flex align-items-center justify-content-between">
                <span class="pe-2">Agregar tarea</span>
                <ion-icon name="add-circle-outline" size="large"></ion-icon>
            </button>
        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr id="task-{{ $task->id }}" class="align-middle">
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->getFormattedCreatedAt() }}</td>
                            <td>{{ $task->getStatus->name }}</td>
                            <td>
                                <div class="btn-group d-flex justify-content-center align-items-center">
                                    <button class="btn btn-warning">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <button class="btn btn-danger">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
