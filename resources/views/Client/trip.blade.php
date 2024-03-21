@extends('layouts.Client')
@section('title')
 Fishing trips
@endsection
@section('main')

<div class="relative bg-gradient-to-r mt-2 from-purple-900 to-indigo-800 py-16 font-[sans-serif]">
    <div class="absolute inset-0">
      <img src="{{ asset('/images/tripsback.jpg') }}" alt="Background Image" class="w-full h-full object-cover opacity-50" />
    </div>
    <div class="relative max-w-screen-xl mx-auto px-8 z-10 text-center text-white">
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">Fishing trips</h1>
      <p class="text-lg md:text-xl mb-8">Experience excellence like never before with our exclusive coach and services.</p>
    </div>
  </div>

<div class="bg-white font-[sans-serif] p-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-xl mx-auto">
            <h2 class="text-3xl font-extrabold text-[#333] inline-block">LATEST TRIPS</h2>
          </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 max-md:max-w-lg mx-auto">
        @foreach ($trips as $trip)
        <a href="{{ route('client.trip.show', ['trip'=> $trip->id ]) }}">
         <div class="bg-white cursor-pointer rounded overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-50">
         <img src="{{ asset($trip->image) }}" alt="Blog Post 1" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
          <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
            <span class="text-sm block mb-2 text-yellow-400 font-semibold">{{$trip->created_at->format('d-m-Y')  }} | BY {{$trip->guide->user->name}} </span>
            <h3 class="text-xl font-bold text-white"> {{$trip->title}} </h3>  
            <div class="mt-4">
              <p class="text-gray-200 text-sm "> {{$trip->description}}</p>
            </div>
          </div>   
        </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>


@endsection