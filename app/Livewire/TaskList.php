<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskList extends Component
{
    public $tasks;
    public $newTaskTitle = '';
    public $editTaskId = null;
    public $editTaskTitle = '';

    protected $rules = [
        'newTaskTitle' => 'required|min:1',
        'editTaskTitle' => 'required|min:1',
    ];

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
    }

    // Add a new task
    public function addTask()
    {
        $this->validateOnly('newTaskTitle');

        Task::create(['title' => $this->newTaskTitle]);

        $this->newTaskTitle = '';
        $this->loadTasks();
    }

    // Start editing a task
    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        $this->editTaskId = $task->id;
        $this->editTaskTitle = $task->title;
    }

    // Update task
    public function updateTask()
    {
        $this->validateOnly('editTaskTitle');

        $task = Task::findOrFail($this->editTaskId);
        $task->title = $this->editTaskTitle;
        $task->save();

        $this->editTaskId = null;
        $this->editTaskTitle = '';
        $this->loadTasks();
    }

    // Mark task complete / incomplete
    public function toggleComplete($id)
    {
        $task = Task::findOrFail($id);
        $task->is_completed = !$task->is_completed;
        $task->save();

        $this->loadTasks();
    }

    // Delete a task
    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();
        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
