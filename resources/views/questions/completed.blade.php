<x-lay>
        <div class="container mx-auto p-4">
            <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-center">
                    <h1 class="text-3xl font-bold mb-6">Quiz Completed</h1>
                    <p class="text-lg mb-4">Congratulations! You have completed the quiz.</p>
                    <p class="text-lg font-semibold">Your Score: {{ $correctAnswers }} / {{ count($questions) }}</p>
                    <div class="mt-6 flex justify-center space-x-4">
                        <a href="{{ route('questions.reset') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors duration-200">Retake Quiz</a>
                        <a href="{{ route('home') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-colors duration-200">Quit</a>
                    </div>
                </div>
            </div>
        </div>
</x-lay>
