<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TaskContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function save_task(Request $request){
        try {

            DB::table('customer')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $last_id = DB::getPdo()->lastInsertId();

            DB::table('tasks')->insert([
                'customer_id' => $last_id,
                'subject' => $request->subject,
                'content' => $request->task_content,
                'due_date' => now(+16),
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
