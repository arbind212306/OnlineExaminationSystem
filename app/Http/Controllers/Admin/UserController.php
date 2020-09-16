<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        $users = User::get();

        return view('admin.user.show_user')->with(['users' => $users]);
    }

    public function change_status($id=null)
    {
        if(!empty($id)){
            $user = User::find($id);
            $user->is_active == 1 ? $user->is_active = 0 : $user->is_active = 1;
            $user->save();

            return redirect()->route('users')->with('success', 'User status updated successfully');
        }

        return redirect()->back()->with('error', 'Getting issues while updating user status');
    }

    public function enroll()
    {

        $enrolled_users = DB::table('user_exam_enroll')
                            ->join('users', 'users.id', '=', 'user_exam_enroll.user_id')
                            ->join('exams', 'exams.id', '=', 'user_exam_enroll.exam_id')
                            ->select(['users.name', 'users.email', 'users.gender', 'exams.title', 
                                      'users.is_active', 'user_exam_enroll.id', 'user_exam_enroll.status', 
                                      'users.phone', 'user_exam_enroll.created_at'])
                            ->get();

        return view('admin.user.enrolled_users')->with(['enrolled_users' => $enrolled_users]);
    }

    public function change_enrolled_user_status($id=null)
    {
        if(!empty($id))
        {
            $enrolled_user = DB::table('user_exam_enroll')
                                ->where(['id' => $id])
                                ->first();

            $status = $enrolled_user->status == 0 ? 1 : 0;

            $update_status = DB::table('user_exam_enroll')
                                ->where(['id' => $id])
                                ->update(['status' => $status]);
            if($update_status)
            {
                return redirect()->route('admin.user.enroll')->with('success', 'User status for attending assesment test has updated successfully');
            }

            return redirect()->back()->with('error', 'Getting some issues while updating user status for attending assesment test');
        }

    }

    public function qualified_candidate()
    {
        return view('admin.user.qualified_candidate');
    }

    public function disqualified_candidate()
    {
        return view('admin.user.disqualified_candidate');
    }

    public function appeared_assesment()
    {
        return view('admin.user.present_user');
    }

    public function not_appered_assesment()
    {
        return view('admin.user.absent_user');
    }
}
