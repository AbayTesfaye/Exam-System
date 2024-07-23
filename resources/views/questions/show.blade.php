<x-lay>
    <div class="container mx-auto p-4">
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-6 text-center">Quiz</h1>
                <form action="{{ route('questions.answer') }}" method="POST" id="quizForm">
                    @csrf
                    <input type="hidden" name="questionIndex" value="{{ $questionIndex }}">
                    <div class="mb-6">
                        <p class="text-lg font-semibold mb-4">Question {{ $questionIndex + 1 }}: {{ $question['question'] }}</p>
                        <ul class="list-none pl-0">
                            @foreach ($choices as $choiceKey => $choice)
                                <li class="mb-2">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="answer" value="{{ $choiceKey }}" class="form-radio text-blue-600">
                                        <span>{{ $choice }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-4 text-center">
                        <p class="text-sm text-gray-600">You have {{ count($questions) + 1 - $questionIndex - 1 }} out of {{ count($questions) }} questions left.</p>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-4 transition-colors duration-200" id="submitBtn" disabled>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('quizForm');
            const submitBtn = document.getElementById('submitBtn');
            const radios = form.querySelectorAll('input[type="radio"]');

            // Function to check if any radio is selected
            function updateSubmitButtonState() {
                const isAnyRadioChecked = Array.from(radios).some(radio => radio.checked);
                submitBtn.disabled = !isAnyRadioChecked;
                // Add visual feedback for disabled state
                if (submitBtn.disabled) {
                    submitBtn.classList.add('cursor-not-allowed', 'opacity-50');
                } else {
                    submitBtn.classList.remove('cursor-not-allowed', 'opacity-50');
                }
            }

            // Add event listeners to radio buttons
            radios.forEach(radio => {
                radio.addEventListener('change', updateSubmitButtonState);
            });

            // Initial check in case the user selects an option after loading the page
            updateSubmitButtonState();
        });
    </script>
</x-lay>
