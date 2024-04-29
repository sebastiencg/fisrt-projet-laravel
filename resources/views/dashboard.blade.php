<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('create.post') }}">
                        create post
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-screen-lg mx-auto px-4">
        @if ($posts->isEmpty())
            <h5>Aucun post trouvé.</h5>
        @else
            <ul>
                @foreach ($posts as $post)
                    <a href="{{ route('show.post', ['id' => $post->id]) }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                    </a>
                @endforeach
            </ul>
        @endif
        <!-- Votre contenu ici -->



    </div>


</x-app-layout>
