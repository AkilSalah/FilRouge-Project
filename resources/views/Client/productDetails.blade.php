@extends('layouts.Client')
@section('title')
 Product View
@endsection
@section('main')
{{-- @dd($productDetails) --}}
<div class="font-[sans-serif] mt-16 mb-16">
    <div class="p-6 lg:max-w-6xl max-w-2xl mx-auto">
      <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="px-4 py-10 rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative">
            <img src="{{ asset($productDetails->productImage) }}" alt="Product" class="w-5/5 p-3 rounded object-cover" />
            <button type="button" class="absolute top-4 right-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" fill="#ccc" class="mr-1 hover:fill-[#333]" viewBox="0 0 64 64">
                <path d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z" data-original="#000000"></path>
              </svg>
            </button>
          </div>
        <div>
          <h2 class="text-2xl font-extrabold text-gray-800">{{$productDetails->productName}}</h2>
          <div class="flex flex-wrap gap-4 mt-4">
            <p class="text-gray-800 text-xl font-bold">{{$productDetails->productPrice}} Dh</p>
          </div>
          <div class="mt-8">
            <h3 class="text-lg font-bold text-gray-800">Choose Quantity</h3>
            <div class="flex flex-wrap gap-4 mt-4">
        <form action="{{ route('add_to_cart', $productDetails->id) }}" method="POST" class="max-w-xs mt-4" >
            @csrf
            <div class="relative flex items-center max-w-[11rem]">
                <button type="button" id="decrement-button" data-input-counter-decrement="bedrooms-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                    </svg>
                </button>
                <input type="text" name="quantity" readonly id="bedrooms-input" data-input-counter data-input-counter-min="1" data-input-counter-max="5" aria-describedby="helper-text-explanation" class="bg-gray-100 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-16 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value="1"  required />
                <button type="button" id="increment-button" data-input-counter-increment="bedrooms-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                </button>
            </div>
        </div>
        
           <button type="submit" class="w-full mt-4 px-4 py-3 bg-gray-800 hover:bg-gray-900 text-white font-bold rounded">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20px" height="20px" class="cursor-pointer hover:fill-[#3A72FC] inline" fill="#ffffff">
                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
              </svg>              
                Add to cart
            </button>
          </form>
          </div>
          <div class="mt-8">
            <h3 class="text-lg font-bold text-gray-800">About the product</h3>
            <ul class="space-y-3 list-disc mt-4 pl-4 text-sm text-gray-800">
              <li>{{$productDetails->productDescription}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection