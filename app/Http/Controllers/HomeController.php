<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $exams = Exam::get();
        $user_registered_exam = Auth::user()->exams()->orderBy('title')->get();
        
        return view('home')->with(['exams' => $exams])->with(['user_registered_exam' => $user_registered_exam]);
    }
}
