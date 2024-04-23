<script src="https://cdn.tailwindcss.com"></script>
<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" >
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <div class="mt-8">
        <x-session />
        </div>

        <div class="bg-gray-50 font-[sans-serif] text-[#333]">
          <div class="max-h-screen flex flex-col items-center justify-center py-6 px-4">
            <div class="max-w-md w-full border py-8 px-6 rounded border-gray-300 bg-white">
              <a href="{{ route('welcome') }}"><img
                src="{{ asset('/images/pêcheLogo.png') }}" alt="logo" class='w-32 mx-auto mb-10' />
              </a>
              <h2 class="text-center text-2xl mb-10 font-extrabold">
                Will sened a link to your email,use that link to reset password
              </h2>
              <form id="loginForm" action="{{ route('forgetPasswordPost') }}" method="POST">
                @csrf           
                <div>
                  <input name="email" type="email" autocomplete="email" required class="w-full text-sm px-4 py-3 rounded outline-none border-2 focus:border-blue-500" placeholder="Email address" />
                </div>
               
                <div class="!mt-10">
                  <button type="submit" class="w-full py-2.5 px-4 text-sm rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Send
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>






