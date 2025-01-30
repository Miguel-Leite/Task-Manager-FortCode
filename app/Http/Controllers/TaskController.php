<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

class TaskController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tasks = Task::all()->groupBy('status');

    return response()->json([
      'columns' => [
        [
          'title' => 'To Do',
          'color' => 'card-pending',
          'textColor' => 'text-blue-800',
          'tasks' => $tasks['PENDING'] ?? []
        ],
        [
          'title' => 'In Progress',
          'color' => 'card-in-progress',
          'textColor' => 'text-yellow-800',
          'tasks' => $tasks['IN_PROGRESS'] ?? []
        ],
        [
          'title' => 'Done',
          'color' => 'card-done',
          'textColor' => 'text-green-800',
          'tasks' => $tasks['COMPLETED'] ?? []
        ]
      ]
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('tasks');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $user = auth()->guard('web')->user();

    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'deadline' => 'required|date',
    ]);

    $task = Task::create([
      'title' => $request->title,
      'description' => $request->description,
      'deadline' => $request->deadline,
      'user_id' => $user->id,
    ]);

    $users = User::where('id', '!=', $user->id)->get();

    foreach ($users as $user) {
      $user->notify(new TaskCreatedNotification($task));
    }
    //Toaster::success('Task created successfully!');
    return response()->json($task);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'deadline' => 'required|date',
      'status' => 'required|in:PENDING,IN_PROGRESS,COMPLETED',
    ]);

    try {
      $task = Task::find($id);
      if ($task->status) {
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->save();
        // Toaster::success('Task updated successfully!');
        return response()->json($task);
      }
      return response()->json(['success' => false, 'message' => "Task not found."], 404);
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
  }

  public function updateStatus(Request $request, $id)
  {
    $request->validate([
      'status' => 'required|in:PENDING,IN_PROGRESS,COMPLETED',
    ]);
    try {
      $task = Task::find($id);
      if ($task) {
        $task->status = $request->status;
        $task->save();
        // Toaster::success('Task created successfully!');
        return response()->json(['success' => true, 'data' => $task]);
      }
      return response()->json(['success' => false, 'message' => "Task not found."], 404);
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {

    try {
      $task = Task::find($id);
      if ($task) {
        $task->delete();
        return response()->json(['success' => true, 'data' => $task]);
      }
      return response()->json(['success' => false, 'message' => "Task not found."], 404);
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
  }
}
