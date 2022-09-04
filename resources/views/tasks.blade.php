<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Listado de tareas</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>


</head>

<body>
    <h1 class="text-center text-uppercase p-4">
        Listado de tareas
    </h1>

    <div class="mx-5">
        <div class=" mb-4 d-flex justify-content-end">
            <a href="/tasks/create" class="btn btn-success d-flex align-items-center justify-content-between">
                <span class="pe-2 text-uppercase">Agregar tarea</span>
                <ion-icon name="add-circle-outline" size="large"></ion-icon>
            </a>
        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-uppercase">
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
                                    <button data-task-id='{{ $task->id }}' data-task-title='{{ $task->title }}'
                                        class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTaskModal">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteTaskModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteTaskModalLabel">Eliminar tarea</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Va a eliminar la tarea: <span id='modal-task-title'></span> ¿Está seguro?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="modal-button-confirm" data-bs-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del modal -->
    </div>

</body>

</html>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    /*
     * Fetch delete method and hide task item.
     */
    const deleteTask = (id) => {
        fetch(`tasks/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }
        });
        document.getElementById(`task-${id}`).style.display = 'none';
    }

    /*
     * Add event listener for deleteModal, 
     * then extract taskTitle and taskId from datasets.
     * Finally add behavior 'deleteTask()' to modalButtonConfirm
     */
    const deleteModal = document.getElementById('deleteTaskModal');
    deleteModal.addEventListener('show.bs.modal', event => {
        const {
            dataset: {
                taskTitle,
                taskId
            }
        } = event.relatedTarget;
        const modalTaskTitle = document.getElementById('modal-task-title');
        modalTaskTitle.innerHTML = taskTitle;
        const modalButtonConfirm = document.getElementById('modal-button-confirm');
        modalButtonConfirm.onclick = () => deleteTask(taskId);
    })
</script>
