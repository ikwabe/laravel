<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class salaryPayment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = DB::table('employees')->get();
        return view('salaryPayment', compact('emp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $choice = $request->get('choice');
        //dd($choice);

        if($choice == 1){
            
            $query = "SELECT employees.id as empid, (SUM(allowance.amount)) as alw 
            FROM employees, employeeallowance, allowance
            WHERE employees.id = employeeallowance.empid  
            AND allowance.id = employeeallowance.allowanceid GROUP BY employees.id";
            
            $result = DB::connection('pgsql')->select($query);
            //dd($users);

            foreach($result as $emp ){
                $getSal = "SELECT (salary.amount + $emp->alw) as sal
                FROM salary,employees
                WHERE employees.salaryid = salary.id AND employees.id = $emp->empid";

                $result2 = DB::connection('pgsql')->select($getSal);

               
                    DB::table('paidsalary')->insert([
                 ['empid' => $emp->empid, 'amount' => $result2[0]->sal, 'date'=> date("Y-m-d")]
                    ]);


            }
            echo "Salary payment recorded Successful <br>";
            echo '<a href="/salaryPayment">Back</a>';
        }
        elseif($choice == 2){

            $empid = $request->get('empid');
            $query = "SELECT employees.id as empid, (SUM(allowance.amount)) as alw 
            FROM employees, employeeallowance, allowance
            WHERE employees.id = $empid 
            AND allowance.id = employeeallowance.allowanceid GROUP BY employees.id";

            
            $result = DB::connection('pgsql')->select($query);
            dd($result);
            foreach($result as $emp ){

                $getSal = "SELECT (salary.amount + $emp->alw) as sal
                FROM salary,employees
                WHERE employees.salaryid = salary.id AND employees.id = $emp->empid";

                $result2 = DB::connection('pgsql')->select($getSal);

                    DB::table('paidsalary')->insert([
                 ['empid' => $emp->empid, 'amount' => $result2[0]->sal, 'date'=> date("Y-m-d")]
                    ]);


            }
            echo "Salary payment recorded Successful <br>";
            echo '<a href="/salaryPayment">Back</a>';
        }
        

           
           
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
