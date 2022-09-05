/*
 * Fetch delete method and hide task item.
 */
const deleteTask = (id, csrf) => {
    fetch(`/tasks/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrf,
        }
    }).then(res => {
        console.log(res);
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
            taskId,
            csrf
        }
    } = event.relatedTarget;
    const modalTaskTitle = document.getElementById('modal-task-title');
    modalTaskTitle.innerHTML = taskTitle;
    const modalButtonConfirm = document.getElementById('modal-button-confirm');
    modalButtonConfirm.onclick = () => deleteTask(taskId, csrf);
})
