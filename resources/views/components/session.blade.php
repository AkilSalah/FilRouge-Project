{{-- @if (session('success'))
    <div class="bg-green-200 text-green-700 mt-4 p-3 mb-3 rounded-md">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="bg-red-200 text-red-700 p-3 mb-3 mt-4 rounded-md">{{ session('error') }}</div>
@endif --}}

@if (session('success'))

    <div
        class="flex bg-white dark:bg-gray-900 items-center px-6 py-4 text-sm border-t-2 rounded-b shadow-sm border-green-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500 stroke-current" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <div class="ml-3">
            <div class="font-bold text-left text-black dark:text-gray-50">{{ session('success') }}</div>
        </div>
    </div>
    @endif
    @if (session('error'))

    <div
        class="flex bg-white dark:bg-gray-900 items-center px-6 py-4 text-sm border-t-2 rounded-b shadow-sm border-red-500">
        <svg viewBox="0 0 24 24" class="w-8 h-8 text-red-500 stroke-current" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M12 8V12V8ZM12 16H12.01H12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <div class="ml-3">
            <div class="font-bold text-left text-black dark:text-gray-50">{{ session('error') }}</div>
        </div>
    </div>
    @endif

