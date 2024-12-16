<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AllStudentController extends Controller
{
    public function index()
    {
        // Fetch all students with pagination
        $users = User::paginate(10);  // 10 students per page

        // Return the view with students data
        return view('AdminPenal.allstudent', compact('users'));
    }
}
