<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Task/Index', [
            'completedTasks' => Task::where('user_id', Auth::id())->where('completed', true)->get(),
            'notCompletedTasks' => Task::where('user_id', Auth::id())->where('completed', false)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Task/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required | max:255',
            'content' => 'required'
        ]);

        $request->user()->tasks()->create($validated);

        return redirect(route('task.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($task->id);

        return Inertia::render('Task/Task', [
             'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required | max:255',
            'content' => 'required'
        ]);

        $task->update($validated);

        return redirect(route('task.show', $task->id));
    }

    /**
     * Update the completed status of the specified resource in storage.
     */
    public function updateCompleted(Task $task)
    {
        $task->update([
            'completed' => !$task->completed,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect(route('task.index'));
    }
}
