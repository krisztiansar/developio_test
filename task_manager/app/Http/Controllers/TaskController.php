<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Task;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Tasks $tasks){
        try {

            $tasks = $tasks::with('customer')->orderBy('updated_at', 'desc')->paginate(15);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'tasks' => $tasks
        ];

        return view('tasks')->with($data);
    }

    public function search_task(Tasks $tasks, Request $request){
        try {

            $slug = $request->name;
            $tasks = $tasks::whereHas('customer', function($query) use ($slug){
                $query->where('name', 'like', '%'.$slug.'%');
            })->paginate(15);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'tasks' => $tasks
        ];

        return view('tasks')->with($data);

    }

}
