<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
use view;
use App\Employee;

use App\Service;

class EmployeeController extends Controller
{
    public function home(){
        $servs = Service::all();
        // DB::table('services')
        //             ->join('employees', 'services.Employee_ID', '=', 'employees.Employee_ID')
        //             ->join('availedservices', 'services.Availed_ID', '=', 'availedservices.Availed_ID')
        //             ->select('employees.Firstname as fname',
        //                 'employees.Middlename as mname',
        //                 'employees.Lastname as lname',
        //                 'availedservices.Service_Type as servtype',
        //                 'services.Service_ID as servID',
        //                 'services.Total_Service_Fee as total',
        //                 'services.Service_Date as date')
        //             ->get();
        return view('dashboard.home')->with('servs', $servs);
    }

    public function employee(){
    	$emps = DB::table('employees')
    				->join('positions', 'employees.Position_ID', '=', 'positions.Position_ID')
    				->select('employees.Firstname as fname',
    					'employees.Employee_ID as empID',
    					'employees.Middlename as mname',
    					'employees.Lastname as lname',
    					'employees.Phone as phone',
    					'employees.availability as avail',
    					'positions.Position_Name as posName')
    				->get();
    	return view('dashboard.employee')->with('emps', $emps);
    }

    public function unavail($id){
    	$avail = Employee::find($id)->where('Employee_ID', $id)->where('availability', 1);

    	$avail->update(['availability' => false]);
    	return redirect('/view/employee');
    }

    public function avail($id){
    	$avail = Employee::find($id)->where('Employee_ID', $id)->where('availability', 0);

    	$avail->update(['availability' => true]);
    	return redirect('/view/employee');
    }
}
