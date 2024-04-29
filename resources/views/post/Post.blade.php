<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <!-- Titre du post -->
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>

                        <!-- Contenu du post -->
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{$post->content}}</p>

                        <!-- Boutons -->
                        <div class="flex justify-between mt-4">

                            <!-- Bouton "Update" -->
                            <a href="{{ route("updatePage.post", ["id" => $post->id]) }}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" style="padding: 10px;">
                                Update
                            </a>

                            <!-- Espace entre les boutons -->
                            <div class="w-4"></div>

                            <!-- Bouton "Delete" -->
                            <!-- Lien de suppression -->
                            <a href="#" onclick="deletePost(event, {{ $post->id }})" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" style="padding: 10px;">
                                Delete
                            </a>

                            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                            <script>
                                function deletePost(event, postId) {
                                    event.preventDefault();

                                    if (confirm('Êtes-vous sûr de vouloir supprimer ce post ?')) {
                                        axios.delete('{{ route("delete.post", ["id" => $post->id]) }}')
                                            .then(function (response) {
                                                // Gérer la réponse de suppression réussie
                                                console.log(response.data);
                                                // Rafraîchir la page ou effectuer d'autres actions
                                                window.location.href = '{{ route("dashboard") }}';
                                            })
                                            .catch(function (error) {
                                                // Gérer les erreurs de suppression
                                                console.error(error);
                                                // Afficher un message d'erreur ou effectuer d'autres actions
                                                window.location.href = '{{ route("dashboard") }}';

                                            });
                                    }
                                }
                            </script>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
