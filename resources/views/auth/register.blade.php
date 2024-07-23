<x-layout>
    <div class="mx-auto max-w-screen-sm bg-white shadow-md rounded-lg p-6 mb-10">
        <form action="{{ route('register') }}" method="POST" >
            @csrf
            <div >
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" name="username" value="{{ old('username')}}" id="username" class="input mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 @error('username') border-red-500 @enderror">
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div >
                <label for="email" class="block text-gray-700">Email</label>
                <input type="text" name="email" value="{{ old('email')}}" id="email" class="input mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div >
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="input mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
            </div>
            <div >
                <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded-lg focus:outline-none hover:bg-blue-600">Register</button>
            </div>
        </form>
    </div>
</x-layout>
