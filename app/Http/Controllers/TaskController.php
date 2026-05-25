<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'task_title' => ['required', 'string', 'max:255'],
            'project_id' => ['required', 'integer', 'exists:projects,id'], 
        ]);

        $project = Project::findOrFail($validated['project_id']);

        abort_if($project->user_id !== $request->user()->id, 403, 'You don\'t have access to this project.');

        $project->tasks()->create([
            'title' => $validated['task_title']
        ]);

        return back();
    }

    public function markComplete(Request $request, Task $task): RedirectResponse
    {
        abort_if($task->project->user_id !== $request->user()->id, 403);

        $task->update(['is_completed' => true]);

        return back();
    }
}
