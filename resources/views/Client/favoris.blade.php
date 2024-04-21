@extends('layouts.Client')
@section('title')
    Products favoris
@endsection
@section('main')
<div class="text-center max-w-xl mx-auto">
    <h2 class="text-3xl mt-10 font-extrabold text-[#333] inline-block">FAVORITE PRODUCTS</h2>
  </div>
<div class="font-[sans-serif] mt-10 ">
    <div class=" p-4 mx-auto lg:max-w-7xl sm:max-w-full">
        <div class="Alll grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($favoris as $productFavoris)
            <a href="{{ route('ProductDetails', ['ProductId' => $productFavoris->product->id]) }}">
                <div class="bg-gray-200 rounded-2xl p-6 hover:-translate-y-2 transition-all relative" data-product-id="{{ $productFavoris->product->id }}">
                    {{-- <form class="favorisForm" action="{{ route('Add.favoris', ['productId' => $productFavoris->product->id, 'clientId' => Auth::user()->id]) }}" method="POST"> --}}
                        @csrf
                        <div class="bg-gray-200 w-10 h-10 flex items-center justify-center rounded-full cursor-pointer absolute top-4 right-4">
                            <button type="submit" onclick="toggleFavorite(event, '{{ $productFavoris->product->id }}', '{{ Auth::user()->id }}')">
                                <svg id="heart" class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="25px" fill="#ff0000" viewBox="0 0 512 512">
                                    <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                                </svg>
                            </button>
                        </div>
                    {{-- </form> --}}
                    <div class="w-11/12 h-[220px] overflow-hidden mx-auto aspect-w-16 aspect-h-8 md:mb-2 mb-4">
                        <img src="{{ asset($productFavoris->product->productImage) }}" alt="Product 1"
                            class="h-full w-full object-contain" />
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $productFavoris->product->productName }} </h3>
                        <p class="text-gray-500 text-sm mt-2">
                            {{ substr($productFavoris->product->productDescription, 0, 60) }}...</p>
                        <div class="flex items-center justify-between ">
                            <div>
                                <h4 class="text-lg text-gray-700 font-bold mt-4">{{ $productFavoris->product->productPrice }}
                                    DH</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>                        
            @endforeach
        </div>
        {{-- <div class="w-11/12 mx-auto my-8">{{ $favoris->links() }}</div> --}}
    </div>
</div>




@endsection