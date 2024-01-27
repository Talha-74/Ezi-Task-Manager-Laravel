<!-- Edit Task Modal -->
<div class="modal fade" id="editTask" tabindex="-1" aria-labelledby="editTask" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Task</h2>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('task.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" id="id">
                    <div class="form-group mb-3" style="position: relative;">
                        <label class="control-label mb-2" for="title">Title<code>*</code></label>
                        <input type="text" class="form-control rounded-2" name="title" id="taskTitle"
                            placeholder="task title" required>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label mb-1" for="description">Description<code>*</code></label>
                        <textarea type="text" class="form-control rounded-2" name="description" id="description_id"
                            placeholder="Task Description" required></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label mb-2" for="status">Update Status<code>*</code></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="To Do"
                                required>
                            <label class="form-check-label" for="inlineRadio1">To Do</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                value="In Progress" required>
                            <label class="form-check-label" for="inlineRadio2">In Progress</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio3"
                                value="Completed" required>
                            <label class="form-check-label" for="inlineRadio3">Completed</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="reset" class="btn btn-warning">
                <button class="btn btn-success">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    $(document).on("click", ".update_task", function () {
            var taskId = $(this).data("id");
            var taskTitle = $(this).data("title");
            var taskDescription = $(this).data("description");
            var taskStatus = $(this).data("status");

            $("#id").val(taskId);
            $("#taskTitle").val(taskTitle);
            $("#description_id").val(taskDescription);
            $("input[name='status'][value='" + taskStatus + "']").prop("checked", true);
            });
</script>