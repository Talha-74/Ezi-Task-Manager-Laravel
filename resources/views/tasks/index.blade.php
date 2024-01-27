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

        @if(auth()->user()->roles->where('name', 'Admin')->isNotEmpty())
        <div class="d-flex justify-content-end mb-2 mt-3">
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addTask">
                <i class="bi bi-plus mr-1"></i> Add task
            </button>
        </div>
        @endif


<!-- Tabs -->
<ul class="nav nav-tabs mb-2 mt-2" id="myTabs">
    <li class="nav-item">
        <a class="nav-link {{ request()->query('status', 'All') === 'All' ? 'active' : '' }}" id="all-tab"
            href="{{ route('task.tabs', ['status' => 'All']) }}">
            <i class="bi bi-list-task"></i> ALL
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->query('status') === 'To Do' ? 'active' : '' }}" id="todo-tab"
            href="{{ route('task.tabs', ['status' => 'To Do']) }}">
            <i class="bi bi-alarm"></i> To Do
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->query('status') === 'In Progress' ? 'active' : '' }}" id="inprogress-tab"
            href="{{ route('task.tabs', ['status' => 'In Progress']) }}">
            <i class="bi bi-square"></i> In Progress
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->query('status') === 'Completed' ? 'active' : '' }}" id="completed-tab"
            href="{{ route('task.tabs', ['status' => 'Completed']) }}">
            <i class="bi bi-check2-square"></i> Completed
        </a>
    </li>
</ul>

<!-- Task List -->
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
            @if(request()->query('status', 'All') === 'All')
            @include('tasks.partials.task_list', ['tasks' => $tasks])
            @elseif(request()->query('status') === 'To Do')
            @include('tasks.partials.todo_list', ['todoTasks' => $todoTasks])
            @elseif(request()->query('status') === 'In Progress')
            @include('tasks.partials.inprogress_list', ['inProgressTasks' => $inProgressTasks])
            @elseif(request()->query('status') === 'Completed')
            @include('tasks.partials.completed_list', ['completedTasks' => $completedTasks])
            @endif
        </tbody>
    </table>
</div>

    </div>


    @include('tasks.create')
    @include('tasks.edit')
    {{-- @include('tasks.partials.task_list') --}}
<!-- Add this script block at the end of your Blade file, after including jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTabs a').on('click', function (e) {
            e.preventDefault();

            const tabId = $(this).attr('id').replace('-tab', '');
            const url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    // Log to the console to check if the AJAX request is successful
                    console.log('Success:', data);

                    // Uncomment the following lines if you want to replace content in the current tab
                    $('#myTabContent .tab-pane').removeClass('show active');
                    $(`#${tabId}`).addClass('show active');
                    
                    // Replace content of the current tab
                    $(`#${tabId}`).html(data);
                },
                error: function (xhr, status, error) {
                    // Log to the console to check if there is any error
                    console.log('Error:', status, error);
                }
            });
        });
    });
</script>
</x-app-layout>