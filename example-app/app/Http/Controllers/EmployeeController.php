<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    //

    public function index(){
    $employees = Employee::all();
  
    return view("employees", [
        'employees' => $employees
        ]);
    }

    public function update(request $request){
        
        $validated = $request->validate([
                'fname'=>'required|max:100',
                'lname'=>'required|max:100',
                'email'=>'required|max:255|email:rfc,dns|unique:employees,email,'.$request->employeeId,
                'mobile'=>'required|digits:10|unique:employees,mobile,'.$request->employeeId,
                'code'=>'required|max:10|min:3|unique:employees,code,'.$request->employeeId
            ], 
            [
                'fname.required' => 'first name is required',
                'fname.max'      => 'first name max 100 character long',
                'lname.required' => 'last name is required',
                'lname.max'      => 'last name max 100 character long',
            ]
        );

    $employee = Employee::findOrFail($request->employeeId);
    $employee->fill([
        'fname' => $request->fname,
        'lname' => $request->lname,
        'email' => $request->email,
        'gender' => $request->gender,
        'mobile' => $request->mobile,
        'code' => $request->code,
        'designation' => $request->designation,
        'address' => $request->address,
        'dob' => '1982-08-15',
        'photo'=>'noimage1.jpg'
    ]);
    $employee->save();
    
    //dd("/employees/detail/" + (string) $employee->id );

    

    return response()->json(['success' => '"Employee details has been updated successfully!"']);
    //return redirect("/employees/detail/" + (string) $employee->id );
        

    }

    public function detail($id){
        
        $employee =  Employee::findOrFail($id);
        
        return view("employee_detail", [
            'employee' => $employee
        ]);
        
    }

    public function deleteMultiple(Request $request){
        
        Employee::whereIn('id', json_decode($request->customerIds))->delete();
        
        return redirect('/employees');
    }

    public function store(Request $request){
    
        $validated = $request->validate([
            'fname'=>'required|max:100',
            'lname'=>'required|max:100',
            'email'=>'required|max:255|email:rfc,dns|unique:employees',
            'mobile'=>'required|digits:10|unique:employees',
            'code'=>'required|max:10|min:3|unique:employees',
        ], 
        [
            'fname.required' => 'first name is required',
            'fname.max'      => 'first name max 100 character long',
            'lname.required' => 'last name is required',
            'lname.max'      => 'last name max 100 character long',
        ]
    );


    Employee::create([
        'fname' => $request->fname,
        'lname' => $request->lname,
        'email' => $request->email,
        'gender' => $request->gender,
        'mobile' => $request->mobile,
        'code' => $request->code,
        'designation' => $request->designation,
        'address' => $request->address,
        'dob' => '1982-08-11',
        'photo'=>'noimage.jpg'
    ]);

    return response()->json(['success' => '"Employee has been added successfully!"']);
    return redirect('/employees');

    }
}
