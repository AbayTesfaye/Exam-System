<x-lay>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz Question</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto p-4">
            <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-6 text-center">Quiz</h1>

                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('questions.answer') }}" method="POST">
                        @csrf
                        <input type="hidden" name="questionIndex" value="{{ $questionIndex }}">
                        <div class="mb-6">
                            <p class="text-lg font-semibold mb-4">Question {{ $questionIndex + 1 }}: {{ $question['question'] }}</p>
                            <ul class="list-none pl-0">
                                @foreach ($question['choices'] as $choiceIndex => $choice)
                                    <li class="mb-2">
                                        <label class="flex items-center space-x-2">
                                            <input type="radio" name="answer" value="{{ $choiceIndex }}" class="form-radio text-blue-600">
                                            <span>{{ $choice }}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-4 transition-colors duration-200">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>


</x-lay>
