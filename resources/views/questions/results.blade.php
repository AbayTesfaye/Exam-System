<x-lay>
    <div class="container mx-auto p-4">
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-6 text-center">Quiz Results</h1>
                <p class="text-lg font-semibold">You answered {{ $correctAnswers }} out of {{ count($userAnswers) }} questions correctly.</p>
                <div class="space-y-6">
                    @foreach ($userAnswers as $index => $answer)
                        <div class="p-4 border rounded-lg {{ $answer['user_answer'] === $answer['correct_answer'] ? 'bg-green-100' : 'bg-red-100' }}">
                            <p class="text-lg font-semibold">Question {{ $index + 1 }}: {{ $answer['question'] }}</p>
                            <ul class="list-none pl-0 mb-2">
                                @foreach ($answer['choices'] as $key => $choice)
                                    <li class="{{ $key === $answer['correct_answer'] ? 'text-green-600 font-bold' : ($key === $answer['user_answer'] ? 'text-red-600' : '') }}">
                                        <span>{{ $key }}: {{ $choice }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <p class="text-sm">
                                Your answer: <span class="{{ $answer['user_answer'] === $answer['correct_answer'] ? 'text-green-600' : 'text-red-600' }}">{{ $answer['user_answer'] }}</span><br>
                                Correct answer: <span class="text-green-600">{{ $answer['correct_answer'] }}</span>
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 text-center">
                    <a href="{{ route('questions.start') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors duration-200">Restart Quiz</a>
                    <a href="{{ route('home') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-colors duration-200">Quit</a>
                </div>
            </div>
        </div>
    </div>
</x-lay>
