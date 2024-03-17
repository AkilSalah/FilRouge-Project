<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" >
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
     <script defer src="assets/js/alpine.min.js"></script>
    <title>Client| @yield('title')</title>
</head>
<body>
    @include('partials.ClientNavbar')
    <main>
        @yield('main')
    </main>
    @include('partials.Footer')
    
</body>
</html>