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
</head>
<body class="bg-gray-200">
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Home</a>
          </div>
        </div>
        @auth
          <div class="relative grid place-items-center" x-data="{ open: false }" @click.outside="open = false">
            <button @click="open = !open" type="button" class="rounded-full overflow-hidden w-10 h-10 border-2 border-gray-300 focus:outline-none focus:border-white">
              <img src="https://picsum.photos/200" alt="User Photo" class="w-full h-full object-cover">
            </button>
            {{-- dropdown menu --}}
            <div x-show="open" x-cloak class="bg-white shadow-lg absolute top-12 right-0 rounded-lg overflow-hidden font-light z-50">
              <p class="px-4 py-2 text-gray-700">{{ auth()->user()->username }}</p>
              @if(auth()->user()->username === 'Admin' && auth()->user()->password === bcrypt('admin_password'))
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
              @endif
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
              </form>
            </div>
          </div>
        @endauth
      </div>
    </div>
  </nav>
  <main class="flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-16">
      <div class="flex flex-col space-y-4">
        @if(auth()->user()->username === 'Admin')
          <a href="{{ route('questions.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 hover:text-white text-xl">View Question</a>
          <a href="{{ route('questions.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 hover:text-white text-xl">Add Question</a>
        @endif
      </div>
    </div>
  </main>
</div>
</body>
</html>
