<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Social</title>
    @vite('resources/css/app.css')
  </head>
  <body class="bg-gray-200">
    <nav class="bg-white p-6 flex justify-between mb-3">
      <ul class="flex items-center">
        <li><a href="{{ route('home') }}" class="p-3">Home</a></li>
        <li><a href="#" class="p-3">Post</a></li>
        @auth
            <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
        @endauth
      </ul>

      <ul class="flex items-center">
        @auth
            <li><a href="#" class="p-3"> {{ auth()->user()->name }} </a></li>
            <li class="px-3 text-red-600 hover:text-red-400">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endauth

        @guest
            <li><a href="{{ route('register') }}" class="px-3 py-2 mr-2 border border-blue-700 hover:border-blue-900 rounded-md text-blue-700 hover:text-blue-900">Register</a></li>
            <li><a href="{{ route('login') }}" class="px-3 py-2 border border-blue-700 rounded-md bg-blue-700 hover:bg-blue-900 text-white">Login</a></li>
        @endguest
      </ul>
    </nav>
    
    @yield('content')
  </body>
</html>