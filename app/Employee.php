<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   	protected $table = 'Employees';
	protected $primaryKey = 'Employee_ID';

	// public function position()
	// {
	// 	// return $this->belongsTo('App\Position')->with('Position_Name');
	// 	// return Position::where('id', $this->Position_ID)->first()->Position_Name;
	// }
}
