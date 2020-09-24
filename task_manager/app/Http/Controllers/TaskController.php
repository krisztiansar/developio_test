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
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function save_task(Request $request){
        try {

            DB::table('customer')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('tasks')->insert([
                'subject' => $request->subject,
                'content' => $request->task_content,
                'due_date' => now(),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return Redirect::back()->with('message','Sikeres hiba bejelentés!');

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

    }
}
