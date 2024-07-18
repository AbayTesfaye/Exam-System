<x-layout>

        <div class="bg-gray-100 min-h-screen flex items-center justify-center">
            <div class="container mx-auto p-4">
                <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">Welcome to Our Quiz</h1>
                        <p class="text-lg mb-6 text-center text-gray-700">Test your knowledge with our fun quiz. Are you ready?</p>
                        <div class="flex justify-center">
                            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-md text-lg transition-colors duration-200 shadow-md">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</x-layout>
