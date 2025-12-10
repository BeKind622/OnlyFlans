<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OnlyFlans') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-blue-400">

        <div class="min-h-screen bg-gray-100 max-w-5xl mx-auto ">
       
            @include('layouts.navigation')
 <div class="shadow-sm mb-6 none h-72 block w-full flex items-center justify-center relative text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight drop-shadow-lg"> 
            
                        <img src="https://images.unsplash.com/photo-1702728109878-c61a98d80491?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="flan" class="  box-sizing: content-box h-64 w-full object-cover shadow-md rounded-md">
                        <h2 class="absolute top-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2 text-white bg-black/40 px-6 py-4 rounded-xl"> Welcome to<br> <span class="text-amber-300">OnlyFlans 🍮</span></h2>
                        
        </div>
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="p-6">
            <div>
            </div>
                {{ $slot }}
            </main>
        </div>
        <footer class="footer sm:footer-horizontal bg-neutral text-neutral-content p-10 mx-auto mt-12 max-w-5xl">

    
    <p class="text-lg font-bold bg-white p-4 rounded-md">
      
OnlyFlans 🍮       <br />
      Providing reliable flan recipes since 1992
    </p>

  </footer>
    </body>
</html>
