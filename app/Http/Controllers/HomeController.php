<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Task;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function store(){
        $data = request()->validate([
            'theme' => 'string',
            'description' => 'string',
            'start_task' => 'string',
            'end_task' => 'string',
        ]);
        Task::create($data);
        return redirect()->route('home.index');
    }
}
