<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
@foreach ($data as $ticket)
<div class="font-staatliches text-black text-sm">
<div class=" m-5 md:min-h-screen flex items-center justify-center">
    <div class="ticket bg-blue-100 flex flex-col md:flex-row shadow-lg">
        <div class="left flex flex-col md:flex-row">
            <div class="ticket-info p-10 flex flex-col justify-between text-center md:text-left">
                <div class="show-name mb-5">
                    <h2 class="text-black text-3xl"></h2>
                    <h1 class="text-blue-600 text-5xl font-nanumpenscript"></h1>
                </div>
                <p class="border-t border-b border-gray-400 py-5 flex items-center justify-around">
                    <span class="text-black text-xl">{{ $ticket->voyage->title }}</span>
                </p>
                <div class="py-5">
                    <pre class="mb-3 font-bold text-black">Name: {{$ticket->client->user->Name}} </pre>
                    <pre class="mb-3 font-bold text-black">Email: {{$ticket->client->user->Email}}  </pre>
                    <pre class="mb-3 font-bold text-black">Location: {{$ticket->voyage->lieu}}  </pre>
                </div>
                <p class="flex justify-around items-start border-t border-gray-400 pt-2">
                    <span class="separator text-4xl text-black"><i class="far fa-smile"></i></span>
                    <span>Created by: {{$ticket->voyage->guide->user->Name}}  </span>
                </p>
            </div>
        </div>
        <div class="right w-full md:w-72 md:border-l md:border-dashed md:border-gray-400">
            <div class="right-info-container p-10 flex flex-col justify-around items-center">
                <div class="show-name">
                    <h1 class="text-black text-2xl">Trip CREATIVE</h1>
                </div>
                <div class="time mb-5">
                    <p class="font-bold text-purple-800">Date :<span class="text-black"> {{ \Carbon\Carbon::parse($ticket->voyage->date)->format('d F Y') }}</span></p>
                    <p class="font-bold text-purple-800">Lieu : <span class="text-black">{{$ticket->voyage->lieu}}</span> </p>
                </div>
                <div class="barcode mb-5">
                    <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code" class="h-24">
                </div>
                <p class="ticket-number text-gray-500">#20030220</p>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach    


   
</body>
</html>