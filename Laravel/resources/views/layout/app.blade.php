<!DOCTYPE html>
<!-- if I add class="dark", the navbar will be with background dark -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
      <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Laravel</title>

         <meta name="csrf-token" content="{{ csrf_token() }}">
         <!-- Fonts -->
         @vite('resources/css/app.css')
      </head>
      <body class="antialiased text-gray-800 dark:text-gray-200">
         <div class="min-h-screen bg-gray-100 dark:bg-gray-900 pt-24">
            <x-layout.navbar></x-layout.navbar>
            {{$slot}}
            <x-layout.footer></x-layout.footer>
         </div>
         @vite('resources/js/app.js')
      </body>
</html>
