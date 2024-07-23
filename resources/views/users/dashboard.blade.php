<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="http://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    .background-container {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-image: linear-gradient(to right bottom, rgba(126, 213, 111, 0.8), rgba(40, 180, 133, 0.8)), url('img/quiz-bg.jpg');
      background-size: cover;
      background-position: top;
    }
  </style>
</head>
<body class="bg-gray-200">
<div class="background-container">
  <nav>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-white hover:text-black">Home</a>
          </div>
        </div>
        @auth
          <div class="relative grid place-items-center" x-data="{ open: false }" @click.outside="open = false">
            <button @click="open = !open" type="button" class="rounded-full overflow-hidden w-12 h-12 border-2 border-gray-300 focus:outline-none focus:border-white">
              <img src="https://picsum.photos/200" alt="User Photo" class="w-full h-full object-cover">
            </button>
            {{-- dropdown menu --}}
            <div x-show="open" x-cloak class="dropdown-menu bg-white shadow-lg absolute top-12 right-0 rounded-lg overflow-hidden font-light z-50 w-48">
              <p class="px-4 py-2 text-gray-700 font-semibold">{{ auth()->user()->username }}</p>
              @if(auth()->user()->username === 'Admin' && auth()->user()->password === bcrypt('admin_password'))
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">Dashboard</a>
              @endif
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">Logout</button>
              </form>
            </div>
          </div>
        @endauth
      </div>
    </div>
  </nav>
  <main class="flex flex-col items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-md">
      @if(auth()->user()->username === 'Admin')
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Welcome Admin</h1>
        <div class="flex flex-col space-y-4">
          <a href="{{ route('questions.index') }}" class="block text-center text-white bg-gray-800 hover:bg-gray-700 rounded-md px-4 py-2 text-lg font-medium transition-colors duration-300">View Questions</a>
          <a href="{{ route('questions.create') }}" class="block text-center text-white bg-gray-800 hover:bg-gray-700 rounded-md px-4 py-2 text-lg font-medium transition-colors duration-300">Add Question</a>
        </div>
      @else
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Welcome {{ auth()->user()->username }}</h1>
        <div class="flex flex-col space-y-4">
          <a href="{{ route('questions.start') }}" class="block text-center text-white bg-gray-800 hover:bg-gray-700 rounded-md px-4 py-2 text-lg font-medium transition-colors duration-300">Start Quiz</a>
          <a href="{{ route('questions.results') }}" class="block text-center text-white bg-gray-800 hover:bg-gray-700 rounded-md px-4 py-2 text-lg font-medium transition-colors duration-300">View Results</a>
        </div>
      @endif
    </div>
  </main>
</div>
</body>
</html>
