<?php

namespace App\Http\Controllers;

use App\Avance;
use App\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeesContoller extends Controller
{
    //
    public function emplogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $emp =
                DB::select('select * from employees where name = ? and phone_number = ?', [$request->input('email'), $request->input('password')]);
            if (count($emp) > 0) {
                $avances = Avance::where('employe_id', '=', $emp[0]->id)->get();
                $arr = array('emp' => $emp[0], 'avances' => $avances);
                return view('empInfo', $arr);
            } else {
                return view('auth.emplogin');
            }
        }
        return view('auth.emplogin');
    }
}