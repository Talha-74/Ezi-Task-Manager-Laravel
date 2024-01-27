<?php $i = 1; ?>
@foreach ($completedTasks as $task)
<tr>
    <td>
        {{ $i++ }}
    </td>
    <td>{{$task->title }}</td>
    <td>{{ $task->description }}</td>
    <td><span class="badge-pill badge-primary">{{ $task->status }}</span></td>
    @if(auth()->user()->roles->where('name', 'User')->isEmpty())
    <td>
        <form method="POST" action="{{ route('task.destroy', ['id' => $task->id]) }}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn" onclick="return confirm('Are You Sure to Delete Task?'); ">
                <i class="bi bi-trash3-fill"></i>
            </button>
        </form>
        <button data-bs-toggle="modal" data-bs-target="#editTask" class="update_task" data-id="{{ $task->id }}"
            data-title="{{ $task->title }}" data-description="{{ $task->description }}"
            data-status="{{ $task->status }}">
            <i class="bi bi-pencil-square"></i>
        </button>
    </td>
    @endif
</tr>
@endforeach