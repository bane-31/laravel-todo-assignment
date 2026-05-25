<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Projects
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 shadow-sm">
                        <strong class="font-bold">Oops! Something went wrong:</strong>
                        <ul class="list-disc pl-5 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="/projects" class="mb-8 p-4 bg-gray-50 rounded shadow-sm border">
                    @csrf
                    <h3 class="font-bold text-gray-700 mb-2">Create a New Project</h3>
                    <div class="flex flex-col space-y-4">
                        <input type="text" name="title" placeholder="Project Title" class="border rounded px-3 py-2 w-full mb-2" required>
                        @error('title')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        <input type="text" name="description" placeholder="Project Description (Optional)" class="border rounded px-3 py-2 w-full">
                        @error('description')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        <button type="submit" class="w-fit bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                            Add Project
                        </button>
                    </div>
                </form>

                @if($projects->isEmpty())
                    <p class="text-gray-500 italic">You don't have any projects yet. Create one to get started.</p>
                @else
                    @foreach($projects as $project)
                        <div class="border p-6 mb-6 rounded shadow bg-white">
                            <h3 class="text-2xl font-bold text-gray-800">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $project->description }}</p>

                            <hr class="mb-4">

                            <form action="/tasks" method="POST" class="mb-4 flex flex-col space-y-2">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <input type="text" name="task_title" placeholder="What needs to be done?" class="border rounded px-3 py-1 flex-grow text-sm" required>
                                @error('task_title')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded text-sm">
                                    Add Task
                                </button>
                            </form>

                            @if($project->tasks->isEmpty())
                                <p class="text-sm text-gray-400 italic">No tasks for this project yet.</p>
                            @else
                                <ul class="space-y-2">
                                    @foreach($project->tasks as $task)
                                        <li class="flex items-center justify-between p-2 rounded {{ $task->is_completed ? 'bg-gray-100' : 'bg-gray-50 border' }}">
                                            
                                            <span class="{{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-700' }}">
                                                {{ $task->title }}
                                            </span>

                                            @if(!$task->is_completed)
                                                <form action="/tasks/{{ $task->id }}/complete" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-xs text-green-600 hover:text-green-800 font-bold border border-green-600 hover:bg-green-50 px-2 py-1 rounded">
                                                        Complete ✓
                                                    </button>
                                                </form>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
</x-app-layout>