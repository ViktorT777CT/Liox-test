<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(5);


        return view('main', ['tasks' => $tasks]);

    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Task $main){

        $data = request()->validate([
            'status' => 'nullable|int',

        ]);
        $main ->update([
            'status' => $data['status'] ?? 0,
        ]);

        return redirect()->route('main.index');
    }

}
