<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter un nouveau Service
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Ajout de enctype="multipart/form-data" pour permettre le téléversement de fichiers --}}
                <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Titre</label>
                        <input id="title" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="mt-4">
                        <label for="slug">Slug (ex: signaletique)</label>
                        <input id="slug" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="slug" value="{{ old('slug') }}" required>
                    </div>
                    <div class="mt-4">
                        <label for="description">Description</label>
                        <textarea id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mt-4">
                        {{-- Remplacement par un champ de type "file" --}}
                        <label for="image">Image du service</label>
                        <input id="image" class="block mt-1 w-full" type="file" name="image" required>
                    </div>
                    <div class="mt-4">
                        {{-- Remplacement par un champ de type "file" --}}
                        <label for="icon">Icône du service</label>
                        <input id="icon" class="block mt-1 w-full" type="file" name="icon" required>
                    </div>
                    <div class="mt-4">
                        <label for="color">Couleur</label>
                        <select id="color" name="color" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="">-- Choisir une couleur --</option>
                            <option value="lightyellow" @if(old('color') == 'lightyellow') selected @endif>Jaune clair (lightyellow)</option>
                            <option value="red" @if(old('color') == 'red') selected @endif>Rouge (red)</option>
                            <option value="blue" @if(old('color') == 'blue') selected @endif>Bleu (blue)</option>
                            <option value="yellow" @if(old('color') == 'yellow') selected @endif>Jaune (yellow)</option>
                            <option value="darkblue" @if(old('color') == 'darkblue') selected @endif>Bleu foncé (darkblue)</option>
                            <option value="green" @if(old('color') == 'green') selected @endif>Vert (green)</option>
                            <option value="orange" @if(old('color') == 'orange') selected @endif>Orange (orange)</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
