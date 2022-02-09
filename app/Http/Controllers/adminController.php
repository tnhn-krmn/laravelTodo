<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(Request $request)
    {
        //$task = Task::all();
        $user = User::all();
        $task = Task::paginate(10);
        return view('admin.dashboard',compact('task','user'));
    }
}
