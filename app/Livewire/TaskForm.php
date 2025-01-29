<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskForm extends Component
{
  public $taskTitle;
  public $taskDescription;
  public $taskDeadline;
  public $taskStatus;

  protected $rules = [
    'taskTitle' => 'required|string|max:255',
    'taskDescription' => 'required|string|max:1000',
    'taskDeadline' => 'required|date',
    'taskStatus' => 'required|in:PENDING,IN_PROGRESS,COMPLETED',
  ];

  public function createTask()
  {
    $this->validate();

    Task::create([
      'title' => $this->taskTitle,
      'description' => $this->taskDescription,
      'deadline' => $this->taskDeadline,
      'status' => $this->taskStatus,
    ]);

    $this->toastSuccess('Task created successfully!');

    $this->reset(['taskTitle', 'taskDescription', 'taskDeadline', 'taskStatus']);
  }

  public function render()
  {
    return view('livewire.task-form');
  }
}
