<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ExamRequest;

class ExamController extends Controller
{
    public function show()
    {
        $exams = Exam::get();

        return view('admin.exam.show')->with(['exams' => $exams]);
    }

    public function add()
    {
        return view('admin.exam.exam');
    }

    public function create(ExamRequest $request)
    {
        $data = $request->validated();
        $data['admin_id'] = Auth::guard('admin')->user()->id;

        if (Exam::create($data))
        {
            return redirect()->route('exams')->with('success', 'Exam created successfully !!');
        }

        return redirect()->back()->with('error', 'Getting some issues, please try again');
    }

    public function edit($id=null)
    {
        $exam = Exam::where(['id' => $id])->first();

        return view('admin.exam.exam')->with(['exam' => $exam]);
    }

    public function update($id=null, ExamRequest $request)
    {
        $data = $request->validated();
        $data['exam_date'] = Carbon::parse($data['exam_date'])->format('Y-m-d');

        if (Exam::where(['id' => $id])->update($data))
        {
            return redirect()->route('exams')->with('success', 'Exam updated successfully !!');
        }

        return redirect()->back()->with('error', 'Getting some issues, please try again');
    }

    public function destroy($id=null)
    {
        if(!empty($id) && (Exam::destroy($id)))
        {
            return redirect()->route('exams')->with('success', 'Exam deleted successfully !!');
        }

        return redirect()->back()->with('error', 'Getting some issues, please try again');        
    }
}
