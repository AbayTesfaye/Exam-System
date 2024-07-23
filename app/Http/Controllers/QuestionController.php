<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Question;

class QuestionController extends Controller
{
    public function start()
    {
        // Reset session data
        Session::forget('questionIndex');
        Session::forget('correctAnswers');
        Session::forget('userAnswers');

        // Fetch the questions from the database and store them in the session
        $questions = Question::all()->toArray();
        Session::put('questions', $questions);

        // Redirect to the first question
        return redirect()->route('questions.show');
    }

    public function show(Request $request)
    {
        // Fetch the questions from the session
        $questions = Session::get('questions', []);
        $questionIndex = Session::get('questionIndex', 0);
        $correctAnswers = Session::get('correctAnswers', 0);

        if ($questionIndex >= count($questions)) {
            return redirect()->route('questions.results');
        }

        // Fetch the current question
        $question = $questions[$questionIndex];

        // Decode choices if it's a JSON-encoded string
        if (is_string($question['choices'])) {
            $question['choices'] = json_decode($question['choices'], true);
        }

        // Pass the choices to the view
        return view('questions.show', [
            'question' => $question,
            'questionIndex' => $questionIndex,
            'correctAnswers' => $correctAnswers,
            'questions' => $questions,
            'choices' => $question['choices']
        ]);
    }

    public function answer(Request $request)
    {
        $questions = Session::get('questions', []);
        $questionIndex = $request->input('questionIndex');
        $userAnswer = $request->input('answer');

        // Handle the Back button
        if ($request->input('back')) {
            if ($questionIndex > 0) {
                $questionIndex--;
                $userAnswers = Session::get('userAnswers', []);
                array_pop($userAnswers);
                Session::put('userAnswers', $userAnswers);
                Session::put('questionIndex', $questionIndex);
            }
            return redirect()->route('questions.show');
        }

        if (isset($questions[$questionIndex])) {
            $question = $questions[$questionIndex];
            $correctAnswer = $question['correct_answer'];
            $userAnswers = Session::get('userAnswers', []);
            $userAnswers[] = [
                'question' => $question['question'],
                'choices' => is_string($question['choices']) ? json_decode($question['choices'], true) : $question['choices'],
                'correct_answer' => $correctAnswer,
                'user_answer' => $userAnswer,
            ];

            Session::put('userAnswers', $userAnswers);

            if ($userAnswer === $correctAnswer) {
                $correctAnswers = Session::get('correctAnswers', 0);
                Session::put('correctAnswers', $correctAnswers + 1);
            }

            Session::put('questionIndex', $questionIndex + 1);
        }

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
            'choice_a' => 'required|string',
            'choice_b' => 'required|string',
            'choice_c' => 'required|string',
            'choice_d' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d',
        ]);

        // Create a new question
        Question::create([
            'question' => $request->input('question'),
            'choices' => json_encode([
                'a' => $request->input('choice_a'),
                'b' => $request->input('choice_b'),
                'c' => $request->input('choice_c'),
                'd' => $request->input('choice_d'),
            ]),
            'correct_answer' => $request->input('correct_answer'),
        ]);

        return redirect()->route('questions.index')->with('success', 'Question added successfully.');
    }

    public function index()
    {
        $questions = Question::all();
        foreach ($questions as &$question) {
            // Decode choices if it's a JSON-encoded string
            if (is_string($question->choices)) {
                $question->choices = json_decode($question->choices, true);
            }
        }
        return view('questions.index', compact('questions'));
    }

    public function results()
    {
        $userAnswers = Session::get('userAnswers', []);
        $correctAnswers = Session::get('correctAnswers', 0);
        return view('questions.results', compact('correctAnswers', 'userAnswers'));
    }

    public function destroy($id)
    {
        // Find the question by its ID
        $question = Question::find($id);

        // Check if the question exists
        if ($question) {
            // Delete the question
            $question->delete();

            // Redirect back to the questions index with a success message
            return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
        } else {
            // Redirect back to the questions index with an error message if not found
            return redirect()->route('questions.index')->with('error', 'Question not found.');
        }
    }
}
