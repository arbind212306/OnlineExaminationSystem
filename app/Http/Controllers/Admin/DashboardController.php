<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * render dashboard
     * @var array
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
