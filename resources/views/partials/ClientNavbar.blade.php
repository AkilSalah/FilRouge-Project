<header class='shadow-md py-4 px-4 sm:px-10 bg-white font-sans min-h-[70px]'>
    <div class='flex flex-wrap items-center justify-between gap-4'>
      <a href="javascript:void(0)"><img src="{{ asset('/images/pêcheLogo.jpg') }}" alt="logo" class='w-20' />
      </a>
      <div class='flex items-center max-sm:ml-auto lg:order-1'>
        @if (Auth()->check())
        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 640 512" class="mr-4 cursor-pointer hover:fill-[#007bff] inline">  <circle cx="10" cy="7" r="6" data-original="#000000" /><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
        <span class="relative">
          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
            class="cursor-pointer hover:fill-[#007bff] inline" viewBox="0 0 512 512">
            <path
              d="M164.96 300.004h.024c.02 0 .04-.004.059-.004H437a15.003 15.003 0 0 0 14.422-10.879l60-210a15.003 15.003 0 0 0-2.445-13.152A15.006 15.006 0 0 0 497 60H130.367l-10.722-48.254A15.003 15.003 0 0 0 105 0H15C6.715 0 0 6.715 0 15s6.715 15 15 15h77.969c1.898 8.55 51.312 230.918 54.156 243.71C131.184 280.64 120 296.536 120 315c0 24.812 20.188 45 45 45h272c8.285 0 15-6.715 15-15s-6.715-15-15-15H165c-8.27 0-15-6.73-15-15 0-8.258 6.707-14.977 14.96-14.996zM477.114 90l-51.43 180H177.032l-40-180zM150 405c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm167 15c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm0 0"
              data-original="#000000"></path>
          </svg>
          
          <span class="absolute left-auto -ml-1 top-0 rounded-full bg-red-500 px-1 py-0 text-xs text-white">0</span>
        </span>
        <button id="toggle" class='lg:hidden ml-7'>
          <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
        </button>    
        @else
          <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
   
        @endif

        
      </div>
      <ul id="collapseMenu" class='lg:!flex lg:space-x-4 max-lg:space-y-2 max-lg:hidden max-lg:w-full'>
        <li class='max-lg:border-b max-lg:py-2 px-3'>
          <a href='javascript:void(0)' class='hover:text-[#007bff] text-[#007bff] font-bold block text-[15px]'>Home</a>
        </li>
        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='javascript:void(0)'
            class='hover:text-[#007bff] text-gray-600 font-bold block text-[15px]'>Team</a>
        </li>
        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='javascript:void(0)'
            class='hover:text-[#007bff] text-gray-600 font-bold block text-[15px]'>Feature</a>
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