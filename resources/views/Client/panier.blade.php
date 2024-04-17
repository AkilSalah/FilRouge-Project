@extends('layouts.Client')
@section('title')
 Panier
@endsection
@section('main')
{{-- @dd($products); --}}
@php
    $sumTotal = 0 ;
@endphp
<div class="font-[sans-serif]">
    <div class="grid lg:grid-cols-3">
      <div class="lg:col-span-2 p-10 bg-white overflow-x-auto">
        <div class="flex border-b pb-4">
          <h2 class="text-2xl font-extrabold text-[#333] flex-1">Shopping Cart</h2>
          @if (!empty($products) && is_countable($products))
          <h3 class="text-xl font-extrabold text-[#333]">{{ count($products) }} Products</h3>
          @else
          <h3 class="text-xl font-extrabold text-[#333]">0 Products</h3>
          @endif
            </div>
        <div>
          <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
            <span class="font-medium">{{$message}} </span>
          </div>
          <table class="mt-6 w-full border-collapse divide-y">
            <thead class="whitespace-nowrap text-left">
              <tr>
                <th class="text-base text-[#333] p-4">Description</th>
                <th class="text-base text-[#333] p-4">Quantity</th>
                <th class="text-base text-[#333] p-4">Price</th>
              </tr>
            </thead>
            <tbody class="whitespace-nowrap divide-y">
             
              @foreach ($products as $product)
              
              <tr>
                <td class="py-6 px-4">
                  <div class="flex items-center gap-6 w-max">
                    <div class="h-36 shrink-0">
                      <img src='{{ asset($product->productImage) }}' class="w-full h-full object-contain" />
                    </div>
                    <div>
                      <p class="text-md font-bold text-[#333]"> {{$product->productName}} </p>
                      <form action="{{ route('deleteFromPanier', $product->id) }}" method="POST" >
                        @method('delete')
                        @csrf
                       <button type="submit" class="mt-4 font-semibold text-red-400 text-sm">
                        Remove
                      </button>
                      </form>
                    </div>
                  </div>
                </td>
                <td class="py-6 px-4">
                  <div class="flex divide-x border w-max">
                    
                    <button type="button" class="bg-transparent px-4 py-2 font-semibold text-[#333] text-md">
                      {{$product->pivot->quantite}}
                    </button>
                    <input type="hidden" name="quantity[]" value="{{$product->pivot->quantite}}">
                   
                  </div>
                </td>
                <td class="py-6 px-4">
                  <h4 class="text-md font-bold text-[#333]">{{$product->productPrice}} DH </h4>
                  @php
                      $sumTotal += $product->productPrice * $product->pivot->quantite;
                  @endphp
                <input type="hidden" name="totalAmount" value="{{ $sumTotal }}">
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="bg-gray-50 p-10">
        <h3 class="text-xl font-extrabold text-[#333] border-b pb-4">Order Summary</h3>
        <ul class="text-[#333] divide-y mt-6">
          <li class="flex flex-wrap gap-4 text-md py-4">Tax <span class="ml-auto font-bold">4.00 DH</span></li>
          <li class="flex flex-wrap gap-4 text-md py-4 font-bold">Total <span class="ml-auto">  {{$sumTotal}} DH</span></li>
        </ul>
        <form action="{{ route('checkout') }}"  method="GET">
          @csrf
          <button type="submit" class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Check
          out</button> 
        </form>
       
      </div>
    </div>
  </div>
    
@endsection

