<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Moji Projekti
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Novi Projekt
                    </a>
                </div>

                @if($projects->isEmpty())
                    <p>Nemate nijedan projekt. Kreirajte novi projekt da biste započeli.</p>
                @else
                    <form method="POST" action="{{ route('projects.store') }}" class="mb-4">
                        @csrf
                        <div class="flex space-x-4">
                            <input type="text" name="title" placeholder="Naziv Projekta" class="border rounded px-3 py-2 w-full" required>
                            <input type="text" name="description" placeholder="Opis Projekta" class="border rounded px-3 py-2 w-full" required>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Dodaj Projekt
                            </button>
                        </div>
                    </form>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2">Naziv Projekta</th>
                                <th class="py-2">Opis</th>
                                <th class="py-2">Akcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td class="py-2">{{ $project->title }}</td>
                                    <td class="py-2">{{ $project->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>