@extends('layouts.Client')
@section('title')
    Articles Details
@endsection
@section('main')
<div class="container my-16 mx-auto md:px-6">
    <!-- Section: Design Block -->
    <section class="mb-32">
      <h2 class="mb-16 text-center text-2xl font-bold">Latest articles</h2>
  
      <div class="mb-16 flex flex-wrap">
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pr-6">
          <div
            class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
            data-te-ripple-init data-te-ripple-color="light">
            <img src="{{ asset($article->image) }}" class="w-full" alt="Louvre" />
            <a href="#!">
              <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
              </div>
            </a>
          </div>
        </div>
  
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 lg:pl-6">
          <h3 class="mb-4 text-2xl font-bold">{{$article->title }} </h3>
          <div class="mb-4 flex items-center text-sm font-medium text-danger dark:text-danger-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
              stroke="currentColor" class="mr-2 h-5 w-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
            </svg>
            {{$article->theme->title}}
          </div>
          <p class="mb-6 text-sm text-neutral-500 dark:text-neutral-400">
            Published  <u> {{ $article->created_at->format('d-M-y') }} </u> by
            <a href="#!">{{ $article->client->user->Name}} </a>
          </p>
          <p class="mb-6 text-neutral-500 dark:text-neutral-300">
            {{ $article->description }} 
          </p>
          
        </div>
      </div>
    </section>
    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
        <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
              <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (numbre)</h2>
          </div>
          <form action="{{ route('commentStore', $article->id) }}" method="POST" class="mb-6">
            @csrf
              <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                  <label for="comment" class="sr-only">Your comment</label>
                  <textarea id="comment" rows="6" name="comment" 
                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                      placeholder="Write a comment..." required></textarea>
              </div>
              <button type="submit"
                  class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-black bg-blue-300 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                  Post comment
              </button>
          </form>
          @foreach ($comments as $comment)
            <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
              <footer class="flex justify-between items-center mb-2">
                  <div class="flex items-center">
                      <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                              class="mr-2 w-6 h-6 rounded-full"
                              src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                              alt="Michael Gough"> {{$comment->article->client->user->Name}} </p>
                      <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                              title="February 8th, 2022"> {{ $comment->created_at->format('d-m-y') }} </time></p>
                  </div>
                  <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                      class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                      type="button">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                          <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                      </svg>
                      <span class="sr-only">Comment settings</span>
                  </button>
                  <!-- Dropdown menu -->
                  <div id="dropdownComment1"
                      class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                      <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                          aria-labelledby="dropdownMenuIconHorizontalButton">
                          <li>
                              <a href="#"
                                  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                          </li>
                          <li>
                              <a href="#"
                                  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                          </li>
                      </ul>
                  </div>
              </footer>
              <p class="text-gray-500 dark:text-gray-400">{{ $comment->commentaire}}</p>
          </article>   
          @endforeach
         
          
        </div>
      </section>
  </div>
@endsection