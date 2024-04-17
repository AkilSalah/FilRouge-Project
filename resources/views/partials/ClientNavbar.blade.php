<header class='shadow-md py-1 px-4 sm:px-10 bg-white font-sans min-h-[70px]'>
    <div class='flex flex-wrap items-center justify-between gap-4'>
      <a href="javascript:void(0)"><img src="{{ asset('/images/pêcheLogo.jpg') }}" alt="logo" class='w-20' /></a>
      <div class='flex items-center max-sm:ml-auto lg:order-1'>
        @php
        use Illuminate\Support\Facades\Auth;
        use App\Models\Client;
        use App\Models\Panier;
        
        $user = Auth::user();
        $nombreProduct = 0;

        if ($user) {
            $idClient = Client::where('id_User', $user->id)->first(); 
            $panier = Panier::where('id_Client', $idClient->id)->first();

            if ($panier) {
                $nombreProduct = $panier->products->count();
            }
        }
        @endphp
        @if (Auth()->check())
        <a href="{{ route('logout') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 640 512" class="mr-4 cursor-pointer hover:fill-[#007bff] inline">  <circle cx="10" cy="7" r="6" data-original="#000000" /><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
        </a>
        
        <span class="relative">
          <a href="{{ route('client.panier') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
            class="cursor-pointer hover:fill-[#007bff] inline" viewBox="0 0 512 512">
            <path
              d="M164.96 300.004h.024c.02 0 .04-.004.059-.004H437a15.003 15.003 0 0 0 14.422-10.879l60-210a15.003 15.003 0 0 0-2.445-13.152A15.006 15.006 0 0 0 497 60H130.367l-10.722-48.254A15.003 15.003 0 0 0 105 0H15C6.715 0 0 6.715 0 15s6.715 15 15 15h77.969c1.898 8.55 51.312 230.918 54.156 243.71C131.184 280.64 120 296.536 120 315c0 24.812 20.188 45 45 45h272c8.285 0 15-6.715 15-15s-6.715-15-15-15H165c-8.27 0-15-6.73-15-15 0-8.258 6.707-14.977 14.96-14.996zM477.114 90l-51.43 180H177.032l-40-180zM150 405c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm167 15c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm0 0"
              data-original="#000000"></path>
          </svg> 
          
          <span class="absolute left-auto -ml-1 top-0 rounded-full bg-red-500 px-1 py-0 text-xs text-white"> {{$nombreProduct}} </span>
          </a>
        </span>
        <button id="toggle" class="lg:hidden ml-7 outline-none">
          <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
        </button>    

       
        @else
        <a href="{{ route('login') }}"  class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Login
        </a>
          
        @endif

        
      </div>
      <ul id="collapseMenu" class='lg:!flex lg:space-x-4 max-lg:space-y-2 max-lg:hidden max-lg:w-full'>
        <li class='max-lg:border-b max-lg:py-2 px-3'>
          <a href='{{ route('Client') }}' class='hover:text-[#007bff] text-[#007bff] font-bold block text-[15px]'>Home</a>
        </li>
        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='javascript:void(0)'
            class='hover:text-[#007bff] text-gray-600 font-bold block text-[15px]'>Team</a>
        </li>
        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='{{ route('client.trip') }}'
            class='hover:text-[#007bff] text-gray-600 font-bold block text-[15px]'>Trips</a>
        </li>
        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='javascript:void(0)'
            class='hover:text-[#007bff] text-gray-600 font-bold block text-[15px]'>Blog</a>
        </li>
        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='javascript:void(0)'
            class='hover:text-[#007bff] text-gray-600 font-bold block text-[15px]'>About</a>
        </li>
        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='javascript:void(0)'
            class='hover:text-[#007bff] text-gray-600 font-bold block text-[15px]'>Contact</a>
        </li>
      </ul>
    </div>
  </header>