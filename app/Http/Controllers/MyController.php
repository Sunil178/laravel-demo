<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Mail;


class MyController extends Controller
{

    function showSession() {
        return view('session_view');
    }

    function registerSession(Request $request) {
        session(['enrollment' => $request->enrollment]);
        return view('session_view');
        return "Session has been created successfully " . session('enrollment');
    }

    function deleteSession(Request $request) {
        $request->session()->flush();
        return "All sessions are deleted" . "<br>" . "After refreshing the page you will be redirected to login page";
    }


    function index() {
        return response()->json(["data" => "You have successfully made API"]);
    }


    function showHome() {
    	return view("home");
    }


    function createExcel() {
    	\Excel::create('temp', function($excel) {


            $excel->sheet('Sheet 1', function ($sheet){
                // $sheet->setOrientation('landscape');
            $data = [["ID", "Roll no.", "Name", "Enrollment no."], [1, 2, 3, 4], [4, 5, 6, 7], [7, 8, 9, 10]];
                $sheet->fromArray($data);
            });		
        })->export('xlsx');
    }

    function demoSendEmail() {
		$to_name = "Sunil Thakur";
		$to_email = "sunilthakur123chor@gmail.com";
		$data = ["name" => "Churan"];
		Mail::send("email", $data, function($message) use ($to_name, $to_email) {
		// $message->to($to_email, $to_name)
		$message->to($to_email);
		$message->subject("Testing email");
		$message->from("sunilthakur123chor@gmail.com","Sunil Thakur");
		});
    }
}
