<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class allocateAllowance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sql = "SELECT * FROM 'users'";
        // $subscribers = DB::connection('pgsql')->select($sql);
        // dd($subscribers);
        // $emp = DB::table('employees')->get();
        
        $emp = DB::table('employees')->get();
        $allow = DB::table('allowance')->get();

        return view('allocateAllowance', compact('emp','allow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $empid = $request->get('empname');
        $allid = $request->get('allid');
        DB::table('employeeallowance')->insert([
            ['allowanceid' => $allid, 'empid' => $empid]
        ]);

        echo "Allowance Registered Successful <br>";
        echo '<a href="/allocateAllowance">Back</a>';
        //
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
