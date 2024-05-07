<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       // $task = Task::all();

        /*dump($questions);*/


        return view('main');

    }
}
