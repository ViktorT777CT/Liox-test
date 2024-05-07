<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       $tasks = Task::all();

        /*dump($questions);*/


        return view('main', ['tasks' => $tasks]);

    }
    public function __construct()
    {
        $this->middleware('auth');
    }

}
