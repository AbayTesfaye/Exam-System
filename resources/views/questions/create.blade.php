<x-lay>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Question</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto p-4">
            <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <!-- Back Button -->
                    <a href="{{ route('dashboard') }}" class="inline-block mb-6 text-blue-500 hover:text-blue-700 font-semibold text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Dashboard
                    </a>
                    <h1 class="text-3xl font-bold mb-6 text-center">Add New Question</h1>
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                            <input type="text" name="question" id="question" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="choice_a" class="block text-sm font-medium text-gray-700">Choice A</label>
                            <input type="text" name="choice_a" id="choice_a" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="choice_b" class="block text-sm font-medium text-gray-700">Choice B</label>
                            <input type="text" name="choice_b" id="choice_b" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="choice_c" class="block text-sm font-medium text-gray-700">Choice C</label>
                            <input type="text" name="choice_c" id="choice_c" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="choice_d" class="block text-sm font-medium text-gray-700">Choice D</label>
                            <input type="text" name="choice_d" id="choice_d" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="correct_answer" class="block text-sm font-medium text-gray-700">Correct Answer</label>
                            <select name="correct_answer" id="correct_answer" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="" disabled selected>Select the correct answer</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-4 transition-colors duration-200">
                            Add Question
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
</x-lay>
