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
        $total_users = User::count();
        $total_assesments = Exam::count();
        $total_user_enrolled = DB::table('user_exam_enroll')->count();
        $total_questions = Question::count();
        $total_present_candidate = DB::table('user_exam_enroll')
                                        ->where(['attendance_status' => 1, 'status' => 1])
                                        ->count();
        $total_absent_users = DB::table('user_exam_enroll')
                                ->where(['attendance_status' => 0, 'status' => 0])
                                ->count();
        return view('admin.dashboard')->with([
            'total_users' => $total_users,
            'total_assesments' => $total_assesments,
            'total_user_enrolled' => $total_user_enrolled,
            'total_questions' => $total_questions,
            'total_present_candidate' => $total_present_candidate,
            'total_absent_users' => $total_absent_users
        ]);
    }

}
