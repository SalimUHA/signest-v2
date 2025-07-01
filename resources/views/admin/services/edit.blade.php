<x-app-layout>
    {{-- On ajoute le script d'Alpine.js dans le head de cette page spécifique --}}
    <x-slot name="head">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le service : {{ $service->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                        <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                    </div>
                @endif

                {{-- On initialise Alpine.js avec nos données. On s'assure que toutes les clés existent. --}}
                <div x-data='{
                    pageContent: {{ json_encode($service->page_content ?? ["description" => [], "key_benefits" => [], "portfolio_examples" => []]) }}
                }'>
                    <form id="service-form" method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data"
                          x-on:submit="document.getElementById('page_content_textarea').value = JSON.stringify(pageContent)">
                        @csrf
                        @method('PATCH')

                        {{-- Tes champs simples (ne changent pas) --}}
                        <div><label for="title" class="font-bold">Titre</label><input id="title" class="block mt-1 w-full rounded" type="text" name="title" value="{{ $service->title }}" required></div>
                        <div class="mt-4"><label for="slug" class="font-bold">Slug</label><input id="slug" class="block mt-1 w-full rounded" type="text" name="slug" value="{{ $service->slug }}" required></div>
                        <div class="mt-4"><label for="description" class="font-bold">Description courte (pour les cartes)</label><textarea id="description" class="block mt-1 w-full rounded" name="description" required>{{ $service->description }}</textarea></div>
                        <div class="mt-4"><label for="image" class="font-bold">Image de la carte (Laisser vide pour ne pas changer)</label><input id="image" class="block mt-1 w-full" type="file" name="image"><img src="{{ asset($service->image) }}" alt="Image" class="h-20 mt-2 border p-1 rounded"></div>
                        <div class="mt-4"><label for="icon" class="font-bold">Icône (Laisser vide pour ne pas changer)</label><input id="icon" class="block mt-1 w-full" type="file" name="icon"><img src="{{ asset($service->icon) }}" alt="Icone" class="h-16 mt-2 border p-1 rounded"></div>
                        <div class="mt-4"><label for="color" class="font-bold">Couleur</label><select id="color" name="color" class="block mt-1 w-full rounded" required>@foreach ($colors as $color)<option value="{{ $color }}" @if($service->color == $color) selected @endif>{{ ucfirst($color) }}</option>@endforeach</select></div>

                        <hr class="my-8">

                        <h3 class="text-xl font-bold text-gray-800 mb-4">Éditeur de Contenu de Page</h3>

                        {{-- ▼▼▼ SECTION POUR LE CONTENU PRINCIPAL (PARAGRAPHES, TITRES, LISTES) ▼▼▼ --}}
                        <div class="mt-6 p-4 border rounded-md">
                            <h4 class="font-semibold">Contenu Principal</h4>
                            <div class="space-y-4">
                                <template x-for="(block, index) in pageContent.description" :key="index">
                                    <div class="p-3 border rounded bg-gray-50">
                                        <div class="flex justify-between items-center">
                                            <p class="text-sm font-medium">Bloc <span x-text="index + 1"></span></p>
                                            <button type="button" @click="pageContent.description.splice(index, 1)" class="text-xs text-red-500 hover:text-red-700">Supprimer ce bloc</button>
                                        </div>
                                        <div class="mt-2">
                                            <label class="text-xs">Type de Bloc</label>
                                            <select x-model="block.type" class="w-full rounded-md border-gray-300 text-sm">
                                                <option value="paragraph">Paragraphe</option>
                                                <option value="heading">Titre</option>
                                                <option value="list">Liste</option>
                                            </select>
                                        </div>
                                        <div x-show="block.type === 'paragraph' || block.type === 'heading'" class="mt-2">
                                            <label class="text-xs">Contenu</label>
                                            <textarea class="w-full rounded-md border-gray-300 text-sm" x-model="block.content"></textarea>
                                        </div>
                                        <div x-show="block.type === 'list'" class="mt-2 p-2 border-l-4 border-gray-200">
                                            <h5 class="text-xs font-bold mb-2">Éléments de la liste</h5>
                                            <template x-for="(item, itemIndex) in block.items" :key="itemIndex">
                                                <div class="flex items-start mt-2">
                                                    <div class="flex-grow">
                                                        <input type="text" placeholder="Titre de l'élément" class="w-full rounded-md border-gray-300 text-sm" x-model="item.title">
                                                        <textarea placeholder="Description de l'élément" class="w-full rounded-md border-gray-300 text-sm mt-1" x-model="item.description"></textarea>
                                                    </div>
                                                    <button type="button" @click="block.items.splice(itemIndex, 1)" class="ml-2 text-red-500 hover:text-red-700 text-xs">Supprimer</button>
                                                </div>
                                            </template>
                                            <button type="button" @click="block.items.push({title: '', description: ''})" class="mt-2 text-xs text-blue-500 hover:text-blue-700">+ Ajouter un élément à la liste</button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <button type="button" @click="pageContent.description.push({type: 'paragraph', content: '', items: []})" class="mt-2 text-sm text-blue-500 hover:text-blue-700">+ Ajouter un bloc de contenu</button>
                        </div>

                        {{-- SECTION POUR LES POINTS CLÉS --}}
                        <div class="mt-6 p-4 border rounded-md">
                            <h4 class="font-semibold">Points Clés</h4>
                            <template x-for="(benefit, index) in pageContent.key_benefits" :key="index">
                                <div class="flex items-center mt-2">
                                    <input type="text" class="flex-grow rounded-md border-gray-300" x-model="pageContent.key_benefits[index]">
                                    <button type="button" @click="pageContent.key_benefits.splice(index, 1)" class="ml-2 text-red-500 hover:text-red-700">Supprimer</button>
                                </div>
                            </template>
                            <button type="button" @click="pageContent.key_benefits.push('')" class="mt-2 text-sm text-blue-500 hover:text-blue-700">+ Ajouter un point clé</button>
                        </div>

                        {{-- SECTION POUR LE PORTFOLIO --}}
                        <div class="mt-6 p-4 border rounded-md">
                            <h4 class="font-semibold">Exemples de Réalisations</h4>
                            <template x-for="(example, index) in pageContent.portfolio_examples" :key="index">
                                <div class="p-3 my-2 border rounded bg-gray-50">
                                    <p class="text-sm font-medium">Exemple <span x-text="index + 1"></span></p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                        <div><label class="text-xs">Titre</label><input type="text" class="w-full rounded-md border-gray-300" x-model="example.title"></div>
                                        <div><label class="text-xs">Image (ex: images/nom.jpg)</label><input type="text" class="w-full rounded-md border-gray-300" x-model="example.image"></div>
                                        <div class="col-span-2"><label class="text-xs">Description</label><textarea class="w-full rounded-md border-gray-300" x-model="example.description"></textarea></div>
                                    </div>
                                    <button type="button" @click="pageContent.portfolio_examples.splice(index, 1)" class="mt-2 text-xs text-red-500 hover:text-red-700">Supprimer cet exemple</button>
                                </div>
                            </template>
                            <button type="button" @click="pageContent.portfolio_examples.push({title: '', image: '', description: ''})" class="mt-2 text-sm text-blue-500 hover:text-blue-700">+ Ajouter un exemple</button>
                        </div>

                        <textarea name="page_content" id="page_content_textarea" style="display: none;"></textarea>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Annuler</a>
                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
