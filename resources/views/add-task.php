<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Agregar tarea</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>
    <div>
        <h1 class="text-center text-uppercase p-4">
            Agregar tarea
        </h1>
        <div class="text-center container">
            <div class="w-50 m-auto">
                <div class="card card-body">
                    <form action="#">
                        <div class="form-group mb-4">
                            <input type="text" name="task-title" class="form-control" placeholder="Título de la tarea" required>
                        </div>

                        <div class="form-group mb-4">
                            <textarea name="task-descripton" class="form-control" placeholder="Descripción de la tarea" required></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <select name="task-status" class="form-select">
                                <option disabled selected>Estado de la tarea</option>
                                <option value="pending">Pendiente</option>
                                <option value="done">Realizada</option>
                                <option value="inProgress">En progreso</option>
                            </select>
                        </div>

                        <div class="form-group d-grid">
                            <input type="submit" class="btn btn-success btn-primary text-uppercase" name="add-task" value="Agregar tarea">
                        </div>
                    </form>
                </div>
            </div>
</body>

</html>