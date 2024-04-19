<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | @yield('title')</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/style.css','resources/js/script.js'])
    <link
      rel="shortcut icon"
      href="/images/pêcheLogo.png"
      type="image/x-icon"
    />
</head>
<body>
    @include('partials.AdminSideBar')
    
</body>
</html>