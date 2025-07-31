<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('admin.task.index');
    }

    public function edit(Task $task)
    {

        $users = User::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get();

        return view('admin.task.edit', compact('task', 'users', 'categories'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated() + ['user_id' => auth()->id()]);

        return to_route('admin.tasks.index')->with('message', 'Task Updated');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('admin.tasks.index')->with('message', 'Task Deleted !');
    }

    public function showAuthAssignedTasks()
    {
        $authAssignedTasks = Task::with('user', 'category')
            ->where('assigned_to_user_id', auth()->id())->paginate(15);

        return view('admin.task.assigned_tasks', compact('authAssignedTasks'));
    }

    public function taskCompleteButton($id)
    {
        $switchTaskStatus = Task::where('assigned_to_user_id', auth()->id())->findOrFail($id);

        if ($switchTaskStatus->completed) {
            return to_route('admin.auth_tasks.index')->with('message', 'Task Already Completed !');
        }

        $switchTaskStatus->completed = true;
        $switchTaskStatus->completed_at = now()->toDateString();
        $switchTaskStatus->save();

        return to_route('admin.auth_tasks.index')->with('message', 'Task Status Updated !');
    }

    public function showSingleAssignedTask($id)
    {
        $task = Task::with('user', 'category')
            ->where('assigned_to_user_id', auth()->id())->findOrFail($id);

        return view('admin.task.show_single_assign_task', compact('task'));
    }
}
