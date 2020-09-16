<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Option;
use App\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\UserExamQuestionAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function assesment($id=null)
    {
        // check if id exist
        if(!empty($id))
        {
            $query = DB::table('user_exam_enroll')->where(['exam_id' => $id, 'user_id' => Auth::user()->id]);
            if($query->where(['attendance_status' => 1])->first())
            {
                return redirect()->back()->with('success', 'You alredy have attempted the assesment test');
            }
            
            $exam = Exam::find($id); // find exam based on id
            $questions = $exam->questions; // get all questions for exam
            // get options for questions
            $options = Option::where(['question_id' => $questions->first()->id])->get();

            $query->update(['attendance_status' => 1]);

            return view('assesment_test')->with(['exam' => $exam, 
                                        'questions' => $questions, 'options' => $options]);
        }

        return redirect()->back()->with('error', 'Getting problem while accessing the test. please try again');
    }

    /**
     * Get question and its option based on id on ajax call
     */
    public function question($id=null)
    {
        // check if id exist
        if(!empty($id))
        {
            $question = Question::find($id); // find question based on id
            $options = Option::where(['question_id' => $id])->get(); // get option based on id

            return response()->json(['question' => $question, 'options' => $options]);
        }
    }

    /**
     * Save user answer based on user_id, exam_id, question_id
     * option_id on ajax call
     */
    public function save_answer($id=null, Request $request)
    {
        $data = $request->all();

        // check if question_id and exam_id exist
        if(!empty($id) && !empty($data['exam_id']) && !empty($data['selected_option']))
        {
            // fetch if user attempted answer for provided question
            $existing_user_answer = UserExamQuestionAnswer::where([
                'user_id' => Auth::user()->id,
                'exam_id' => intval($data['exam_id']),
                'question_id' => intval($data['question_id'])
                ])->first();
            
            // check if record exist for user answer for provided question
            if($existing_user_answer)
            {
                // delete user answer 
                $existing_user_answer->delete();
            }

            // insert user answer for provided question
            $user_question_answer = UserExamQuestionAnswer::create([
                'user_id' => Auth::user()->id,
                'exam_id' => intval($data['exam_id']),
                'question_id' => intval($data['question_id']),
                'option_id' => intval($data['selected_option_id']),
                'selected_option' => $data['selected_option']
            ]);
            
            return response()->json(['user_answer' => $user_question_answer]);
        }
    }

    public function enroll_user(Request $request)
    {
        // check if alredy user registered for the assesment
        $check_existing = DB::table('user_exam_enroll')->where(['exam_id' => $request->all()['exam_id'], 'user_id' => Auth::user()->id])->first();
        if($check_existing != null)
        {
            return redirect()->route('home')->with('success', 'You already have registered for this assesment');
        }

        // check if exam_id exist
        if($request->all()['exam_id']){
            //insert row for user with desired exam into intermediate table
            $enrolled_user = Auth::user()->exams()->attach(Exam::find($request->all()['exam_id']));
            
            return redirect()->route('home')->with('success', 'You have registered for assement successfully !!');
        }   

        return redirect()->back()->with('error', 'Please try again, getting some issues while registering !!');
    }

    public function submit_test($id=null)
    {
        return redirect('home')->with('success', 'Thanks for attending the assesment test. Your have successfully completed the exam');
    }
}
