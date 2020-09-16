<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\User;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * render dashboard
     * @var array
     */
    public function dashboard()
    {

        // $total_assesments = Exam::count();
        // $total_user_enrolled = DB::table('user_exam_enroll')->count();
        // $total_questions = Question::count();
        // $total_present_candidate = DB::table('user_exam_enroll')
        //                                 ->where(['attendance_status' => 1, 'status' => 1])
        //                                 ->count();
        // $total_absent_users = DB::table('user_exam_enroll')
        //                         ->where(['attendance_status' => 0, 'status' => 0])
        //                         ->count();
        return view('admin.dashboard')->with([
            'total_users' => $this->total_users_count(),
            'total_assesments' => $this->total_assesment_count(),
            'total_user_enrolled' => $this->total_users_enrolled_count(),
            'total_questions' => $this->total_question_count(),
            'total_present_candidate' => $this->total_present_candidate_count(),
            'total_absent_users' => $this->total_absent_candidate_count()
        ]);
    }

    public function total_users_count()
    {
        return $total_users = User::count();
    }

    public function total_users_enrolled_count()
    {
        return DB::table('user_exam_enroll')->count();
    }

    public function total_question_count()
    {
        return Question::count();
    }

    public function total_present_candidate_count()
    {
        return DB::table('user_exam_enroll')
                ->where(['attendance_status' => 1, 'status' => 1])
                ->count();
    }

    public function total_absent_candidate_count()
    {
        return DB::table('user_exam_enroll')
                ->where(['attendance_status' => 0, 'status' => 0])
                ->count();
    }

    public function total_assesment_count()
    {
        return Exam::count();
    }

}
