<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Validator;
class EmployeeController extends Controller
{
    function list()
    {
        $users=Employee::all();
        return $users;
    }
    function serarchByID($id)
    {
        $users=Employee::find($id);
        return $users;
    }
    function addEmployee(Request $req)
    {
        $fileLink=$req->file('file')->store('userImage');
        
        $emp_data=new Employee;
        $emp_data->name=$req->name;
        $emp_data->email=$req->email;
        $emp_data->password=$req->email;
        $emp_data->file=$fileLink;

        $result=$emp_data->save();
        if($result)
        {
            return ["message"=>"Add Successfully"];
        }
        else
        {
            return ["message"=>"Something is wrong"];
        }
    }

    function updateEmployee(Request $req)
    {
        $emp_data=Employee::find($req->id);
        $emp_data->name=$req->name;
        $emp_data->email=$req->email;
        $emp_data->password=$req->password;
        $result=$emp_data->save();
        if($result)
        {
            return ["message"=>"update success"];
        }
        else
        {
            return ["message"=>"something is wrong"];
        }
    }
    function searchEmployee(Request $req)
    {
        $emp_data=Employee::where("name",$req->name)->get();
        return $emp_data;
    }

    function loginCheck(Request $req)
    {
        // $emp_data=Employee::where("name",$req->name)->get();
        $emp_data=DB::table('employees')->where('name', $req->name)->where('password', $req->password)->count();
        if($emp_data>0)
        {
            return "Valid User";
        }
        else
        {
            return "Unvalid User";
        }
    }

    function deleteEmployee($id)
    {
        $emp_data=Employee::find($id)->delete();
        if($emp_data)
        {
            return "Delete Data Success";
        }
        else{
            return "Something is wrong";
        }
    }
}
