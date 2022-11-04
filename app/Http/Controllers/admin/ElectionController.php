<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departments;
use App\Models\Election;
use Auth;
use DB;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Mail;
use Hash;
use File;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FormsImport;
use App\Imports\FormsExport;
use \Illuminate\Support\Facades\URL;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = date("D");
        $elections = Election::select('*')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.elections.index')
        ->with('elections',$elections)
        ->with('times', $times);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function stop($id)
    {
        $election= Election::find($id);
        $e_session = 2;
        $stopelection=  Election::where('id','=',$election->id)
        ->update(
            ['vote_session' => $e_session]
        );
        if($stopelection){

        Toastr::success('Success :)','success');
         return redirect()->route('admin.list-elections');
        }

       Toastr::error('oops theres an error :)','error');
       return back()->with('error', 'error! not created');
    }
        public function start($id)
    {
        
        $election= Election::find($id);
        $e_session = 1;
        $startelection=  Election::where('id','=',$election->id)
        ->update(
            ['vote_session' => $e_session]
        );
        if($startelection){

        Toastr::success('Success :)','success');
         return redirect()->route('admin.list-elections');
        }

       Toastr::error('oops theres an error :)','error');
       return back()->with('error', 'error! not created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'month' => 'required',
        ]);
        $e_year=date("Y");
        $e_session=0;
        $elections = new Election();
        $elections->election_name = $request->name;
        $elections->election_month = $request->month;
        $elections->election_year = $e_year;
        $elections->vote_session = $e_session;
        $elections->save();

        if ($elections) {
            Toastr::success('Task Added successfully :)','success');
            return redirect()->route('admin.list-elections');
        }
        else {
             Toastr::error('Something went wrong :)','error');
            return redirect()->route('admin.list-elections');
        }

             Toastr::error('Something went wrong :)','error');
            return redirect()->route('admin.list-elections');
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
