<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar tarea</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>
    <div>
        <h1 class="text-center text-uppercase p-4">
            Editar tarea
        </h1>
        <div class="text-center container">
            <div class="w-50 m-auto">
                <div class="card card-body">
                    <form action="/tasks/{{$task->id}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group my-4">
                            <input type="text" name="task-title" class="form-control"
                                placeholder="Título de la tarea" required value="{{ $task->title }}">
                        </div>

                        <div class="form-group mb-4">
                            <textarea name="task-description" class="form-control" placeholder="Descripción de la tarea" required>{{ $task->description }}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <select name="task-status" class="form-select">
                                <option disabled>Estado de la tarea</option>
                                @foreach ($statusList as $status)
                                    <option value="{{ $status->id }}"
                                        @if ($status == $task->getStatus) selected @endif>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-grid">
                            <input type="submit" class="btn btn-success btn-primary text-uppercase py-3"
                                name="add-task" value="Editar">
                        </div>
                    </form>
                    <div class="mt-4">
                        @if (session('status'))
                            <div class="alert alert-success">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
</body>

</html>
