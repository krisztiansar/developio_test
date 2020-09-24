<?php

namespace App\Http\Controllers;

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

    public function index(){
        try {

            $tasks = DB::table('tasks')
                ->join('customer', 'tasks.customer_id', 'customer.id')
                ->select('tasks.*', 'customer.*', 'tasks.id as task_id')
                ->get();

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'tasks' => $tasks
        ];

        return view('tasks')->with($data);
    }


    public function search_task(Request $request){
        try {

            $tasks = DB::table('tasks')
                ->join('customer', 'tasks.customer_id', 'customer.id')
                ->select('tasks.*', 'customer.*', 'tasks.id as task_id')
                ->where('customer.name', 'like', '%'.$request->name.'%')
                ->get();

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'tasks' => $tasks
        ];

        return view('tasks')->with($data);

    }

}
