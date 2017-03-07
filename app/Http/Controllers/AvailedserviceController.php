<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Availedservice;

use App\Service;

use DB;
use view;
class AvailedserviceController extends Controller
{
    public function view(){
    	$avails = Availedservice::all();
    	$emps = DB::table('employees')
    				->join('positions', 'employees.Position_ID', '=', 'positions.Position_ID')
    				->where('availability', 1)
    				->select('employees.Firstname as fname',
    					'employees.Employee_ID as empID',
    					'employees.Middlename as mname',
    					'employees.Lastname as lname',
    					'employees.availability as avail',
    					'positions.Position_Name as posName')
    				->get();

    	return view('dashboard.service')
    		->with('avails', $avails)
    		->with('emps', $emps);
    }

    public function add(){
    // 	$serv = DB::table('services')
				// ->insertGetId(
				// 	['Availed_ID' => implode(", ", Input::get('serv'))],
			 //    	[$serv->Employee_ID = implode(", ", Input::get('emp'))]
			 //    	[$serv->Customer_Name = Input::get('custname')]
			 //    	[$serv->Total_Service_fee = Input::get('amount')]
			 //    	[$serv->Service_Date = Input::get('date')]
			 //    	[$serv->Payment_Method = Input::get('payment')]
				// );

    // 	return redirect('/view/service');
        $serv = new Service();
    	$serv->Availed_ID = implode(", ", Input::get('serv'));
    	$serv->Employee_ID = implode(", ", Input::get('emp'));
    	$serv->Customer_Name = Input::get('custname');
    	$serv->Total_Service_fee = Input::get('amount');
    	$serv->Service_Date = Input::get('date');
    	$serv->Payment_Method = Input::get('payment');
    	$serv->save();

        return redirect('/');
    }
}
