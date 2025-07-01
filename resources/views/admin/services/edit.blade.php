<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le service : {{ $service->title }}
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

                <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Champs existants --}}
                    <div>
                        <label for="title">Titre</label>
                        <input id="title" class="block mt-1 w-full rounded-md shadow-sm" type="text" name="title" value="{{ old('title', $service->title) }}" required>
                    </div>
                    <div class="mt-4">
                        <label for="slug">Slug</label>
                        <input id="slug" class="block mt-1 w-full rounded-md shadow-sm" type="text" name="slug" value="{{ old('slug', $service->slug) }}" required>
                    </div>
                    <div class="mt-4">
                        <label for="description">Description (courte, pour les cartes)</label>
                        <textarea id="description" class="block mt-1 w-full rounded-md shadow-sm" name="description" required>{{ old('description', $service->description) }}</textarea>
                    </div>

                    {{-- Nouveau champ pour le contenu détaillé de la page --}}
                    <div class="mt-4">
                        <label for="content-editor">Contenu détaillé de la page</label>
                        <textarea id="content-editor" name="content" class="block mt-1 w-full rounded-md shadow-sm">{{ old('content', $service->content) }}</textarea>
                    </div>

                    {{-- Champs pour les images et la couleur --}}
                    <div class="mt-4">
                        <label for="image">Image du service (Laisser vide pour ne pas changer)</label>
                        <input id="image" class="block mt-1 w-full" type="file" name="image">
                        <div class="mt-2">
                            <p>Image actuelle :</p>
                            <img src="{{ asset($service->image) }}" alt="Image actuelle" class="h-20 w-auto rounded">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="icon">Icône du service (Laisser vide pour ne pas changer)</label>
                        <input id="icon" class="block mt-1 w-full" type="file" name="icon">
                        <div class="mt-2">
                            <p>Icône actuelle :</p>
                            <img src="{{ asset($service->icon) }}" alt="Icône actuelle" class="h-16 w-auto">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="color">Couleur</label>
                        <select id="color" name="color" class="block mt-1 w-full rounded-md shadow-sm" required>
                            <option value="">-- Choisir une couleur --</option>
                            @php
                                $colors = ['lightyellow', 'red', 'blue', 'yellow', 'darkblue', 'green', 'orange'];
                            @endphp
                            @foreach ($colors as $color)
                                <option value="{{ $color }}" @if(old('color', $service->color) == $color) selected @endif>{{ ucfirst($color) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea#content-editor',
                plugins: 'code table lists link image',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | link image'
            });
        </script>
    @endpush

</x-app-layout>
