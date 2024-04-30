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