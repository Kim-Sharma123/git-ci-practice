<div style="max-width: 600px; margin: auto; text-align: center;">
    <h2>Task List</h2>

    <!-- Add New Task -->
    <div style="margin-bottom: 20px;">
        <input type="text" wire:model.defer="newTaskTitle" placeholder="New task..." style="width:70%; padding:8px;" />
        <button wire:click="addTask" style="padding:8px 12px;">Add</button>
        @error('newTaskTitle') <div style="color:red;">{{ $message }}</div> @enderror
    </div>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%;">
        <tr>
            <th>Task</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @forelse ($tasks as $task)
        <tr>
            <td>
                @if($editTaskId === $task->id)
                    <input type="text" wire:model.defer="editTaskTitle" style="width:100%;" />
                    @error('editTaskTitle') <div style="color:red;">{{ $message }}</div> @enderror
                @else
                    <span style="{{ $task->is_completed ? 'text-decoration: line-through;' : '' }}">
                        {{ $task->title }}
                    </span>
                @endif
            </td>

            <td>
                {{ $task->is_completed ? 'Completed' : 'Pending' }}
            </td>

            <td>
                @if($editTaskId === $task->id)
                    <button wire:click="updateTask" style="padding:4px 8px;">Save</button>
                    <button wire:click="$set('editTaskId', null)" style="padding:4px 8px;">Cancel</button>
                @else
                    <button wire:click="editTask({{ $task->id }})" style="padding:4px 8px;">Edit</button>
                    <button wire:click="toggleComplete({{ $task->id }})" style="padding:4px 8px;">
                        {{ $task->is_completed ? 'Undo' : 'Complete' }}
                    </button>
                    <button wire:click="deleteTask({{ $task->id }})" style="padding:4px 8px; color:red;">Delete</button>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No tasks yet.</td>
        </tr>
        @endforelse
    </table>
</div>
