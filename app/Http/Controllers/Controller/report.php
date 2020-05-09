<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class report extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = [];
        $allowance =[];
        $message = null;
        return view('report', compact('allowance','report','message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $report = [];
        $row = 0;
        $allowance = [];

        $choise = $request->get('reptype');
        $message = null;
        $date = explode("-",$request->get('rdate'));
        $month = $date[1];
        
        if($choise == 1){

            $check = "SELECT id, empid, Extract(Month from date)
            FROM public.paidsalary WHERE Extract(Month from date) = $month";
    
            $getsalpaid = DB::connection('pgsql')->select($check);;
           
            if(count( $getsalpaid) > 0){
                $allowance = DB::table('allowance')->get();
                $getemp = "SELECT employees.id as id,employees.empname as empname,
            employees.salaryid as salaryid ,salary.amount as amount FROM employees,salary
            WHERE employees.salaryid = salary.id GROUP BY employees.id,salary.amount";
    
            $employee = DB::connection('pgsql')->select($getemp);
            foreach($employee as $emp){
                $col = 2;
                $report[$row][0] = $emp->empname;
                $report[$row][1] = $emp->amount;
    
                foreach($allowance as $allo){
    
                    
                    $query = "SELECT allowance.amount 
                FROM employeeallowance, allowance,salary,employees
                WHERE allowance.id = $allo->id AND employeeallowance.empid = $emp->id
                AND allowance.id = employeeallowance.allowanceid";
    
                $result = DB::connection('pgsql')->select($query);
    
                if(count($result) > 0 ){
                    $report[$row][$col] = $result[0]->amount;
                }
                else{
                    $report[$row][$col] = 0;
                }
    
                $col++;
                }
    
                $row++;
            }
    
    
            }
            else{
                $message = "There is no Single report CA for this month ";
            }
        }
        else{
            $message = "The system for now has only Single report CA";
        }
        
        // dd($report);
     return view('report', compact('allowance','report','message'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
