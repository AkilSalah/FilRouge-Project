@extends('layouts.Client')
@section('title')
Get your tickets
@endsection
@section('main')
<div class="bg-gray-50 text-[#333] mt-6 mb-16 w-full rounded font-[sans-serif] overflow-hidden">
   @if ($notificationTicket->isNotEmpty() )
    @foreach ($notificationTicket as $getTicket)
    <div class="grid md:grid-cols-2 border-red-800 mb-5 lg:grid-cols-3 gap-5 items-center">
     <div class="lg:col-span-2 py-10 px-6">
        <h1 class="text-3xl font-bold">{{$getTicket->voyage->title}} </h1>
        <p class="mt-4 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc
          et
          tempus blandit, metus mi consectetur nibh, a pharetra felis turpis vitae ligula. Etiam laoreet velit nec neque
          ultrices, non consequat mauris tincidunt.</p>
          
          <a href="{{ route('pdf', ['id' => $getTicket->id]) }}">
              <button class="px-6 py-3 mt-10 rounded text-white text-sm tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700">
                  Get the Free Ticket
              </button>
            </a>                 
      </div>
      {{-- <img src="{{ asset($getTicket->voyage->image) }}" class="w-full mt-4 h-full object-cover shrink-0" /> --}}
    </div>
    <hr>   
    @endforeach
    </div> 
    @else
    <div class=" border border-red-800 rounded-full bg-red-100 hover:bg-red-200 mt-16">
      <p class="text-4xl text-center px-4 py-2">No reservations have been confirmed yet</p>
    </div>







</h1>
@endif


@endsection