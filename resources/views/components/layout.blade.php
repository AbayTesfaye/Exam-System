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
      position: relative;
      clip-path: polygon(0 0, 100% 0, 100% 85vh, 0 100%);
    }
  </style>
</head>
<body>
  <div class="background-container">
    <div class="min-h-full">
      <nav>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-white hover:text-black">Home</a>
              </div>
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-white hover:text-black">Login</a>
                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-white hover:text-black">Register</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
          <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-white hover:text-black">Login</a>
            <a href="{{ route('register') }}" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-white hover:text-black">Register</a>
          </div>
        </div>
      </nav>
      <main>
        <!-- Your content -->
        {{ $slot }}
      </main>
    </div>
  </div>
</body>
</html>
