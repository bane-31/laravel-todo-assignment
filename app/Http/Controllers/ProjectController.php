<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);
    
        $request->user()->projects()->create($validated);
    
        return redirect('/projects');
    }

    public function index(Request $request)
    {
        $projects = $request->user()->projects()->with('tasks')->get();

        return view('projects.index', compact('projects'));
    }
}
