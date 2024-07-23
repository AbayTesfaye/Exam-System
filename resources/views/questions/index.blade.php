<x-lay>
    <div class="container mx-auto p-4">
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <!-- Display Flash Messages -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Back Button -->
                <a href="{{ route('dashboard') }}" class="inline-block mb-6 text-blue-500 hover:text-blue-700 font-semibold text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Dashboard
                </a>

                <h1 class="text-3xl font-bold mb-6 text-center">Questions</h1>
                @foreach ($questions as $question)
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">{{ $question->question }}</h2>
                        <ul class="list-disc ml-6">
                            @php
                                $choices = is_string($question->choices) ? json_decode($question->choices, true) : $question->choices;
                            @endphp

                            @foreach ($choices as $choiceKey => $choice)
                                <li>{{ $choiceKey }}. {{ $choice }}</li>
                            @endforeach
                        </ul>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-colors duration-200">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-lay>
