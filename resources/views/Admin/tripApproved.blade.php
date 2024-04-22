@extends('layouts.Admin')
@section('title')
Approved 
@endsection
@section('main')
<main>
 <div class="head-title">
    <div class="left">
        <h1>Last trip</h1>
    </div>
</div>      
<x-session />

{{-- @dd($trips); --}}
<div class="grid grid-cols-1 md:grid-cols-1 gap-8 mt-10">
    @foreach ($trips as $trip)
        <div
            class="flex max-lg:flex-col bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] hover:scale-105 transition-all duration-300">
            <img src="{{ asset($trip->image) }}" alt="Blog Post 1"
                class="lg:w-2/5 min-h-[250px] h-full  " />
            <div class="p-6 lg:w-3/5">
                <h3 class="text-2xl font-bold text-blue-500"> {{ $trip->title }} </h3>
                <span class="text-sm block mb-2 mt-2 text-black-400 font-semibold">Published : {{$trip->created_at->format('d-m-Y')  }} | BY {{$trip->guide->user->Name}} </span>
                <div class="flex items-center  font-bold mt-4 text-gray-700">
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path
                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                    </svg>
                    <h1 class="px-2 text-sm">{{ \Carbon\Carbon::parse($trip->date)->format('d-m-Y') }}
                    </h1>
                </div>
                <div class="flex items-center mt-3 font-bold text-gray-700">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                        <path
                            d="M239.208 343.937c-17.78 10.103-38.342 15.876-60.255 15.876-21.909 0-42.467-5.771-60.246-15.87C71.544 358.331 42.643 406 32 448h293.912c-10.639-42-39.537-89.683-86.704-104.063zM178.953 120.035c-58.479 0-105.886 47.394-105.886 105.858 0 58.464 47.407 105.857 105.886 105.857s105.886-47.394 105.886-105.857c0-58.464-47.408-105.858-105.886-105.858zm0 186.488c-33.671 0-62.445-22.513-73.997-50.523H252.95c-11.554 28.011-40.326 50.523-73.997 50.523z" />
                        <g>
                            <path
                                d="M322.602 384H480c-10.638-42-39.537-81.691-86.703-96.072-17.781 10.104-38.343 15.873-60.256 15.873-14.823 0-29.024-2.654-42.168-7.49-7.445 12.47-16.927 25.592-27.974 34.906C289.245 341.354 309.146 364 322.602 384zM306.545 200h100.493c-11.554 28-40.327 50.293-73.997 50.293-8.875 0-17.404-1.692-25.375-4.51a128.411 128.411 0 0 1-6.52 25.118c10.066 3.174 20.779 4.862 31.895 4.862 58.479 0 105.886-47.41 105.886-105.872 0-58.465-47.407-105.866-105.886-105.866-37.49 0-70.427 19.703-89.243 49.09C275.607 131.383 298.961 163 306.545 200z" />
                        </g>
                    </svg>
                    <h1 class="px-2 text-sm">{{ $trip->nbPlaces }} seats disponible </h1>
                </div>
                <div class="flex font-bold items-center mt-3 text-gray-700">
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <h1 class="px-2 text-sm">{{ $trip->lieu }}</h1>
                </div>
                <p class="text-sm mt-10">{{ $trip->description }}</p>
                <div class="mt-10 flex gap-2 justify-end items-end ">
                    <form action="{{ route('publier', $trip->id) }}" method="POST" >
                        @csrf
                        @method('patch')
                        <button  class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="submit">
                        Publier
                    </button> 
                    </form>
                   
                    <form action="{{ route('trip.delete', $trip) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button
                            class="block text-red-500 hover:text-red-700 bg-blue-100 hover:bg-blue-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="submit">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
</main>

    
@endsection