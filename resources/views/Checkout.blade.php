<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">

<div class="fixed inset-0 p-4 flex bg-blue-100 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
      <div class="w-full max-w-lg bg-GRAY-100 shadow-md border-gray-600 rounded-lg p-6 relative">
        <div class="my-8 text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-16 shrink-0 fill-green-400 inline" viewBox="0 0 512 512">
            <path
              d="M383.841 171.838c-7.881-8.31-21.02-8.676-29.343-.775L221.987 296.732l-63.204-64.893c-8.005-8.213-21.13-8.393-29.35-.387-8.213 7.998-8.386 21.137-.388 29.35l77.492 79.561a20.687 20.687 0 0 0 14.869 6.275 20.744 20.744 0 0 0 14.288-5.694l147.373-139.762c8.316-7.888 8.668-21.027.774-29.344z"
              data-original="#000000" />
            <path
              d="M256 0C114.84 0 0 114.84 0 256s114.84 256 256 256 256-114.84 256-256S397.16 0 256 0zm0 470.487c-118.265 0-214.487-96.214-214.487-214.487 0-118.265 96.221-214.487 214.487-214.487 118.272 0 214.487 96.221 214.487 214.487 0 118.272-96.215 214.487-214.487 214.487z"
              data-original="#000000" />
          </svg>
          <h4 class="text-2xl text-[#333] font-semibold mt-6">Successfully accepted!</h4>
          <p class="text-sm text-gray-500 mt-4">Thanks for you order You have just completed your payment
              The seeler will reach out to you as soon as possible</p>
        </div>

       <a href="{{ route('Client') }}"class="px-6 py-2.5 min-w-[200px] flex justify-center w-full rounded text-black-500 text-sm font-semibold border-none  outline-none bg-blue-400 hover:bg-[#222]">Go Home
       </a>
      </div>
