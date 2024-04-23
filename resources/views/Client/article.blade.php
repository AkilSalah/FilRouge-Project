@extends('layouts.Client')
@section('title')
    Articles
@endsection
@section('main')
    <!-- Container for demo purpose -->
    <div class="container my-16 mx-auto md:px-6">
        <!-- Section: Design Block -->
        <section class="mb-32">
            <style>
                .zoom:hover img {
                    transform: scale(1.1);
                }
            </style>
            <div class=" flex justify-between">
                <div>
                    <h2 class="mb-12 text-center text-3xl font-bold">Latest articles</h2>
                </div>
                <div>
                    <x-session />
                </div>
                
                <div>
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Ajouter un Article
                    </button>
                </div>
            </div>
            <div>
                <form action="{{ route('articles', $theme->id) }}" method="GET" id="filterButton" class="flex flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <button type="submit" name="tag" value="{{ $tag->id }}"
                                class="filterButton bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                            {{ $tag->tag }}
                        </button>
                    @endforeach
                </form>
                                                           
            </div>

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Article
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('storeArticle') }}" method="POST" enctype="multipart/form-data"
                            class="p-4 md:p-5">
                            @csrf
                            <input type="hidden" name="themeId" value="{{ $theme->id }}">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">image</label>
                                    <input type="file" name="image" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="$2999" required="">
                                </div>
                                <div class="col-span-2 ">
                                    <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                    <div class="max-h-20 overflow-y-auto">
                                        @foreach ($tags as $tag)
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input type="checkbox" value="{{ $tag->id }}" name="tags[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" multiple>
                                                <label class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $tag->tag }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                </div>
                                <div class="col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Description</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write product description here"></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add new article
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        <div class=" Alll grid mt-10 gap-6 lg:grid-cols-3">
                @foreach ($articles as $article)
                {{-- @dd($article->client->user->id); --}}
                <div class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-2 transition-all duration-300">
                    @if ($article->client->id_User === Auth::id())
                    <div id="dropdownMenuIconHorizontalButton_{{ $article->id }}" data-dropdown-toggle="dropdownDotsHorizontal_{{ $article->id }}" class=" bg-gray-100 w-10 h-10 flex items-center justify-center rounded-full cursor-pointer absolute top-4 right-4">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                        </svg>
                    </div>
                    @endif
                <div id="dropdownDotsHorizontal_{{ $article->id }}" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2" aria-labelledby="dropdownMenuIconHorizontalButton_{{ $article->id }}">
                <li>
                    <a data-modal-target="crud-modal_{{ $article->id }}" data-modal-toggle="crud-modal_{{ $article->id }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" type="button" >Edit</a>
                </li>
                <li>
                    <form action="{{ route('deleteArticle', $article->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                    </form>                    
                </li>
                </ul>
            </div>
                    <a href="{{ route('articleDetail', ["articleId" => $article->id]) }}">
                       <img src="{{ asset($article->image) }}" alt="Blog Post 1" class="w-full h-60 object-cover" />
                    <div class="p-6">
                        <span class="text-sm block text-gray-400 mb-2">{{ $article->created_at->format('d-m-y') }}  | BY {{ $article->client->user->Name }}</span>
                        <h3 class="text-xl font-bold text-[#333]">{{ $article->title }}</h3>
                    </div>  
                    </a>
                   
                </div>
            @endforeach
    @foreach ($articles as $article)
    <div id="crud-modal_{{ $article->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Article
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal_{{ $article->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Fermer le modal</span>
                    </button>
                </div>
                <!-- Corps du Modal -->
                <form action="{{ route('updateArticle', $article->id) }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="themeId" value="{{ $theme->id }}">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" value="{{ $article->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                            @if($article->image)
                                <img src="{{ asset($article->image) }}" alt="article Image" class="mb-2 max-w-full h-auto">
                            @else
                                <p class="text-gray-500">Aucune image disponible</p>
                            @endif
                            <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="event image">
                        </div>
                        <div class="col-span-2 ">
                            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                            <div class="max-h-20 overflow-y-auto">
                                @foreach ($tags as $tag)
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input type="checkbox" 
                                           value="{{ $tag->id }}" 
                                           name="tags[]" 
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                           @if (in_array($tag->id, json_decode($article->articleTags)))
                                                checked
                                            @endif
                                    >
                                    <label class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $tag->tag }}</label>
                                </div>
                            @endforeach
                            
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article Description</label>
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here">{{ $article->description }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Update article
                    </button>
                </form>
            </div>
        </div>
    </div>
@endforeach

            </div>
        </section>
    </div>

@endsection
{{-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.filterButton').on('click', function() {
            var tag = $(this).val();

            $.ajax({
                url: '{{ route("Client.filter") }}', 
                method: 'GET',
                data: {
                    tag: tag
                },
                dataType: 'json', 
                success: function(response) {
                   
                    $('.Alll').empty(); 
                    response.forEach(article => {
                        const html = `
                        


                       
                        `;
                    
                        $('.Alll').append(html);
                    });
                },
                error: function(xhr) {
                    console.log('Erreur lors de la récupération des articles filtrés :', xhr.responseText);
                }
            });

        });

       
    });
</script> --}}
