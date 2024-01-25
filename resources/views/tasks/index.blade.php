<x-app-layout>
    <div class="container" style="width: 60%">
        <div class="container mt-4 mb-2 text-center">
            <h1 style="font-size: 30px;">Ezi Task Manager</h1>
        </div>

        {{-- Success and Error Session --}}
        @if (session()->has('success'))
        <div class="alert alert-success" style="display: flex; align-items: center;">
            {{ session()->get('success') }}
            <button type="button" class="close" aria-hidden="true" style="margin-left: auto; margin-right: 0;"
                onclick="this.parentElement.style.display='none'">X</button>
        </div>
        @elseif (session()->has('error'))
        <div class="alert alert-danger" style="display: flex; align-items: center;">
            {{ session()->get('error') }}
            <button type="button" class="close" aria-hidden="true" style="margin-left: auto; margin-right: 0;"
                onclick="this.parentElement.style.display='none'">x</button>
        </div>
        @endif

        {{-- Tabs --}}
        <ul class="nav nav-tabs mb-2 mt-2">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-list-task"></i> ALL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-alarm"></i> To Do</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-square"></i> in Progress</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-check2-square"></i> Completed</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> --}}
        </ul>

        @if(auth()->user()->roles->where('name', 'Admin')->isNotEmpty())
        <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addTask">
                <i class="bi bi-plus mr-1"></i> Add task
            </button>
        </div>
        @endif

        <div class="d-flex align-items-center justify-content-center">
            <table class="table table-hover table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        @if(auth()->user()->roles->where('name', 'User')->isEmpty())
                        <th scope="col">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>{{$task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td><span class="badge-pill badge-primary">{{ $task->status }}</span></td>
                        @if(auth()->user()->roles->where('name', 'User')->isEmpty())
                        <td>
                            <form method="POST" action="{{ route('task.destroy', ['id' => $task->id]) }}"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"
                                    onclick="return confirm('Are You Sure to Delete Task?'); ">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                            <button data-bs-toggle="modal" data-bs-target="#editTask" class="update_task"
                                data-id="{{ $task->id }}" data-title="{{ $task->title }}"
                                data-description="{{ $task->description }}" data-status="{{ $task->status }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add Task Modal --}}
    <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Task</h2>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('task.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3" style="position: relative;">
                            <label class="control-label mb-2" for="title">Title <code>*</code></label>
                            <input type="text" class="form-control rounded-2" name="title" id="title"
                                placeholder="task title" required>
                            {{-- <i class="bi bi-list-check"
                                style="position: absolute; top:37px; right:10px; font-size:24px;"></i> --}}
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label mb-2" for="description">Description <code>*</code></label>
                            <textarea type="text" class="form-control rounded-2" name="description" id="description"
                                placeholder="Task Description" required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-warning">
                    <button class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

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
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="To Do" required>
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
</x-app-layout>
