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
        return view('report', compact('allowance','report'));
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
        $i = 1;
        $employee = DB::table('employees')->get();
        $allowance = DB::table('allowance')->get();

        foreach($employee as $emp){
            $col = 1;
            $report[$row][0] = $emp->empname;

            foreach($allowance as $allo){

                
                $query = "SELECT allowance.amount 
            FROM employeeallowance, allowance
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

        //return view('report', compact('allowance'))->withStore($result);
         dd($report);
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
