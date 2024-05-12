<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $user_id = auth()->user()->id;
        $user_email = auth()->user()->email;
        $user_name = auth()->user()->name;

        $data = request()->validate([
            'theme' => 'string',
            'description' => 'string',
            'start_task' => 'string',
            'end_task' => 'string',
        ]);

        $name = time(). "." . request()->file('file')->extension();
        $destination = "files";
        $path = request()->file('file')->storeAs($destination, $name, 'public');

        $lowTimeDate = Task::query()->orderBy('start_task')->limit(1)->first()->value('start_task');
        $fastTimeDate = Task::query()->orderByDesc('end_task')->limit(1)->first()->value('end_task');

        $totalTask = Task::query()
            ->whereTime('start_task', '>=' , $lowTimeDate)
            ->whereTime('end_task', '<=', $fastTimeDate)->count();

        $hasStart = Carbon::create($data['start_task'])->between($lowTimeDate, $fastTimeDate);
        $hasEnd = Carbon::create($data['end_task'])->between($lowTimeDate, $fastTimeDate);
        $hasBetween = !$hasStart && !$hasEnd;

        if ($totalTask >= (3 + !empty($hasBetween))) {
            return 'Error Time total';
        } else if (Task::query()->where('user_id', $user_id)->whereDate('created_at', today())->exists()) {
            return 'Error';
        } else {
            $data['user_id'] = $user_id;
            $data['email'] = $user_email;
            $data['client'] = $user_name;
            $data['link_to_the_file'] = asset("storage/" . $path);
            Task::create($data);
        }

        return redirect()->route('home');
    }
}
