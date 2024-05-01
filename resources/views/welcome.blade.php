@extends('layouts.Client')
@section('title')
    Home
@endsection
@section('main')

    <style>
    .favorite-icon-red {
    fill: red;
}


    </style>
    <!-- ====== Hero Section Start -->
    <div class="relative mt-4 bg-white pb-[110px] pt-[120px] dark:bg-dark lg:pt-[70px]">
        <div class="container mx-auto">
            <div class=" flex flex-wrap items-center">
                <div class="w-full px-4 lg:w-5/12">
                    <div class="hero-content">
                        <h1
                            class="mb-5 text-4xl font-bold  !leading-[1.208] text-dark dark:text-white sm:text-[42px] lg:text-[40px] xl:text-5xl">
                            Your Fishing <br />
                            Adventure Begins<br />
                            Here
                        </h1>
                        <p class="mb-8 max-w-[480px] text-base text-body-color dark:text-dark-6">
                            Découvrez le meilleur équipement de pêche avec notre sélection de produits de qualité supérieure, trouvez tout ce dont vous avez besoin pour vivre des aventures inoubliables au bord de l'eau.

                        </p>
                        <ul class="flex flex-wrap items-center">
                            <li>
                                <a href="#about"
                                    class="inline-flex items-center justify-center rounded-md bg-blue-600 px-6 py-3 text-center text-base font-medium text-white hover:bg-blue-dark lg:px-7">
                                    View More
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="hidden px-4 lg:block lg:w-1/12"></div>
                <div class="w-full  px-4 lg:w-6/12">
                    <div class="lg:ml-auto lg:text-right">
                        <div class="relative z-10 inline-block pt-11 lg:pt-0">
                            <img src="{{ asset('/images/fgb-min-removebg.png') }}" alt="hero"
                                class="max-w-full lg:ml-auto" />
                            <span class="absolute -bottom-8 left-10 z-[-1]">
                                <svg width="93" height="93" viewBox="0 0 93 93" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="2.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="90.5" r="2.5" fill="#3056D3" />
                                </svg>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Hero Section End -->
    {{-- about section  --}}

    <section id="about" class="overflow-hidden bg-white pb-12 pt-10 dark:bg-dark lg:pb-[90px] lg:pt-[90px]">
        <h1
            class="mb-4 text-2xl font-bold text-center leading-none tracking-tight text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
            ABOUT <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">US</mark></h1>
        <div class="container mt-16 mx-auto">
            <div class=" flex flex-wrap items-center justify-between">
                <div class="w-full px-4 lg:w-6/12">
                    <div class="-mx-3 flex items-center sm:-mx-4">
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="py-3 sm:py-4">
                                <img src="{{ asset('/images/Untitled_design_10_.png') }}" alt="1"
                                    class="w-full rounded-2xl" />
                            </div>
                            <div class="py-3 sm:py-4">
                                <img src="{{ asset('/images/Untitled_design_11_.png') }}" alt="2"
                                    class="w-full rounded-2xl" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="relative z-10 my-4">
                                <img src="{{ asset('/images/Untitled_design_4_.jpg') }}" alt="3"
                                    class="w-full rounded-2xl" />
                                <span class="absolute -bottom-7 -right-7 z-[-1]">
                                    <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.66667" cy="104" r="1.66667"
                                            transform="rotate(-90 1.66667 104)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="104" r="1.66667"
                                            transform="rotate(-90 16.3333 104)" fill="#3056D3" />
                                        <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                            fill="#3056D3" />
                                        <circle cx="45.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 45.6667 104)" fill="#3056D3" />
                                        <circle cx="60.3334" cy="104" r="1.66667"
                                            transform="rotate(-90 60.3334 104)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 88.6667 104)" fill="#3056D3" />
                                        <circle cx="117.667" cy="104" r="1.66667"
                                            transform="rotate(-90 117.667 104)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 74.6667 104)" fill="#3056D3" />
                                        <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"
                                            fill="#3056D3" />
                                        <circle cx="1.66667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 89.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 89.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 31 89.3333)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 89.3333)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 60.3333 89.3338)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 88.6667 89.3338)" fill="#3056D3" />
                                        <circle cx="117.667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 117.667 89.3338)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 74.6667 89.3338)" fill="#3056D3" />
                                        <circle cx="103" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 103 89.3338)" fill="#3056D3" />
                                        <circle cx="132" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 132 89.3338)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="74.6673" r="1.66667"
                                            transform="rotate(-90 1.66667 74.6673)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 31.0003)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 16.3333 74.6668)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 31.0003)" fill="#3056D3" />
                                        <circle cx="31" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 31 74.6668)" fill="#3056D3" />
                                        <circle cx="31" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 31 31.0003)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 45.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 45.6667 31.0003)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 60.3333 74.6668)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 60.3333 30.9998)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 88.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 88.6667 30.9998)" fill="#3056D3" />
                                        <circle cx="117.667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 117.667 74.6668)" fill="#3056D3" />
                                        <circle cx="117.667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 117.667 30.9998)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 74.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 74.6667 30.9998)" fill="#3056D3" />
                                        <circle cx="103" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 103 74.6668)" fill="#3056D3" />
                                        <circle cx="103" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 103 30.9998)" fill="#3056D3" />
                                        <circle cx="132" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 132 74.6668)" fill="#3056D3" />
                                        <circle cx="132" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 132 30.9998)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 60.0003)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 16.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 60.0003)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 16.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 31 60.0003)" fill="#3056D3" />
                                        <circle cx="31" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 31 16.3333)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 45.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 60.3333 60.0003)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 60.3333 16.3333)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 88.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 88.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="117.667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 117.667 60.0003)" fill="#3056D3" />
                                        <circle cx="117.667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 117.667 16.3333)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 74.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 74.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="103" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 103 60.0003)" fill="#3056D3" />
                                        <circle cx="103" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 103 16.3333)" fill="#3056D3" />
                                        <circle cx="132" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 132 60.0003)" fill="#3056D3" />
                                        <circle cx="132" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 132 16.3333)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 45.3333)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 1.66667 1.66683)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 45.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 16.3333 1.66683)" fill="#3056D3" />
                                        <circle cx="31" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 31 45.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 31 1.66683)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 45.3333)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 45.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 60.3333 45.3338)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 60.3333 1.66683)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 88.6667 45.3338)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 88.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="117.667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 117.667 45.3338)" fill="#3056D3" />
                                        <circle cx="117.667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 117.667 1.66683)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 74.6667 45.3338)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 74.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="103" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 103 45.3338)" fill="#3056D3" />
                                        <circle cx="103" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 103 1.66683)" fill="#3056D3" />
                                        <circle cx="132" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 132 45.3338)" fill="#3056D3" />
                                        <circle cx="132" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 132 1.66683)" fill="#3056D3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
                    <div class="mt-10 lg:mt-0">
                        <span class="mb-4 block text-lg font-semibold text-primary">
                            Why Choose Us
                        </span>
                        <h2 class="mb-5 text-3xl font-bold text-dark dark:text-white sm:text-[40px]/[48px]">
                            Make your customers happy by giving services.
                        </h2>
                        <p class="mb-5 text-base text-body-color dark:text-dark-6">
                            Découvrez le meilleur équipement de pêche et explorez les eaux les plus poissonneuses avec notre sélection de produits de qualité supérieure. Que vous soyez un pêcheur débutant ou expérimenté, trouvez tout ce dont vous avez besoin pour vivre des aventures inoubliables au bord de l'eau.

                        </p>
                        <p class="mb-8 text-base text-body-color dark:text-dark-6">
                            At <b>Rayss web site</b>, we're passionate about fishing, just like you. Here's what sets us apart.

                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- services section --}}

    <section class="overflow-hidden bg-white pb-12 pt-10 dark:bg-dark lg:pb-[90px] lg:pt-[90px]">
        <h1
            class="mb-4 ml-7 text-2xl font-bold text-center leading-none tracking-tight text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
            OUR <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">SERVICES</mark></h1>
        <div class=" flex justify-around flex-wrap">
            <form id="searchForm" action="{{ route('Client.fetch') }}" method="GET">
                @csrf
                <div class="bg-white flex gap-2">
                    <div>
                        <input type='search' id="searchInput" name="search" placeholder='Search Something...'
                            class="mt-6 ml-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>
        </form>
        </div>
        <x-session />

        <div class="font-[sans-serif] mt-10">
            <div class="p-4 mx-auto lg:max-w-7xl sm:max-w-full">
                <div class="Alll grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <div>
                                <a href="{{ route('ProductDetails', ['ProductId' => $product->id]) }}">
                                        @if ($product->favoris_client_id === NULL)
                                            <div class="border border-gray-400 shadow-lg rounded-2xl p-6 hover:-translate-y-2 transition-all relative" data-product-id="{{ $product->id }}">
                                        @else
                                            <div class=" border border-gray-400 shadow-lg rounded-2xl p-6 hover:-translate-y-2 transition-all relative" data-product-id="{{ $product->id }}" style="
                                                fill: red; ">
                                        @endif
                                        @if (Auth::check())

                                                <form class="favorisForm" action="{{ route('Add.favoris', ['productId' => $product->id, 'clientId' => $client->id]) }}" method="POST">
                                                    @csrf
                                                    <div class=" w-10 h-10 flex items-center justify-center rounded-full cursor-pointer absolute top-4 right-4">
                                                        <button type="submit" onclick="toggleFavorite(event, '{{ $product->id }}', '{{ Auth::user()->id }}')">
                                                            <svg id="heart" class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="25px" fill="{{ $product->favoris_client_id === NULL ? 'gray' : '#ff0000' }}" viewBox="0 0 512 512">
                                                                <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                                @endif
                                                <div class="w-11/12 h-[220px] overflow-hidden mx-auto aspect-w-16 aspect-h-8 md:mb-2 mb-4">
                                                    <img src="{{ asset($product->productImage) }}" alt="Product 1" class="h-full w-full object-contain" />
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-bold text-gray-800">{{ $product->productName }}</h3>
                                                    <p class="text-gray-500 text-sm mt-2">{{ substr($product->productDescription, 0, 60) }}...</p>
                                                    <div class="flex items-center justify-between ">
                                                        <div>
                                                            <h4 class="text-lg text-gray-700 font-bold mt-4">{{ $product->productPrice }} DH</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                </div>
                        @endforeach
                        </div>
                        <div class="w-11/12 mx-auto my-8">{{ $products->links() }}</div>
                    @else
                        <p>Aucun produit trouvé.</p>
                    @endif
                </div>
            </div>
        </div>
        

    </section>

    {{-- blog section  --}}

    <div id="blog" class="bg-white font-[sans-serif] my-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h2
                    class="mb-4 ml-7 text-2xl font-bold text-center leading-none tracking-tight text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
                    LATEST <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">BLOGS</mark></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16 max-md:max-w-lg mx-auto">
                @if (!$themes)
                    <p>no themes yet</p>
                @else
                    @foreach ($themes as $theme)
                        <a href="{{ route('articles', ['themeId' => $theme->id]) }}">
                            <div
                                class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-2 transition-all duration-300">
                                <img src="{{ asset($theme->image) }}" alt="Blog Post 1"
                                    class="w-full h-60 object-cover" />
                                <div class="p-6">
                                    <span class="text-sm block text-gray-400 mb-2">
                                        {{ $theme->created_at->format('d-M-Y') }} </span>
                                    <h3 class="text-xl font-bold text-[#333]"> {{ $theme->title }} </h3>
                                    <hr class="my-6" />
                                    <p class="text-gray-400 text-sm"> {{ $theme->description }} </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>    
    function toggleFavorite(event, productId, userId) {
    event.preventDefault();

    var xhr = new XMLHttpRequest();

    var url = `/Client/AddToFavoris/${productId}/${userId}`;

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    xhr.onload = function() {
        if (xhr.status === 200) {
            var heart = event.target.closest('.heart-icon');

            if (heart) {
                heart.classList.toggle('favorite-icon-red'); 
            }

        } else {
            console.error('Error adding product to favorites');
        }
    };

    xhr.onerror = function() {
        console.error('Erreur lors de la requête AJAX');
    };

    xhr.send(JSON.stringify({
        productId: productId,
        userId: userId
    }));
}





    
    $(document).ready(function() {
    $('#searchInput').on('input', function() {
        var query = $(this).val();

        $.ajax({
            url: '/search',
            method: 'GET',
            data: {
                search: query
            },
            success: function(response) {
                console.log(response);
                $('.Alll').empty(); 
                response.data.forEach(product => {
                    const heartColor = product.favoris_client_id ? 'red' : 'gray';
                    const html = `
                        <a href="/Client/ProductDetails/${product.id}">
                            <div class="border border-gray-600  rounded-2xl p-6 hover:-translate-y-2 transition-all relative">
                                <div class="bg-gray-200 w-10 h-10 flex items-center justify-center rounded-full cursor-pointer absolute top-4 right-4">
                                    <svg id="heart" class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="25px" fill="${heartColor}" viewBox="0 0 512 512">
                                        <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                                    </svg>
                                </div>
                                <div class="w-11/12 h-[220px] overflow-hidden mx-auto aspect-w-16 aspect-h-8 md:mb-2 mb-4">
                                    <img src="${product.productImage}" alt="${product.productName}" class="h-full mt-4 w-full object-contain" />
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">${product.productName}</h3>
                                    <p class="text-gray-500 text-sm mt-2">${product.productDescription.substring(0, 60)}...</p>
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-lg text-gray-700 font-bold mt-4">${product.productPrice} DH</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>`;
                    $('.Alll').append(html);
                });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

    


</script>