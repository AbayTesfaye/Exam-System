<x-lay>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Questions</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto p-4">
            <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-6 text-center">Questions</h1>
                    @foreach ($questions as $index => $question)
                        <div class="mb-4">
                            <h2 class="text-xl font-semibold">{{ $question['question'] }}</h2>
                            <ul class="list-disc ml-6">
                                @foreach ($question['choices'] as $choiceIndex => $choice)
                                    <li>{{ $choiceIndex + 1 }}. {{ $choice }}</li>
                                @endforeach
                            </ul>
                            <form action="{{ route('questions.destroy', $index) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-colors duration-200">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
    </html>


</x-lay>
