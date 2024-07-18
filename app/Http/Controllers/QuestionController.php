<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    protected $questions = [
        ['question' => 'What is the capital of France?', 'choices' => ['Paris', 'London', 'Berlin', 'Madrid'], 'correct' => 0],
        ['question' => 'Which planet is known as the Red Planet?', 'choices' => ['Mars', 'Venus', 'Jupiter', 'Saturn'], 'correct' => 0],
        ['question' => 'What is the largest ocean on Earth?', 'choices' => ['Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean'], 'correct' => 3],
        ['question' => 'Who wrote "Romeo and Juliet"?', 'choices' => ['William Shakespeare', 'Charles Dickens', 'Mark Twain', 'Jane Austen'], 'correct' => 0],
        ['question' => 'What is the chemical symbol for water?', 'choices' => ['H2O', 'O2', 'CO2', 'NaCl'], 'correct' => 0],
        ['question' => 'What is the speed of light?', 'choices' => ['299,792,458 meters per second', '150,000,000 meters per second', '100,000 kilometers per hour', '1,080 kilometers per hour'], 'correct' => 0],
        ['question' => 'Who painted the Mona Lisa?', 'choices' => ['Vincent van Gogh', 'Pablo Picasso', 'Leonardo da Vinci', 'Claude Monet'], 'correct' => 2],
    ];

    public function start()
    {
        // Reset session data
        Session::put('questions', $this->questions);
        Session::forget('questionIndex');
        Session::forget('correctAnswers');

        // Redirect to the first question
        return redirect()->route('questions.show');
    }

    public function show(Request $request)
    {
        $questions = Session::get('questions', []);
        $questionIndex = Session::get('questionIndex', 0);
        $correctAnswers = Session::get('correctAnswers', 0);

        $isCompleted = $questionIndex >= count($questions);

        if ($isCompleted) {
            return view('questions.completed', compact('correctAnswers', 'questions'));
        }

        $question = $questions[$questionIndex];
        return view('questions.show', compact('question', 'questionIndex', 'correctAnswers'));
    }

    public function answer(Request $request)
    {
        $questions = Session::get('questions', []);
        $questionIndex = $request->input('questionIndex');
        $selectedAnswer = $request->input('answer');
        $correctAnswers = Session::get('correctAnswers', 0);

        if ($questions[$questionIndex]['correct'] == $selectedAnswer) {
            $correctAnswers++;
            Session::put('correctAnswers', $correctAnswers);
        }

        $questionIndex++;
        Session::put('questionIndex', $questionIndex);

        return redirect()->route('questions.show');
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'choices' => 'required|string',
            'correct' => 'required|integer'
        ]);

        $newQuestion = [
            'question' => $request->input('question'),
            'choices' => explode(',', $request->input('choices')),
            'correct' => $request->input('correct')
        ];

        $questions = Session::get('questions', []);
        $questions[] = $newQuestion;
        Session::put('questions', $questions);

        return redirect()->route('questions.index');
    }

    public function index()
    {
        $questions = Session::get('questions', []);
        return view('questions.index', compact('questions'));
    }

    public function destroy($id)
    {
        $questions = Session::get('questions', []);
        unset($questions[$id]);
        $questions = array_values($questions); // Reindex the array
        Session::put('questions', $questions);

        return redirect()->route('questions.index');
    }
}
