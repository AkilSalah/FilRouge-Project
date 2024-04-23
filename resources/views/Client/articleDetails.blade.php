@extends('layouts.Client')
@section('title')
    Articles Details
@endsection
@section('main')
<div class="container my-16 mx-auto md:px-6">
    <!-- Section: Design Block -->
    <section >
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
                              alt="Michael Gough"> {{$comment->client->user->Name}} </p>
                      <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                              title="February 8th, 2022"> {{ $comment->created_at->format('d-m-y') }} </time></p>
                  </div>
                  @if ($comment->client->user->id === Auth::id())
                  <button id="dropdownComment1Button_{{$comment->id}}" data-dropdown-toggle="dropdownComment1_{{$comment->id}}"
                      class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                      type="button">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                          <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                      </svg>
                      <span class="sr-only">Comment settings</span>
                  </button>
                  @endif
                  <!-- Dropdown menu -->
                  <div id="dropdownComment1_{{$comment->id}}"
                      class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                      <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                          aria-labelledby="dropdownMenuIconHorizontalButton_{{$comment->id}}">
                          <li>
                              <a  data-modal-target="crud-modal_{{$comment->id}}" data-modal-toggle="crud-modal_{{$comment->id}}"
                                  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                          </li>
                          <li>
                            <form action="{{ route('commentDelete', $comment->id) }}"  method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit" class="block text-red-700 py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                            </form>
                             
                          </li>
                      </ul>
                  </div>
              </footer>
              <p class="text-gray-500 dark:text-gray-400">{{ $comment->commentaire}}</p>
          </article>   
          <div id="crud-modal_{{$comment->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Update your comment
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal_{{$comment->id}}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('commentUpdate', $comment->id ) }}" method="POST" class="p-4 md:p-5">
                       @csrf
                       @method('put')
                      <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New comment</label>
                                <textarea id="description"  rows="4" name="comment" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a new comment here">{{$comment->commentaire}}</textarea>                    
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex justify-center items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
                          Save
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