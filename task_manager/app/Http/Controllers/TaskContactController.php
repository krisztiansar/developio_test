<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateInterval;
use DateTime;
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

   private function createDueDate($dateTime){
        $actualDate = new DateTime($dateTime);

        $addDaysCount = 1;

        if($actualDate->format('H:i')>="09:00:00"){
            //due ime start actual day 09h and end neext day 17h
            $addDaysCount+=1;
        }

        $time = $actualDate->format("H:i:s");    // actial time betwen daily work period 09h and 17h

        if($actualDate->format("H")<9 || $actualDate->format("H")>=17){
            //out of work hour the end period ends
            $time = "17:00:00";
        }

        $actualDateTime = explode(" ",$dateTime);
        $calculatedDate = new DateTime(date("$actualDateTime[0] $time"));
        $endDayIndex = date("N",strtotime($calculatedDate->format("Y-m-d")));

        switch($endDayIndex){
            case 5: $addDaysCount+=2; break;
            case 6: $addDaysCount+=1;break;
        }

        $NDay = new DateInterval("P".$addDaysCount."D");
        $calculatedDate->add($NDay);

        return $calculatedDate->format("Y-m-d H:i:s");
    }

    public function save_task(Request $request){
        try {

            $now = date('Y-m-d H:i:s');

            $due_date = $this->createDueDate($now);

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
                'due_date' => $due_date,
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
