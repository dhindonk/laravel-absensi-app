<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\User;

class AttendanceController extends Controller
{
    //index
    public function index(Request $request)
    {
        $attendances = Attendance::with('user')
            ->when($request->input('name'), function ($query, $name) {
                $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })->orderBy('id', 'desc')->paginate(10);
        return view('pages.absensi.index', compact('attendances'));
    }

    public function export()
    {
        print('Gass');
        // $attendances = Attendance::all(); 
        // return (new FastExcel($attendances))->download('attendance.xlsx');
    }
}
