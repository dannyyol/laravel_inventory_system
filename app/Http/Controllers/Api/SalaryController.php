<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Salary;
use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
{

    public function Paid(Request $request,$id){
   
    $ValidateData = $request->validate([
      'salary_month' => 'required',
    ]);

    $month = $request->salary_month;
    $check = Salary::where('employee_id',$id)->where('salary_month',$month)->first();
    if ($check) {
        return response()->json('Salary Already Paid');
    }else{
        $data = array();
        $data['employee_id'] = $id;
        $data['amount'] = $request->sallary;
        $data['salary_date'] = date('d/m/Y');
        $data['salary_month'] = $month;
        $data['salary_year'] = date('Y');
        Salary::where('id',$id)->create($data);      } 

    }



    public function AllSalary(){
      $salary = DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();
      return response()->json($salary);	
    }


  public function ViewSalary($id){

    $month = $id;
    // $view = Salary::with('employee')->where('salary_month', $month)->get();
    
    
  	$view = DB::table('salaries')
  			->join('employees','salaries.employee_id','employees.id')
  			->select('employees.name','salaries.*')
  			->where('salaries.salary_month',$month)
    		->get();
  	return response()->json($view);

  }


  public function EditSalary($id){

  	$view = DB::table('salaries')
  			->join('employees','salaries.employee_id','employees.id')
  			->select('employees.name','employees.email','salaries.*')
  			->where('salaries.id',$id)
  			->first();
  			return response()->json($view);

  }



  public function SalaryUpdate(Request $request,$id){

  	$data = array();
  	$data['employee_id'] = $request->employee_id;
  	$data['amount'] = $request->amount;
  	$data['salary_month'] = $request->salary_month;
  	
    Salary::where('id',$id)->update($data);
  }



 

}
 