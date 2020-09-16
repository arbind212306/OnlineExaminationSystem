<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Option;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionRequest;

class QuestionController extends Controller
{
    /**
     * Render Questions List page
     * @var array
     */
    public function show()
    {
        $questions = Question::get();

        return view('admin.question.show_question')->with(['questions' => $questions]);
    }

    public function add()
    {
        $exams = Exam::get();
        
        return view('admin.question.add_edit_question')->with('exams', $exams);
    }

    public function create(QuestionRequest $request)
    {
        $data = $request->all();
        if(!empty($data['option_title']))
        {
            $question = Question::create($request->validated());

            if($question)
            {
                $option_data['question_id'] = $question->id;
                $option_data['option_title'] = $data['option_title'];

                foreach($option_data['option_title'] as $option):
                    Option::create([
                        'question_id' => $option_data['question_id'],
                        'option_title' => $option,
                    ]);
                endforeach;

                return redirect()->route('questions')->with('success', 'Question created successfully !!');
            }
        }

        return redirect()->back()->with('error', 'Getting some issues, please try again');
    }

    public function edit($id=null)
    {
        $exams = Exam::get();
        $question = Question::where(['id' => $id])->first();

        return view('admin.question.add_edit_question')->with(['question' => $question, 'exams' => $exams]);
    }

    public function update($id=null, QuestionRequest $request)
    {
        $data = $request->all();
        if(!empty($data['option_title']) && !empty($id))
        {
            $question = Question::where(['id' => $id])->update($request->validated());
            
            if($question)
            {
                $option_data['question_id'] = $id;
                $option_data['option_title'] = $data['option_title'];
                Option::where(['question_id' => $id])->delete();
                foreach($option_data['option_title'] as $option):
                    Option::create([
                        'question_id' => $option_data['question_id'],
                        'option_title' => $option,
                    ]);
                endforeach;

                return redirect()->route('questions')->with('success', 'Question updated successfully !!');
            }
        }

        return redirect()->back()->with('error', 'Getting some issues, please try again');

    }

    public function destroy($id=null)
    {
        if(!empty($id) && (Question::where(['id' => $id])->delete()))
        {
            if($options = Option::where(['question_id' => $id])){
                $options->delete();
            }
            return redirect()->route('questions')->with('success', 'Question deleted successfully !!');
        }

        return redirect()->back()->with('error', 'Getting some issues, please try again');        
    }
}
